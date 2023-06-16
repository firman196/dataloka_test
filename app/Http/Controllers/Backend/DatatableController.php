<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pelanggan;
use DataTables;

class DatatableController extends Controller
{
    /**
     * Datatable pelanggan list
     * @param \App\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function dataTablePelanggan(Request $request)
    {
        if ($request->ajax()) {
            $datas = Pelanggan::all();

            return DataTables::of($datas)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<button type="button" class="edit btn btn-sm btn-default" data-id="'.\Crypt::encrypt($row->id_pelanggan).'" > <i class="fas fa-edit"></i> Edit</button>
                            <button type="button" class="hapus btn btn-sm btn-danger" data-id="'.\Crypt::encrypt($row->id_pelanggan).'"> <i class="fas fa-trash"></i> Hapus</button>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->escapeColumns()
                ->toJson(); 
        }
        
    }
}
