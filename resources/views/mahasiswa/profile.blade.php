@extends('layouts.master')

@section('content')

<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
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
											</tr>
										</thead>
										<tbody>
											@foreach($mahasiswa->matkul as $matkul)
											<tr>
												<td>{{$matkul->kode}}</td>
												<td>{{$matkul->nama}}</td>
												<td>{{$matkul->semester}}</td>
												<td>{{$matkul->pivot->nilai}}</td> <!-- memanggil data dari pivot -->
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
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

    @stop
