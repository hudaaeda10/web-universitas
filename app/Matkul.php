<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matkul extends Model
{
  // mendeklarasikan table supaya tidak jamak
  protected $table = 'matkul';
  protected $fillable = ['kode', 'nama', 'semester'];

  public function mahasiswa()
  {
    return $this->belongsToMany(Mahasiswa::class)->withPivot(['nilai']); //menggunkan pivot dan memanggil field yang ingin di ambil
  }
}
