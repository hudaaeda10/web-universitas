@extends('layouts.master')

@section('content')
<div class="main">
  <div class="main-content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
							<!-- TABLE HOVER -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Data Mahasiswa</h3>
                  <div class="right">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal"><i class="lnr lnr-plus-circle"></i></button>
                  </div>
								</div>
								<div class="panel-body">
									<table class="table table-hover">
										<thead>
											<tr>
                        <th>Nama Depan</th>
                        <th>Nama Belakang</th>
                        <th>Jenis Kelamin</th>
                        <th>Agama</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
											</tr>
										</thead>
										<tbody>
                      @foreach($data_mahasiswa as $mahasiswa)
                      <tr>
                        <!-- memilih data sesuai field ($data seluruh->nama_fieldnya) -->
                        <td><a href="/mahasiswa/{{$mahasiswa->id}}/profile">{{$mahasiswa->nama_depan}}</a></td>
                        <td><a href="/mahasiswa/{{$mahasiswa->id}}/profile">{{$mahasiswa->nama_belakang}}</a></td>
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
										</tbody>
									</table>
								</div>
							</div>
							<!-- END TABLE HOVER -->
						</div>
        </div>
      </div>
    </div>
  </div>

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
        <form action="/mahasiswa/create" method="POST" enctype="multipart/form-data"> <!-- tambahan action mengarah kepada root yang ingin di jalankan dan method untuk pengiriman data ke database -->
            {{csrf_field()}} <!-- untuk memberikan token pada form -->
          <div class="form-group{{$errors->has('nama_depan') ? ' has-error' : ''}}"> <!--untuk memberikan pesan error ketika terjadi error pada validasi di mahasiswa controller -->
            <label for="exampleInputEmail1">Nama Depan</label>
            <!--bagian name="..." untuk menangkap data yang kita masukkan pada form -->
            <input name="nama_depan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Depan" value="{{old('nama_depan')}}">
            @if($errors->has('nama_depan'))
              <span class="help-block">{{$errors->first('nama_depan')}}</span>
            @endif
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Nama Belakang</label>
            <input name="nama_belakang" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Belakang" value="{{old('nama_belakang')}}">
          </div>

          <div class="form-group{{$errors->has('email') ? ' has-error' : ''}}">
            <label for="exampleInputEmail1">Email</label>
            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" value="{{old('email')}}">
            @if($errors->has('email'))
              <span class="help-block">{{$errors->first('email')}}</span>
            @endif
          </div>

          <div class="form-group{{$errors->has('jenis_kelamin') ? ' has-error' : ''}}">
            <label for="exampleFormControlSelect1">Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
              <option value="L"{{(old('jenis_kelamin') == 'L') ? ' selected' : ''}}>Laki-Laki</option>
              <option value="P"{{(old('jenis_kelamin') == 'P') ? ' selected' : ''}}>Perempuan</option>
            </select>
            @if($errors->has('jenis_kelamin'))
              <span class="help-block">{{$errors->first('jenis_kelamin')}}</span>
            @endif
          </div>

          <div class="form-group{{$errors->has('agama') ? ' has-error' : ''}}">
            <label for="exampleInputEmail1">Agama</label>
            <input name="agama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Agama" value="{{old('agama')}}">
            @if($errors->has('agama'))
              <span class="help-block">{{$errors->first('agama')}}</span>
            @endif
          </div>

          <div class="form-group">
            <label for="exampleFormControlTextarea1">Alamat</label>
            <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3">{{old('alamat')}}</textarea>
          </div>

          <div class="form-group">
            <label for="exampleFormControlTextarea1">avatar</label>
            <input type="file" name="avatar" class="form-control">
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
@stop
