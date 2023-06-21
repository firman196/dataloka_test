<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pelanggan;

class PelangganRepository {

    public function __construct() {
        $this->model = new Pelanggan;
    }

    public function all($limit = 10) {
        $datas = $this->model->where('deleted',0)->paginate($limit);
        return $datas;
    }

    public function allWithFilter(array $where, $limit = 10) {
        array_push($where,['deleted' =>0]);
        $datas = $this->model->where($where)->paginate($limit);
        return $datas;
    }

    public function findBy(array $where) {
        array_push($where,['deleted' =>0]);
        $data = $this->model->where($where)->first();
        return $data;
    }

    public function store(array $data) {
        $datas = $this->model->insert($data);
        return $datas;
    }

    public function update(array $where, array $data) {
        $data = $this->model->where($where)
                ->update($data);
        return $data;
    }
    
}