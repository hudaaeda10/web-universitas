<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dosen;

class DosenController extends Controller
{
    public function profile($id)
    {
      $dosen = Dosen::find($id);
      return view('dosen.profile', ['dosen' => $dosen]);
    }
}
