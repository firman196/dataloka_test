<?php

namespace App\Exports;

use App\Models\Pelanggan;
use Maatwebsite\Excel\Concerns\FromCollection;

class PelangganExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function __construct(array $keyword)
    {
        $this->filter = $keyword;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        if(!empty($this->filter)){
            return Pelanggan::where($this->filter)->get();
        }
        return Pelanggan::all();
    }

     /**
     * Write code on Method
     *
     * @return response()
     */
    public function headings(): array
    {
        return [
            'id_pelanggan',
            'id_kyc',
            'id_perusahaan',
            'username',
            'password',
            'nama_pelanggan',
            'tempat_lahir',
            'tgl_lahir',
            'gender',
            'alamat_ktp',
            'alamat_domisili',
            'kota_domisili',
            'provinsi_domisili',
            'email',
            'no_hp',
            'fb',
            'profile_photo',
            'kyc',
            'jabatan',
            'skor_kuisioner',
            'status_pelanggan',
            'status_akun',
            'role_pelanggan',
            'status_mitra',
            'deleted',
            'created_by',
            'updated_by'
            ];
    }
}
