@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Meu Perfil</h1>
@stop

@section('content')
  	<div class="row">
        <!-- left column -->
        <div class="col-md-12">
	        <!-- general form elements -->
	        <div class="box">
	            <div class="box-header with-border">

				@include('includes.alerts')

	            </div>
	            <!-- /.box-header -->
	            <!-- form start -->
	            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
	            	{!! csrf_field() !!}
	              	<div class="box-body">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Nome</label>
		                  <input type="text" class="form-control" name="name" placeholder="Nome" value="{{ auth()->user()->name }}">
		                </div>
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Email</label>
		                  <input type="email" class="form-control" name="email" placeholder="Email" value="{{ auth()->user()->email }}">
		                </div>
		                <div class="form-group">
		                  <label for="exampleInputFile">Imagem</label>
		                  <input type="file" name="image">
		                </div>
	              	</div>
	              	<!-- /.box-body -->
	              	<div class="box-footer">
		                <button type="submit" class="btn btn-primary">Salvar</button>
	              	</div>
	            </form>
	        </div>
        </div>
    </div>
@stop