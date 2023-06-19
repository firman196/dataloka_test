<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Pelanggan as Model;

class Pelanggan extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
 
    	for($i = 1; $i <= 10; $i++){
    	    // insert data ke table pegawai menggunakan Faker
    		Model::insert([
                'id_pelanggan'  => $i,
                'id_kyc'        => 1,
                'id_perusahaan' => 1,
                'username'      => $faker->userName(),
                'password'      => $faker->password(),
                'nama_pelanggan'=> $faker->username(),
                'tempat_lahir'  => $faker->city(),
                'tgl_lahir'     => $faker->dateTime(),
                'gender'        => 'L',
                'alamat_ktp'    => $faker->address(),
                'alamat_domisili' => $faker->address(),
                'kota_domisili' => $faker->city(),
                'provinsi_domisili'=> $faker->state(),
                'email' => $faker->email(),
                'no_hp' => $faker->phoneNumber(),
                'fb'    => 'tes',
                'profile_photo' => '',
                'kyc' =>"{}",
                'jabatan' => 'direktur',
                'skor_kuisioner' => 50,
                'status_pelanggan' => 'b2b',
                'status_akun' => "aktif",
                'role_pelanggan' => "admin",
                'status_mitra'=> "mitra",
                'deleted' => 0,
                'created_by' => "admin_ticmi",
                'updated_by' => "admin_ticmi",
    		]);
 
    	}
    }
}
