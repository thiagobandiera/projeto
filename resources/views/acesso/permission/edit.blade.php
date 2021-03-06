@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Editar Permissão</h1>
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

                <form action="{{ route('permission.update', $permission->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- box-Body -->
                      <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">  
                                <div class="form-group">
                                    <label>Nome</label>
                                    <input type="text" class="form-control" name="name" placeholder="Nome", value="{{ $permission->name }}">
                                </div>
                            </div>
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