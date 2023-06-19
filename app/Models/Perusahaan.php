<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    use HasFactory;

    protected $table = 'm_perusahaan_b2b';
    protected $primaryKey = 'id_perusahaan';
    protected $keyType = 'integer';
    protected $fillable = [
        'nama_perusahaan',
        'alamat_perusahaan',
        'no_telp_perusahaan',
        'npwp_perusahaan',
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
        return $this->hasMany('App\Models\Pelanggan', 'id_perusahaan', 'id_perusahaan');
    }
}
