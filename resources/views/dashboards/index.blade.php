@extends('layouts.master')

@section('content')
<div class="main">
  <div class="main-content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">
					<!-- TABBED CONTENT -->
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Rangking 5 Besar</h3>
						</div>
						<div class="panel-body">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>RANGKING</th>
										<th>NAMA</th>
										<th>RATA-RATA NILAI</th>										
									</tr>
								</thead>
								<tbody>
									@php
										$ranking = 1;
									@endphp
									@foreach(ranking5Besar() as $m)									
									<tr>
										<td>{{$ranking}}</td>
										<td>{{$m->nama_lengkap()}}</td>
										<td>{{$m->rataRataNilai}}</td>									
									</tr>
									@php
										$ranking++;
									@endphp		
									@endforeach													
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="metric">
						<span class="icon"><i class="fa fa-user"></i></span>
						<p>
							<span class="number">{{totalMahasiswa()}}</span>
							<span class="title">Total Siswa</span>
						</p>
					</div>
				</div>
				<div class="col-md-3">
					<div class="metric">
						<span class="icon"><i class="fa fa-user"></i></span>
						<p>
							<span class="number">{{totalDosen()}}</span>
							<span class="title">Total Dosen</span>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



@stop
