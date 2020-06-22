<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function editnilai(Request $request, $id)
    {
      $mahasiswa = \App\Mahasiswa::find($id);
      // mengupdate data nilai yang berada di pivot antara tabel mahasiswa dan matkul
      $mahasiswa->matkul()->updateExistingPivot($request->pk,['nilai' => $request->value]);
    }
}
