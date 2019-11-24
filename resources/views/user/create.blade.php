@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Cadastrar Novo Usuario</h1>
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

              <!-- form start -->
              <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                {!! csrf_field() !!}
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputName">Nome</label>
                      <input type="text" class="form-control" name="name" placeholder="{{ trans('adminlte::adminlte.full_name') }}" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail">Email</label>
                      <input type="email" class="form-control" name="email" placeholder="{{ trans('adminlte::adminlte.email') }}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword">Senha</label>
                      <input type="password" class="form-control" name="password" placeholder="{{ trans('adminlte::adminlte.password') }}">
                    </div>
                    <div class="form-group">
                        <label>Perfil</label>
                        {{ Form::select('role_id', $roles, null , ['class' => 'form-control', 'placeholder' => 'Selecione'] ) }}
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