@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Editar Perfil</h1>
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

                <form action="{{ route('role.update', $role->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- box-Body -->
                      <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">  
                                <div class="form-group">
                                    <label>Nome</label>
                                    <input type="text" class="form-control" name="name" placeholder="Nome", value="{{ $role->name }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                              <strong>Rotas:</strong>
                              <br/>
                              <br/>
                              @foreach($permissions as $value)
                                  <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                                  {{ $value->name }}</label>
                              <br/>
                              @endforeach
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