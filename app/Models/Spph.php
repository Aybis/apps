<?php

namespace App;

use App\Models\FileSpph;
use App\Models\Mitra;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Spph extends Model
{
    protected $guarded = [];

    // Function Relation 
    public function mitras()
    {
        return $this->belongsTo(Mitra::class, 'mitra_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function document()
    {
        return $this->hasMany(FileSpph::class, 'id');
    }

    // Function SPPH 
    public function getAllData($month, $year)
    {
        $month = $month == null ? date('m') : $month;
        $year = $year == null ? date('Y') : $year;

        $data = Spph::with('mitras')->orderBy('created_at','desc');

       if($month != 13){
           $data->whereMonth('created_at', $month)->whereYear('created_at', $year);
       }

       return $data;
    }

    public function getDraftData($month, $year)
    {
        $month = $month == null ? date('m') : $month;
        $year = $year == null ? date('Y') : $year;

        $data = Spph::with('mitras','users')
                    ->where('status','draft')
                    ->orderBy('created_at','desc');

       if($month != 13){
           $data->whereMonth('created_at', $month)->whereYear('created_at', $year);
       }
       
       return $data;
    }

    public function getListData($month, $year)
    {
        $month = $month == null ? date('m') : $month;
        $year = $year == null ? date('Y') : $year;

        $data = Spph::with('mitras','users')
                    ->where('status','save')
                    ->orderBy('created_at','desc');

       if($month != 13){
           $data->whereMonth('created_at', $month)
                ->whereYear('created_at', $year);
       }
       
       return $data;
    }

    public function getDoneData($month, $year)
    {
        $month = $month == null ? date('m') : $month;
        $year = $year == null ? date('Y') : $year;

        $data = Spph::with('mitras','users')
                    ->where('status','done')
                    ->orderBy('created_at','desc');

       if($month != 13){
           $data->whereMonth('created_at', $month)
           ->whereYear('created_at', $year);
       }
       
       return $data;
    }

    public function insertData($data)
    {
        $spph = new Spph();
        $spph->nomor_spph = $data['nomor_spph'];
        $spph->tanggal_spph = $data['tanggal_spph'];
        $spph->tanggal_sph = $data['tanggal_sph'];
        $spph->mitra_id = $data['mitra_id'];
        $spph->penanggung_jawab = $data['penanggung_jawab'];
        $spph->judul = $data['judul'];
        $spph->isi = $data['isi'];
        $spph->created_by = Auth::user()->id;
        $spph->status = $data['status'];
        $spph->save();

        return $spph;
    }

    public function updateData($data, $spph)
    {
        $spph = new Spph();
        $spph->nomor_spph = $data['nomor_spph'];
        $spph->tanggal_spph = $data['tanggal_spph'];
        $spph->nomor_sph = $data['nomor_sph'];
        $spph->tanggal_sph = $data['tanggal_sph'];
        $spph->mitra_id = $data['mitra_id'];
        $spph->penanggung_jawab = $data['penanggung_jawab'];
        $spph->judul = $data['judul'];
        $spph->isi = $data['isi'];
        $spph->status = $data['status'];
        $spph->save();

        return $spph;
    }
}
