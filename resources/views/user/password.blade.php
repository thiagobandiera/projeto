@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Mudar Senha</h1>
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
	            <form action="{{ route('password.update') }}" method="POST">
	            	{!! csrf_field() !!}
	              	<div class="box-body">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Senha Atual</label>
		                  <input type="password" class="form-control" name="password_atual" placeholder="Senha Atual">
		                </div>
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Nova Senha</label>
		                  <input type="password" class="form-control" name="password_nova" placeholder="Nova Senha">
		                </div>
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Repita a Senha </label>
		                  <input type="password" class="form-control" name="password_repitir" placeholder="Repita a Senha">
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