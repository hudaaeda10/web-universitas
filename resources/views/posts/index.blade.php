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
									<h3 class="panel-title">Posts</h3>
                  <div class="right">
                    <a href="{{route('posts.add')}}" class="btn btn-sm btn-primary">Add Posts</a>
                  </div>
								</div>
								<div class="panel-body">
									<table class="table table-hover">
										<thead>
											<tr>
                        <th>ID</th>
                        <th>TITILE</th>
                        <th>USER</th>
                        <th>ACTION</th>
											</tr>
										</thead>
										<tbody>
                      @foreach($posts as $post)
                      <tr>
                      <td>{{$post->id}}</td>           
                      <td>{{$post->title}}</td>
                      <td>{{$post->user_id}}</td>
                        <td>
                          <a target="_blank" href="{{route('site.single.post', $post->slug)}}" class="btn btn-info btn-sm">View</a>                          
                          <a href="#" class="btn btn-warning btn-sm">Edit</a>
                          <!-- Memberikan notifikasi jika ingin menghapus sebuah data -->
                          <a href="#" class="btn btn-danger btn-sm delete">Delete</a>
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
@stop

@section('footer')
  <script>
    $('.delete').click(function(){
      var mahasiswa_id = $(this).attr('mahasiswa-id');
      var mahasiswa_nama = $(this).attr('mahasiswa-nama');
      swal({
        title: "Yakin?",
        text: "Mau di hapus mahasiswa dengan nama " +mahasiswa_nama+" ??",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          window.location = "/mahasiswa/"+mahasiswa_id+"/delete";
        }
      });
          });
  </script>
@stop
