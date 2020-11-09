<?php

namespace App\Models;

use App\Spph;
use Illuminate\Database\Eloquent\Model;

class Mitra extends Model
{
    protected $guarded = [];
    protected $table = 'mitras';

    public function spphs()
    {
        return $this->hasMany(Spph::class, 'mitra_id');
    }

    public function getAllData()
    {
        $data = Mitra::orderBy('nama','asc');
        return $data;
    }

    public function insertData($data)
    {
        $mitra = new Mitra();
        $mitra->nama = $data['nama'];
        $mitra->alamat = $data['alamat'];
        $mitra->direktur = $data['direktur'];
        $mitra->pic = $data['pic'];
        $mitra->phone = $data['phone'];
        $mitra->email = $data['email'];
        $mitra->save();

        return $mitra;
    }

    public function updateData($data, $mitra)
    {
        $mitra->nama = $data['nama'];
        $mitra->alamat = $data['alamat'];
        $mitra->direktur = $data['direktur'];
        $mitra->pic = $data['pic'];
        $mitra->phone = $data['phone'];
        $mitra->email = $data['email'];
        $mitra->save();

        return $mitra;
    }
}
