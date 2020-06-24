<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;

class DashboardController extends Controller
{
  public function index()
  {
  	$mahasiswa = Mahasiswa::all();
  	// menggabungkan colection dengan function yang dibuat
  	$mahasiswa->map(function($m){
  		// membuat properti untuk rata nilai
  		$m->rataRataNilai = $m->rataRataNilai();
  	});
  	$mahasiswa = $mahasiswa->sortByDesc('rataRataNilai')->take(5);
    return view('dashboards.index', ['mahasiswa' => $mahasiswa]);
  }  
}
