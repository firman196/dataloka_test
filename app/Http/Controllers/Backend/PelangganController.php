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

        return view('pelanggan',compact('title','breadcrumb','url'));
    }

    /**
     * Show POPUP KYC Pelanggan
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $title          = 'KYC Pelanggan';
        $breadcrumb     = 'Daftar Pelanggan';
        $pelanggans     = null;

        return view('popup',compact('title','pelanggans','breadcrumb'));
    }

    /**
     * Show deatil pelanggan with list of transaction
     * 
     * @return \Illuminate\Http\Response
     */
    public function show(){
        $title          = 'Pelanggan';
        $breadcrumb     = 'Daftar Pelanggan';
        $url            = "/pelanggan";

        return view('show',compact('title','breadcrumb','url'));
    }

}
