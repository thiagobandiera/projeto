@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
	
	<div class="container-fluid">
		<div class="row">
			@can('user.create')
				<div class="col-lg-6 col-6">
				    <!-- small box -->
				    <div class="small-box bg-info">
				      <div class="inner">
				        <h3>{{ $userOnline }}</h3>

				        <p>Usuarios Online</p>
				      </div>
				      <div class="icon">
				        <i class="ion ion-person"></i>
				      </div>
				      <a href="{{ route('online') }}" class="small-box-footer">Mais Informações <i class="fas fa-arrow-circle-right"></i></a>
				    </div>
			  	</div>
		  	@endcan
		<div class="row">
		  	<div class="col-lg-6 col-6">
			    <!-- small box -->
			    <div class="small-box bg-danger">
			      <div class="inner">
			        <h3>R$ {{ number_format($saldoTotal,2,',','.') }}</h3>

			        <p>Valor em suas contas</p>
			      </div>
			      <div class="icon">
			        <i class="ion ion-cash"></i>
			      </div>
			      <a href="{{ route('transacao.index') }}" class="small-box-footer">Mais Informações <i class="fas fa-arrow-circle-right"></i></a>
			    </div>
		  	</div>
		</div>
	</div>
@stop