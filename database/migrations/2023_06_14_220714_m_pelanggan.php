<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('m_pelanggan', function (Blueprint $table) {
            $table->increments('id_pelanggan');
            $table->unsignedInteger('id_kyc');
            $table->unsignedInteger('id_perusahaan');
            $table->string('username',100);
            $table->string('password',50);
            $table->string('nama_pelanggan',100);
            $table->string('tempat_lahir',100);
            $table->date('tgl_lahir');
            $table->char('gender',1);
            $table->string('alamat_ktp',500);
            $table->string('alamat_domisili',500);
            $table->string('kota_domisili',50);
            $table->string('provinsi_domisili',50);
            $table->string('email',100);
            $table->string('no_hp',100);
            $table->string('fb',100);
            $table->string('profile_photo',100);
            $table->json('kyc');
            $table->string('jabatan',20);
            $table->integer('skor_kuisioner');
            $table->string('status_pelanggan',20);
            $table->string('status_akun',20);
            $table->string('role_pelanggan',20);
            $table->string('status_mitra',20);
            $table->tinyInteger('deleted')->length(4);
            $table->string('created_by',100);
            $table->string('updated_by',100);
            $table->timestamps();
        });

        //relation to m_kyc_pelanggan
        Schema::table('m_pelanggan', function (Blueprint $table) {
            $table->foreign('id_kyc')->references('id_kyc')->on('m_kyc_pelanggan')->onUpdate('cascade')->onDelete('cascade');
        });

         //relation to m_perusahaan_b2b
         Schema::table('m_pelanggan', function (Blueprint $table) {
            $table->foreign('id_perusahaan')->references('id_perusahaan')->on('m_perusahaan_b2b')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_pelanggan');
    }
};
