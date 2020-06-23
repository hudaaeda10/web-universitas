@extends('layouts.master')

@section('head')
<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
@endsection

@section('content')

<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					@if(session('sukses'))  <!-- menggunakan flash message 'sukses' merupakan variabel dari deklarasi di MahasiswaController -->
					<div class="alert alert-success" role="alert">
						{{session('sukses')}} <!-- pesan yang akan di tampilkan dengan memanggil variabel 'sukses' -->
					</div>
					@endif

					@if(session('error'))  <!-- menggunakan flash message 'sukses' merupakan variabel dari deklarasi di MahasiswaController -->
					<div class="alert alert-danger" role="alert">
						{{session('error')}} <!-- pesan yang akan di tampilkan dengan memanggil variabel 'sukses' -->
					</div>
					@endif
					<div class="panel panel-profile">
						<div class="clearfix">
							<!-- LEFT COLUMN -->
							<div class="profile-left">
								<!-- PROFILE HEADER -->
								<div class="profile-header">
									<div class="overlay"></div>
									<div class="profile-main">
										<img src="{{$mahasiswa->getAvatar()}}" class="img-circle" alt="Avatar">
										<h3 class="name">{{$mahasiswa->nama_depan}}</h3>
										<span class="online-status status-available">Available</span>
									</div>
									<div class="profile-stat">
										<div class="row">
											<div class="col-md-4 stat-item">
												{{$mahasiswa->matkul->count()}} <span>Mata Kuliah</span>
											</div>
											<div class="col-md-4 stat-item">
												15 <span>Awards</span>
											</div>
											<div class="col-md-4 stat-item">
												2174 <span>Points</span>
											</div>
										</div>
									</div>
								</div>
								<!-- END PROFILE HEADER -->
								<!-- PROFILE DETAIL -->
								<div class="profile-detail">
									<div class="profile-info">
										<h4 class="heading">Data Diri</h4>
										<ul class="list-unstyled list-justify">
											<li>Jenis Kelamin <span>{{$mahasiswa->jenis_kelamin}}</span></li>
											<li>Agama <span>{{$mahasiswa->agama}}</span></li>
											<li>Alamat <span>{{$mahasiswa->alamat}}</span></li>
										</ul>
									</div>
									<div class="text-center"><a href="/mahasiswa/{{$mahasiswa->id}}/edit" class="btn btn-warning">Edit Profile</a></div>
								</div>
								<!-- END PROFILE DETAIL -->
							</div>
							<!-- END LEFT COLUMN -->
							<!-- RIGHT COLUMN -->
							<div class="profile-right">
								<!-- Button trigger modal -->
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
								  Tambah Nilai
								</button>
								<!-- END AWARDS -->
								<!-- TABBED CONTENT -->
								<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Mata Kuliah</h3>
								</div>
								<div class="panel-body">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>KODE</th>
												<th>NAMA</th>
												<th>SEMESTER</th>
												<th>NILAI</th>
												<th>DOSEN</th>
												<th>AKSI</th>
											</tr>
										</thead>
										<tbody>
											@foreach($mahasiswa->matkul as $matkul)
											<tr>
												<td>{{$matkul->kode}}</td>
												<td>{{$matkul->nama}}</td>
												<td>{{$matkul->semester}}</td>
												<!-- memanggil data dari pivot -->
											 	<td><a href="#" class="nilai" data-type="text" data-pk="{{$matkul->id}}" data-url="/api/mahasiswa/{{$mahasiswa->id}}/editnilai" data-title="Masukkan Nilai">{{$matkul->pivot->nilai}}</a></td>
												<td><a href="/dosen/{{$matkul->dosen_id}}/profile">{{$matkul->dosen->nama}}</a></td>
												<td><a href="/mahasiswa/{{$mahasiswa->id}}/{{$matkul->id}}/deletenilai" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau di hapus ?')">Delete</a></td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
							<div class="panel">
								<div id="chartNilai"></div>
							</div>
								<!-- END TABBED CONTENT -->
							</div>
							<!-- END RIGHT COLUMN -->
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>

		<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Nilai</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
				<form action="/mahasiswa/{{$mahasiswa->id}}/addnilai" method="POST" enctype="multipart/form-data">
            {{csrf_field()}} <!-- untuk memberikan token pada form -->
					<div class="form-group">
				    <label for="matkul">Mata Kuliah</label>
				    <select class="form-control" id="matkul" name="matkul">
				      @foreach($matakuliah as $mp)
								<option value="{{$mp->id}}">{{$mp->nama}}</option>
							@endforeach
				    </select>
				  </div>
          <div class="form-group{{$errors->has('nilai') ? ' has-error' : ''}}"> <!--untuk memberikan pesan error ketika terjadi error pada validasi di mahasiswa controller -->
            <label for="exampleInputEmail1">Nilai</label>
            <!--bagian name="..." untuk menangkap data yang kita masukkan pada form -->
            <input name="nilai" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="nilai" value="{{old('nilai')}}">
            @if($errors->has('nilai'))
              <span class="help-block">{{$errors->first('nilai')}}</span>
            @endif
          </div>
      </div>
      <div class="modal-footer">
	        <button type="submit" class="btn btn-primary">Simpan</button>
			</form>
      </div>
    </div>
  </div>
</div>
    @stop

@section('footer')
<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
	Highcharts.chart('chartNilai', {
		chart: {
				type: 'column'
		},
		title: {
				text: 'Laporan Nilai Mahasiswa'
		},
		xAxis: {
				categories: {!!json_encode($categories)!!},
				crosshair: true
		},
		yAxis: {
				min: 0,
				title: {
						text: 'Nilai'
				}
		},
		tooltip: {
				headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
				footerFormat: '</table>',
				shared: true,
				useHTML: true
		},
		plotOptions: {
				column: {
						pointPadding: 0.2,
						borderWidth: 0
				}
		},
		series: [{
				name: 'Tokyo',
				data: {!! json_encode($data) !!}

		}]
	});
	$(document).ready(function() {
    $('.nilai').editable();
	});
</script>
@stop
