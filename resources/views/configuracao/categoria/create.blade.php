@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Cadastrar Nova Categoria</h1>
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

                <form action="{{ route('categoria.store') }}" method="POST">
                  {!! csrf_field() !!}
                  
                  <!-- box-Body -->
                    <div class="box-body">
                      <div class="row">
                          <div class="col-md-6">  
                              <div class="form-group">
                                  <label>Nome</label>
                                  <input type="text" class="form-control" name="name" placeholder="Nome">
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label>Categoria Pai</label>
                                  {{ Form::select('categoria_id', $categorias_pai, null , ['class' => 'form-control', 'placeholder' => 'Selecione'] ) }}
                              </div>
                          </div>
                      </div>
                    </div>
                  <!-- /.box-body -->

                  <!-- box-Footer -->
                    <div class="box-footer">
                      <button type="submit" class="btn btn-primary">Salvar</button>
                      <a href="{{ url()->previous() }}" class="btn btn-default">Back</a>
                    </div>
                  <!-- /.box-Footer -->
                  
                </form>
          </div>
        </div>
    </div>
@stop