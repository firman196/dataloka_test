<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pelanggan;

class PelangganRepository {

    public function __construct() {
        $this->model = new Pelanggan;
    }

    public function all() {
        $datas = $this->model->get();
        return $datas;
    }

    public function findOrder(array $where, $orders) {
        $datas = $this->model->where($where)->orderByRaw($orders)->get();
        return $datas;
    }

    public function findBy(array $where) {
        $datas = $this->model->where($where)->first();
        return $datas;
    }

    public function findByBetween($field, array $where) {
        $datas = $this->model->whereBetween($field, $where)->get();
        return $datas;
    }

    public function store(array $data) {
        $datas = $this->model->insert($data);
        return $datas;
    }

    public function update(array $where, array $data) {
        $datas = $this->model->where($where)
                ->update($data);
        return $datas;
    }

    public function delete(array $where) {
        $datas = $this->model->where($where)->delete();
        return $datas;
    }
    
}