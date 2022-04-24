<?php

namespace App\Models;

use App\Models\Matkul;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $dates = ['created_at'];


    public function matkuls(){
        return $this->belongsTo(Matkul::class,'id_matkuls','id'); //relantionship antara data siswa dengan data mata kuliah
    }
}
