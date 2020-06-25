<?php

use App\Mahasiswa;
use App\Dosen;

function ranking5Besar()
{
	$mahasiswa = Mahasiswa::all();
	  	// menggabungkan colection dengan function yang dibuat
	  	$mahasiswa->map(function($m){
	  		// membuat properti untuk rata nilai
	  		$m->rataRataNilai = $m->rataRataNilai();
	  	});
  	$mahasiswa = $mahasiswa->sortByDesc('rataRataNilai')->take(5);
  	return $mahasiswa;
}

function totalMahasiswa()
{
	return Mahasiswa::count();
}

function totalDosen()
{
	return Dosen::count();
}