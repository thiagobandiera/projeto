@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Visualizar Categoria</h1>
@stop

@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box">

              <!-- box-header -->
                <div class="box-header with-border">
                  @include('includes.alerts')
                </div>
              <!-- /.box-header -->

              <!-- box-Body -->
                <div class="box-body">
                    <dl>
                        <dt>Nome</dt>
                        <dd>{{ $categoria->name }}</dd>
                        <br />
                        <dt>Categoria</dt>
                        <dd>{{ $categoria->categoriaPai->name }}</dd>
                    </dl>
                </div>
              <!-- /.box-Body -->

              <!-- box-Footer -->
                <div class="box-footer">
                  <a href="{{ url()->previous() }}" class="btn btn-default">Back</a>
                </div>
              <!-- /.box-Footer -->
          </div>
        </div>
    </div>
@stop