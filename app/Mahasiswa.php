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
}
