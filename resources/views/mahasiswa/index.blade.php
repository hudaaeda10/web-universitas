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
            <label for="exampleInputEmail1">Email</label>
            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
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
@stop
