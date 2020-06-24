<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    // mendeklarasikan table supaya tidak jamak
    protected $table = 'mahasiswa';

    // mendeklarasikan penggunaan create dengan array berisikan field pada Database
    protected $fillable = ['nama_depan', 'nama_belakang', 'jenis_kelamin', 'agama', 'alamat', 'avatar', 'user_id'];

    public function getAvatar()
    {
      if (!$this->avatar) {
        return asset('images/default.jpg');
      }

      return asset('images/'.$this->avatar);
    }

    public function matkul()
    {
      return $this->belongsToMany(Matkul::class)->withPivot(['nilai'])->withTimeStamps(); //menggunkan pivot dan memanggil field yang ingin di ambil
    }

    public function rataRataNilai()
  {
    //ambil nilai
    $total = 0;
    $hitung = 0;
    if ($this->matkul->isNotEmpty()) {
      foreach ($this->matkul as $matkul){
        $total += $matkul->pivot->nilai;
        $hitung++;
      }
    }
    return $total != 0 ? round($total/$hitung) : $total;
  }

  public function nama_lengkap()
  {
    return $this->nama_depan.' '.$this->nama_belakang;
  }
}
