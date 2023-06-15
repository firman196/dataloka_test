<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table = 'm_pelanggan';
    protected $primaryKey = 'id_pelanggan';
    protected $keyType = 'integer';
    protected $fillable = [
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

     /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
    * Get the kyc that owns the pelaggan
    *
    * @return \Illuminate\Database\Eloquent\Relations\belongsTo
    */
    public function kyc()
    {
        return $this->belongsTo('App\Models\KycPelanggan', 'id_kyc', 'id_kyc');
    }

    /**
    * Get the perusahaan that owns the pelaggan
    *
    * @return \Illuminate\Database\Eloquent\Relations\belongsTo
    */
    public function perusahaan()
    {
        return $this->belongsTo('App\Models\Perusahaan', 'id_perusahaan', 'id_perusahaan');
    }
}
