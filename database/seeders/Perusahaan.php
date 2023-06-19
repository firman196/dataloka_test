<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Perusahaan as Model;

class Perusahaan extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Model::insert([
            'id_perusahaan'         => 1,
            'nama_perusahaan'       => "Testing",
            'alamat_perusahaan'     => "JL Testing",
            'no_telp_perusahaan'    => "083939303",
            'npwp_perusahaan'       => "63276327863",
            'deleted'               => 0,
            'created_by'            => "admin_ticmi",
            'updated_by'            => "admin_ticmi",
        ]);

    }
}
