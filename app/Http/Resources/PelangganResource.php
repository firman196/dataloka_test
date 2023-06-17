<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PelangganResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_pelanggan'      => $this->id_pelanggan,
            'username'          => $this->username,
            'nama_pelanggan'    => $this->nama_pelanggan,   
            'no_hp'             => $this->no_hp,  
            'status_akun'       => $this->status_akun
        ];
    }
}
