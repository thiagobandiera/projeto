@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Fluxo de Caixa</h1>
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
	            <form action="{{ route('fluxoCaixaGerar') }}" method="POST">
	            	{!! csrf_field() !!}
	              	<div class="box-body">
	              		<div class="row">
	                        <div class="col-md-6">
	                          <div class="form-group">
	                            <label>Conta</label>
	                            {{ Form::select('conta_id', $contas, null, ['class' => 'form-control', 'placeholder' => 'Selecione']) }}
	                          </div>
	                        </div>
	                        <div class="col-md-6">
	                          <div class="form-group">
	                            <label>Formato</label>
	                            {{ Form::select('formato', [ 'PDF' => 'PDF', 'Excel' =>'Excel'], null, ['class' => 'form-control', 'placeholder' => 'Selecione']) }}
	                          </div>
	                        </div>
	                    </div>
						<!-- <div class="row">
	                        <div class="col-md-6">
				                <div class="form-group">
		                            <label>Data Inicial</label>
		                            <input type="date" class="form-control" name="data_inicial">  
		                        </div>
				            </div>
				            <div class="col-md-6">
				                <div class="form-group">
		                            <label>Data Final</label>
		                            <input type="date" class="form-control" name="data_final">  
		                        </div>
				            </div>
				        </div> -->
	              	</div>
	              	<!-- /.box-body -->
	              	<div class="box-footer">
		                <button type="submit" class="btn btn-primary">Gerar</button>
	              	</div>
	            </form>
	        </div>
        </div>
    </div>
@stop