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
      // membuat validasi data create
      $this->validate($request, [
        'nama_depan' => 'required|min:5',
        'nama_depan' => 'required',
        'email' => 'required|email|unique:users',
        'jenis_kelamin' => 'required',
        'agama' => 'required',
        'avatar' => 'mimes:jpeg,png'
      ]);

      //insert tabel user
      $user = new \App\User;
      $user->role = 'mahasiswa';
      $user->name = $request->nama_depan;
      $user->email = $request->email;
      $user->password = bcrypt('rahasia');
      $user->remember_token = str_random(60);
      $user->save();

      // insert tabel mahasiswa
      $request->request->add(['user_id' => $user->id]);
      $mahasiswa = \App\Mahasiswa::create($request->all()); // untuk memasukkan data ke dalam database lewat model mahhasiswa
      if ($request->hasfile('avatar')) {
        $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
        $mahasiswa->avatar = $request->file('avatar')->getClientOriginalName();
        $mahasiswa->save();
      }
      return redirect('/mahasiswa')->with('sukses', 'Data Berhasil di input'); // redirect untuk kembali ke route yang diinginkan. with->() merupakan flash message untuk sekali load halaman
    }

    public function edit($id)
    {
      $mahasiswa = \App\Mahasiswa::find($id);
      return view('mahasiswa/edit', ['mahasiswa' => $mahasiswa]);
    }

    public function update(Request $request, $id)
    {
      // dd($request->all());
      $mahasiswa = \App\Mahasiswa::find($id);
      $mahasiswa->update($request->all());
      if ($request->hasfile('avatar')) {
        $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
        $mahasiswa->avatar = $request->file('avatar')->getClientOriginalName();
        $mahasiswa->save();
      }
      return redirect('/mahasiswa')->with('sukses', 'Data berhasil di update');
    }

    public function delete($id)
    {
      $mahasiswa = \App\Mahasiswa::find($id);
      $mahasiswa->delete();
      return redirect('/mahasiswa')->with('sukses', 'Data berhasil di hapus');
    }

    public function profile($id)
    {
      $mahasiswa = \App\Mahasiswa::find($id);
      $matakuliah = \App\Matkul::all();
      return view('mahasiswa.profile',['mahasiswa' => $mahasiswa, 'matakuliah' => $matakuliah]);
    }

    public function addnilai(Request $request,$idmahasiswa)
    {
      $mahasiswa = \App\Mahasiswa::find($idmahasiswa);
      // memastikkan tidak ada matkul yang diberi nilai dua kali
      if($mahasiswa->matkul()->where('matkul_id',$request->matkul)->exists()){
        return redirect('mahasiswa/'.$idmahasiswa.'/profile')->with('error', 'Nilai sudah ada');        
      }
      $mahasiswa->matkul()->attach($request->matkul,['nilai' => $request->nilai]);  // untuk memasukkan nilai di pivot tabelnya
      return redirect('mahasiswa/'.$idmahasiswa.'/profile')->with('sukses', 'Nilai berhasil dimasukkan');
    }
}
