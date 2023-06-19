<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KycPelanggan extends Model
{
    use HasFactory;

    protected $table = 'm_kyc_pelanggan';
    protected $primaryKey = 'id_kyc';
    protected $keyType = 'integer';
    protected $fillable = [
        'kyc',
        'tanggal_mulai_aktif',
        'status_aktif',
        'deleted',
        'created_by',
        'updated_by'
    ];

    /**
    *
    * @return \Illuminate\Database\Eloquent\Relations\hasMany
    */
    public function pelanggan()
    {
        return $this->hasMany('App\Models\Pelanggan', 'id_kyc', 'id_kyc');
    }
}
