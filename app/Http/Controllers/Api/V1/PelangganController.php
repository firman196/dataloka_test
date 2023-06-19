<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\PelangganResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pelanggan;
use App\Exports\PelangganExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Helpers\ResponseFormatter;

class PelangganController extends Controller
{
    const STATUS_AKUN = ['aktif','delete','suspend'];

    /**
     * Show pelanggal list with filter parameters
     * @param Request $request
     * @return PelangganResource
     */
    public function getListPelanggan(Request $request){
        $limit      = $request->entries;
        $search     = $request->search;
        $startDate  = $request->start_date;
        $endDate    = $request->end_date;

        $filter     = [];
        if(!empty($search)){
            array_push($filter, ['nama_pelanggan','LIKE','%'.$search.'%']);
        } 
        if(!empty($startDate) && !empty($endDate)){
            array_push($filter,['created_at','>=',(new \DateTime($startDate))->format('Y-m-d')]);
            array_push($filter,['created_at','<=',(new \DateTime($endDate))->format('Y-m-d')]);
        }

        array_push($filter,['deleted',0]);
        if(empty($search) && empty($startDate) && empty($endDate)){
            $pelanggans     = Pelanggan::where('deleted',0)->paginate($limit);
        } else{
            $pelanggans     = Pelanggan::where($filter)->paginate($limit);
        }

        return PelangganResource::collection($pelanggans)->additional(['meta' => [
            'code'      =>200,
            'status'    =>'success',
            'message'   => 'get data list pelanggan successfully'   
        ]]);
    }

    /**
     * Export data Pelanggan to excell
     * @param Request $request
     * @return \Illuminate\Support\Collection
    */
    public function exportPelanggan(Request $request) 
    {
        $startDate = $request->start_date;
        $endDate   = $request->end_date;
        $search    = $request->search;

        $filter    = [];
        if(!empty($startDate) && !empty($endDate)){
            array_push($filter,['created_at','>=',$startDate]);
            array_push($filter,['created_at','<=',$endDate]);
        }

        if(!empty($search)){
            array_push($filter,['nama_pelanggan','LIKE','%'.$search.'%']);
        }
        array_push($filter,['deleted',0]);
        return  Excel::download(new PelangganExport($filter), 'pelanggan.xlsx');
        
    }

    /**
     * set status akun by id pelanggan
     * @param Request $request
     * @param $id
     * @return boolean
    */
    public function setStatusAkun(Request $request, $id) {
        try {
            $status = $request->status;
            if(!in_array($status, $this::STATUS_AKUN)){
                return ResponseFormatter::error(
                    false,
                    'Status not valid'
                );
            }
            Pelanggan::where('id_pelanggan',$id)->update(['status_akun'=>$status]);
            
            return ResponseFormatter::success(
                true,
                "activated successfully"
            );
            
        } catch (\Exception $e) {
            return ResponseFormatter::error(
                false,
                $e->getMessage(),
            );
        }
    }

    /**
     * Soft deletes multiple pelanggan by id pelanggan
     * @param Request $request
     * @return boolean
    */
    public function delete(Request $request) {
        try {
            $ids = $request->id_pelanggan;
            if(empty($ids)){
                return ResponseFormatter::error(
                    false,
                    'Id pelanggan cannot empty'
                );
            }
            Pelanggan::whereIn('id_pelanggan',$ids)->update(['deleted'=>1]);
            
            return ResponseFormatter::success(
                true,
                200
            );
            
        } catch (\Exception $e) {
            return ResponseFormatter::error(
                false,
                $e->getMessage(),
                500
            );
        }
    }

}
