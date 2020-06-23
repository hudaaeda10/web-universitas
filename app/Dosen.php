<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $table = 'dosen';

    protected $fillable = ['nama', 'telpon', 'alamat'];

    public function matkul()
    {
      return $this->hasMany(Matkul::class);
    }
}
