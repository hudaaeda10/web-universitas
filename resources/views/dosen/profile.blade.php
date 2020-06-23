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
										<img src="" class="img-circle" alt="Avatar">
										<h3 class="name">{{$dosen->nama}}</h3>
										<span class="online-status status-available">Available</span>
									</div>
									<div class="profile-stat">

									</div>
								</div>
								<!-- END PROFILE HEADER -->
								<!-- PROFILE DETAIL -->
								<div class="profile-detail">
									<div class="profile-info">
									</div>
								</div>
								<!-- END PROFILE DETAIL -->
							</div>
							<!-- END LEFT COLUMN -->
							<!-- RIGHT COLUMN -->
							<div class="profile-right">
								<!-- Button trigger modal -->

								<!-- END AWARDS -->
								<!-- TABBED CONTENT -->
								<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Mata Kuliah yang diajar {{$dosen->nama}}</h3>
								</div>
								<div class="panel-body">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>NAMA</th>
												<th>SEMESTER</th>
											</tr>
										</thead>
										<tbody>
											@foreach($dosen->matkul as $matkul)
											<tr>
												<td>{{$matkul->nama}}</td>
                        <td>{{$matkul->semester}}</td>
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


    @stop

@section('footer')

@stop
