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
        Schema::create('m_kyc_pelanggan', function (Blueprint $table) {
            $table->increments('id_kyc');
            $table->json('kyc');
            $table->date('tanggal_mulai_aktif');
            $table->char('status_aktif',1);
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
        Schema::dropIfExists('m_kyc_pelanggan');
    }
};
