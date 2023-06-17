<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\PelangganResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pelanggan;

class PelangganController extends Controller
{
    public function getListPelanggan(Request $request){
        $pelanggans     = Pelanggan::paginate(10);

        return PelangganResource::collection($pelanggans)->additional(['meta' => [
            'code'      =>200,
            'status'    =>'success',
            'message'   => 'get data list pelanggan successfully'   
        ]]);
    }
}
