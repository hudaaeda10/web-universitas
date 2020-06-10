<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index(Request $request) // menangkap data yang ingin dicari dengan request
    {
      // menggunakan if else untuk melakukan pencarian
      if ($request->has('cari')) {
          $data_mahasiswa = \App\mahasiswa::where('nama_depan', 'LIKE', '%' .$request->cari. '%')->get();
      }else {
        $data_mahasiswa = \App\Mahasiswa::all(); // menghubungkan dengan database dari model Mahasiswa
      }
      // menghubungkan database dengan view
      return view('mahasiswa.index', ['data_mahasiswa' => $data_mahasiswa]); // variabel 'data_mahasiswa' diisi dengan $data_mahasiswa
    }

    public function create(Request $request)
    {
      \App\Mahasiswa::create($request->all()); // untuk memasukkan data ke dalam database lewat model mahhasiswa
      return redirect('/mahasiswa')->with('sukses', 'Data Berhasil di input'); // redirect untuk kembali ke route yang diinginkan. with->() merupakan flash message untuk sekali load halaman
    }

    public function edit($id)
    {
      $mahasiswa = \App\Mahasiswa::find($id);
      return view('mahasiswa/edit', ['mahasiswa' => $mahasiswa]);
    }

    public function update(Request $request, $id)
    {
      $mahasiswa = \App\Mahasiswa::find($id);
      $mahasiswa->update($request->all());
      return redirect('/mahasiswa')->with('sukses', 'Data berhasil di update');
    }

    public function delete($id)
    {
      $mahasiswa = \App\Mahasiswa::find($id);
      $mahasiswa->delete();
      return redirect('/mahasiswa')->with('sukses', 'Data berhasil di hapus');
    }
}
