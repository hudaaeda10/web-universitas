@extends('layouts.master')

@section('content')

      <!-- membuat alert untuk notifikasi -->
      @if(session('sukses'))  <!-- menggunakan flash message 'sukses' merupakan variabel dari deklarasi di MahasiswaController -->
      <div class="alert alert-success" role="alert">
        {{session('sukses')}} <!-- pesan yang akan di tampilkan dengan memanggil variabel 'sukses' -->
      </div>
      @endif
      <div class="row">
        <div class="col-6">
          <h1> Data Mahasiswa </h1>
        </div>
        <div class="col-6">
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#exampleModal">
          Tambah Data Mahasiswa
        </button>
        </div>
        <table class="table table-hover">
          <tr>
            <!-- Nama judul tiap fiel di tabel yang dimunculkan -->
            <th>Nama Depan</th>
            <th>Nama Belakang</th>
            <th>Jenis Kelamin</th>
            <th>Agama</th>
            <th>Alamat</th>
            <th>Aksi</th>
          </tr>
          <!-- Melakukan perulangan, memasukkan data_mahasiswa ke variabel mahasiswa -->
          @foreach($data_mahasiswa as $mahasiswa)
          <tr>
            <!-- memilih data sesuai field ($data seluruh->nama_fieldnya) -->
            <td>{{$mahasiswa->nama_depan}}</td>
            <td>{{$mahasiswa->nama_belakang}}</td>
            <td>{{$mahasiswa->jenis_kelamin}}</td>
            <td>{{$mahasiswa->agama}}</td>
            <td>{{$mahasiswa->alamat}}</td>
            <td>
              <a href="/mahasiswa/{{$mahasiswa->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
              <!-- Memberikan notifikasi jika ingin menghapus sebuah data -->
              <a href="/mahasiswa/{{$mahasiswa->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau di hapus ?')">Delete</a>
            </td>
          </tr>
          <!-- penutup pengulangan -->
          @endforeach
        </table>




        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="/mahasiswa/create" method="POST"> <!-- tambahan action mengarah kepada root yang ingin di jalankan dan method untuk pengiriman data ke database -->
                  {{csrf_field()}} <!-- untuk memberikan token pada form -->
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Depan</label>
                  <!--bagian name="..." untuk menangkap data yang kita masukkan pada form -->
                  <input name="nama_depan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Depan">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Belakang</label>
                  <input name="nama_belakang" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Belakang">
                </div>

                <div class="form-group">
                  <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                  <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
                    <option value="L">Laki-Laki</option>
                    <option value="P">Perempuan</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Agama</label>
                  <input name="agama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Agama">
                </div>

                <div class="form-group">
                  <label for="exampleFormControlTextarea1">Alamat</label>
                  <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
              </div>
          </div>
        </div>
      </div>

@endsection
