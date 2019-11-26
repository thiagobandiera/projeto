@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Listar Permissões</h1>
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
                <a href="{{ route('permission.create') }}" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Nova Permissão</a>
              </div>
              <!-- /.box-header -->

              <!-- box-Body -->
                <div class="box-body">
                    <table id="datatable" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>guard name</th>
                                <th>Criado</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $permission )
                            <tr>
                                <td>{{ $permission->name }}</td>
                                <td>{{ $permission->guard_name }}</td>
                                <td>{{ date("d/m/Y H:i:s", strtotime($permission->created_at)) }}</td>
                                <td style="text-align: right;">
                                  <form action="{{ route('permission.destroy',$permission->id) }}" method="POST">
                                    <a class="btn btn-info" href="{{ route('permission.show',$permission->id) }}">Visualizar</a>
    
                                    <a class="btn btn-primary" href="{{ route('permission.edit',$permission->id) }}">Editar</a>
                   
                                    @csrf
                                    @method('DELETE')
                      
                                    <button type="submit" class="btn btn-danger">Deletar</button>
                                  </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
              <!-- /.box-Body -->
          </div>
        </div>
    </div>
@stop