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
        Schema::create('m_perusahaan_b2b', function (Blueprint $table) {
            $table->increments('id_perusahaan');
            $table->string('nama_perusahaan',100);
            $table->string('alamat_perusahaan',500);
            $table->string('no_telp_perusahaan',100);
            $table->string('npwp_perusahaan',100);
            $table->tinyInteger('deleted')->length(4);
            $table->string('created_by',100);
            $table->string('updated_by',100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_perusahaan_b2b');
    }
};
