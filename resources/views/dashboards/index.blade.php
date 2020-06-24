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
							<h3 class="panel-title">Mata Kuliah</h3>
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
									@foreach($mahasiswa as $m)									
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
			</div>
		</div>
	</div>
</div>



@stop
