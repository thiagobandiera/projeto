@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Listar Usuarios</h1>
@stop

@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box">

              <!-- box-header -->
              <div class="box-header with-border"> @include('includes.alerts')
                @can('user.create')
                  <a href="{{ route('user.create') }}" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Novo Usuario</a>
                @endcan
              </div>
              <!-- /.box-header -->

              <!-- box-Body -->
                <div class="box-body">
                    <table id="datatable" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Perfil</th>
                                <th>Criado</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user )
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                  @if(!empty($user->getRoleNames()))
                                    @foreach($user->getRoleNames() as $v)
                                       <label class="badge badge-success">{{ $v }}</label>
                                    @endforeach
                                  @endif
                                </td>
                                <td>{{ date("d/m/Y", strtotime($user->created_at)) }}</td>
                                <td style="text-align: right;">
                                  <form action="{{ route('user.destroy',$user->id) }}" method="POST">
                                    @can('user.show')
                                      <a class="btn btn-info" href="{{ route('user.show',$user->id) }}">Visualizar</a>
                                    @endcan
                                    @can('user.edit')
                                      <a class="btn btn-primary" href="{{ route('user.edit',$user->id) }}">Editar</a>
                                    @endcan
                                    @can('user.destroy')
                                      @csrf
                                      @method('DELETE')
                            
                                      <button type="submit" class="btn btn-danger">Deletar</button>
                                    @endcan
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