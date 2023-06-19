<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\KycPelanggan as Model;
use Faker\Factory as Faker;

class KYCPelanggan extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        Model::insert([
            'id_kyc'                => 1,
            'kyc'                   => "{}",
            'tanggal_mulai_aktif'   => $faker->dateTime(),
            'status_aktif'          => 1,
            'deleted'               => 0,
            'created_by'            => "admin_ticmi",
            'updated_by'            => "admin_ticmi"
        ]);
    }
}
