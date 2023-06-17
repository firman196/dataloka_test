<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pelanggan;

class PelangganController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title          = 'Pelanggan';
        $breadcrumb     = 'Daftar Pelanggan';
        $url            = "/pelanggan";
        $pelanggans     = Pelanggan::all();

        return view('pelanggan',compact('title','breadcrumb','url','pelanggans'));
    }

    /**
     * Show POPUP KYC Pelanggan
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $title          = 'KYC Pelanggan';
        $pelanggans     = null;

        return view('popup',compact('title','pelanggans'));
    }

}
