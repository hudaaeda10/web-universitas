@extends('layouts.frontend')

@section('content')
<section class="banner-area relative about-banner" id="home">	
	<div class="overlay overlay-bg"></div>
	<div class="container">				
		<div class="row d-flex align-items-center justify-content-center">
			<div class="about-content col-lg-12">
				<h1 class="text-white">
					Pendaftaran				
				</h1>	
				<p class="text-white link-nav"><a href="index.html">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="about.html"> pendaftaran</a></p>
			</div>	
		</div>
	</div>
</section>

<section class="search-course-area relative" style="background: unset;">
	<div class="container">
		<div class="row justify-content-between align-items-center">
			<div class="col-lg-4 col-md-6 search-course-left">
				<h1>
					Pendaftaran Online <br>
					SEKOLAH TINGGI INFORMATIKA
				</h1>
				<p>
					Mari bergabung bersama kami untuk memajukkan negara Indonesia dengan menghasilkan Sumber Daya Manusia yang berkualitas dari
					bidang akademik dan teknologi.
				</p>				
			</div>
			<div class="col-lg-8 col-md-6 search-course-right section-gap">
				{!! Form::open(['url' => '/postregister', 'class' => 'form-wrap']) !!}
					<h4 class="pb-20 text-center mb-30">Formulir Pendaftaran</h4>
					{!!Form::text('nama_depan', '', ['class' => 'form-control', 'placeholder' => 'Nama Depan'])!!}
					{!!Form::text('nama_belakang', '', ['class' => 'form-control', 'placeholder' => 'Nama Belakang'])!!}
					{!!Form::text('agama', '', ['class' => 'form-control', 'placeholder' => 'Agama'])!!}
					{!!Form::textarea('alamat', '', ['class' => 'form-control', 'placeholder' => 'Alamat'])!!}
					{!!Form::email('email', '', ['class' => 'form-control', 'placeholder' => 'Email'])!!}
					{!!Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password'])!!}					
					<div class="form-select" id="service-select">
						{!!Form::select('jenis_kelamin',['' => 'Pilih Jenis Kelamin','L' => 'Laki-Laki', 'P' => 'Perempuan']);!!}
					</div>
															
					<input type="submit" class="primary-btn text-uppercase" value="kirim" style="text-align: center;">
				{!! Form::close() !!}
			</div>
		</div>
	</div>	
</section>
@stop