<?php

namespace App\Services;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use InvalidArgumentException;
use DB;

class PelangganService {

    public function __construct(){
        $this->pelanggan    = new \App\Repositories\PelangganRepository;
    }

    public function getAll(){
        $datas = $this->pelanggan->all();
        return $datas;
    }

    public function findBy(array $id){
        $datas = $this->pelanggan->findBy($id);
        return $datas;
    }

   /* public function store($request){
        $result = $this->mahasiswa->store([
            'nim'           => $request['nim'],
            'nik'           => $request['nik'],
            'nama'          => $request['nama'],
            'kode_prodi'    => $request['kode_prodi'],
            'kelas_id'      => $request['kelas_id'],
            'angkatan'      => $request['angkatan'],
            'semester'      => $request['semester'],
            'alamat'        => $request['alamat'],
            'agama'         => $request['agama'],
            'jenis_kelamin' => $request['jenis_kelamin'],
            'kode_pos'      => $request['kode_pos'],
            'telp'          => $request['telp'],
            'email'         => $request['email'],
            'password'      => Hash::make($request['password']),
            'dosen'         => $request['dosen'],
            'status'        => $request['status']
        ]);

        return $result;
    }

    public function update($request, $id)
    {
        $result = $this->mahasiswa->update(['nim'=>$id],[
            'nim'           => $request['nim'],
            'nik'           => $request['nik'],
            'nama'          => $request['nama'],
            'kode_prodi'    => $request['kode_prodi'],
            'kelas_id'      => $request['kelas_id'],
            'angkatan'      => $request['angkatan'],
            'semester'      => $request['semester'],
            'alamat'        => $request['alamat'],
            'agama'         => $request['agama'],
            'jenis_kelamin' => $request['jenis_kelamin'],
            'kode_pos'      => $request['kode_pos'],
            'telp'          => $request['telp'],
            'email'         => $request['email'],
            'password'      => Hash::make($request['password']),
            'dosen'         => $request['dosen'],
            'status'        => $request['status']
        ]);

        return $result;
    }
*/
    public function delete($id)
    {
        $result = $this->pelanggan->delete(['id_pelanggan'=>$id]);
        return $result;
    }
    
}