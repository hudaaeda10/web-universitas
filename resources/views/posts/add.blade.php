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
                        <h3 class="panel-title">Add New Posts</h3>                        
                    </div>
                        <div class="panel-body">      
                            <div class="row">
                                <div class="col-md-8">
                                    <form action="{{route('posts.create')}}" method="POST" enctype="multipart/form-data"> <!-- tambahan action mengarah kepada root yang ingin di jalankan dan method untuk pengiriman data ke database -->
                                        {{csrf_field()}} <!-- untuk memberikan token pada form -->
                                    <div class="form-group{{$errors->has('title') ? ' has-error' : ''}}"> <!--untuk memberikan pesan error ketika terjadi error pada validasi di mahasiswa controller -->
                                        <label for="exampleInputEmail1">Title</label>
                                        <!--bagian name="..." untuk menangkap data yang kita masukkan pada form -->
                                        <input name="title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Title" value="{{old('title')}}">
                                        @if($errors->has('title'))
                                        <span class="help-block">{{$errors->first('title')}}</span>
                                        @endif
                                    </div> 

                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Content</label>
                                        <textarea name="content" class="form-control" id="content" rows="3">{{old('content')}}</textarea>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                        <i class="fa fa-picture-o"></i> Choose
                                        </a>
                                    </span>
                                    <input id="thumbnail" class="form-control" type="text" name="thumbnail">
                                    </div>
                                    <img id="holder" style="margin-top:15px;max-height:100px;">

                                    <div class="input-group">
                                        <input type="submit" class="btn btn-info" value="Submit">
                                    </div>
                                </div>
                                
                            </div>
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
<script src="/vendor/laravel-filemanager/js/lfm.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#content' ) )
        .catch( error => {
            console.error( error );
        } );

        $(document).ready(function(){
            $('#lfm').filemanager('image');
        });
</script>
@stop