@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Listar Usuarios Online</h1>
@stop

@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box">

              <!-- box-header -->
              <!-- /.box-header -->

              <!-- box-Body -->
                <div class="box-body">
                    <table id="datatable" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>IP Adress</th>
                                <th>User Agent</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($userOnline as $user )
                            <tr>
                                <td>{{ $user->user_id }}</td>
                                <td>{{ $user->ip_address }}</td>
                                <td>{{ $user->user_agent }}</td>
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