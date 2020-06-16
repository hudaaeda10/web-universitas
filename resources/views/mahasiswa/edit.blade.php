@extends('layouts.master')

@section('content')
<div class="main">
  <div class="main-content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="panel">
            <div class="panel-heading">
          	   <h3 class="panel-title">Inputs</h3>
            </div>
            <div class="panel-body">
              <form action="/mahasiswa/{{$mahasiswa->id}}/update" method="POST" enctype="multipart/form-data"> <!-- tambahan action mengarah kepada root yang ingin di jalankan dan method untuk pengiriman data ke database -->
                  {{csrf_field()}} <!-- untuk memberikan token pada form -->
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Depan</label>
                    <!--bagian name="..." untuk menangkap data yang kita masukkan pada form -->
                    <!-- tambahkan value  untuk menampilkan data yang pengen di edit -->
                    <input name="nama_depan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Depan" value="{{$mahasiswa->nama_depan}}">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Belakang</label>
                    <input name="nama_belakang" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Belakang" value="{{$mahasiswa->nama_belakang}}">
                  </div>

                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
                      <option value="L" @if($mahasiswa->jenis_kelamin == 'L') selected @endif>Laki-Laki</option>
                      <option value="P" @if($mahasiswa->jenis_kelamin == 'P') selected @endif>Perempuan</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Agama</label>
                    <input name="agama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Agama" value="{{$mahasiswa->agama}}">
                  </div>

                  <div class="form-group">
                    <label for="exampleFormControlTextarea1">Alamat</label>
                    <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$mahasiswa->alamat}}</textarea>
                  </div>

                  <div class="form-group">
                    <label for="exampleFormControlTextarea1">avatar</label>
                    <input type="file" name="avatar" class="form-control">
                  </div>

                  <button type="submit" class="btn btn-warning">Update</button>
                </form>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop

@section('content1')

      <h1>Edit Data Mahasiswa</h1>
      <!-- membuat alert untuk notifikasi -->
      @if(session('sukses'))  <!-- menggunakan flash message 'sukses' merupakan variabel dari deklarasi di MahasiswaController -->
      <div class="alert alert-success" role="alert">
        {{session('sukses')}} <!-- pesan yang akan di tampilkan dengan memanggil variabel 'sukses' -->
      </div>
      @endif
      <div class="row">
        <div class="col-lg-12">
        <form action="/mahasiswa/{{$mahasiswa->id}}/update" method="POST"> <!-- tambahan action mengarah kepada root yang ingin di jalankan dan method untuk pengiriman data ke database -->
            {{csrf_field()}} <!-- untuk memberikan token pada form -->
            <div class="form-group">
              <label for="exampleInputEmail1">Nama Depan</label>
              <!--bagian name="..." untuk menangkap data yang kita masukkan pada form -->
              <!-- tambahkan value  untuk menampilkan data yang pengen di edit -->
              <input name="nama_depan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Depan" value="{{$mahasiswa->nama_depan}}">
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Nama Belakang</label>
              <input name="nama_belakang" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Belakang" value="{{$mahasiswa->nama_belakang}}">
            </div>

            <div class="form-group">
              <label for="exampleFormControlSelect1">Jenis Kelamin</label>
              <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
                <option value="L" @if($mahasiswa->jenis_kelamin == 'L') selected @endif>Laki-Laki</option>
                <option value="P" @if($mahasiswa->jenis_kelamin == 'P') selected @endif>Perempuan</option>
              </select>
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Agama</label>
              <input name="agama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Agama" value="{{$mahasiswa->agama}}">
            </div>

            <div class="form-group">
              <label for="exampleFormControlTextarea1">Alamat</label>
              <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$mahasiswa->alamat}}</textarea>
            </div>
            <button type="submit" class="btn btn-warning">Update</button>
          </form>
          </div>
        </div>

@endsection
