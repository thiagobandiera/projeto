@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Editar Usuario</h1>
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
              <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputName">Nome</label>
                      <input type="text" class="form-control" name="name" placeholder="{{ trans('adminlte::adminlte.full_name') }}" value="{{ $user->name }}" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail">Email</label>
                      <input type="email" class="form-control" name="email" placeholder="{{ trans('adminlte::adminlte.email') }}" value="{{ $user->email }}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword">Senha</label>
                      <input type="password" class="form-control" name="password" placeholder="{{ trans('adminlte::adminlte.password') }}">
                    </div>
                    <div class="form-group">
                        <label>Perfil</label>
                        {{ Form::select('role_id', $roles, $UserRoles, ['class' => 'form-control', 'placeholder' => 'Selecione'] ) }}
                    </div>
                  </div>
                  <!-- /.box-body -->
                  <!-- box-Footer -->
                      <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Alterar</button>
                        <a href="{{ url()->previous() }}" class="btn btn-default">Back</a>
                      </div>
                    <!-- /.box-Footer -->
              </form>
          </div>
        </div>
    </div>
@stop