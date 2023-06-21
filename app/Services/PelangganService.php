<?php

namespace App\Services;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use InvalidArgumentException;
use DB;
use File;

class PelangganService {

    public function __construct(){
        $this->pelangganRepository  = new \App\Repositories\PelangganRepository;
    }

    /**
     * Get all pelanggan with filter & pagination
     * @param Request $request
     * @return collection
     * @throws Exception
     */
    public function getAll($request){
        try{
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
                $pelanggans     = $this->pelangganRepository->all($limit);
            } else{
                $pelanggans     = $this->pelangganRepository->allWithFilter($filter, $limit);
            }

            return $pelanggans;
        }catch(\Exception $e){
            throw new InvalidArgumentException('Maaf terjadi kesalahan pada sistem');
        }
    }
    
}