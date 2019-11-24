@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Listar Contas</h1>
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
                <a href="{{ route('conta.create') }}" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Nova Conta</a>
              </div>
              <!-- /.box-header -->

              <!-- box-Body -->
                <div class="box-body">
                    <table id="datatable" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Saldo Incial</th>
                                <th>Criado</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contas as $conta )
                            <tr>
                                <td>{{ $conta->name }}</td>
                                <td>R$ {{ number_format($conta->saldo_inicial, 2, ',', '') }}</td>
                                <td>{{ $conta->created_at }}</td>
                                <td style="text-align: right;">
                                  <form action="{{ route('conta.destroy',$conta->id) }}" method="POST">
                                    <a class="btn btn-info" href="{{ route('conta.show',$conta->id) }}">Visualizar</a>
    
                                    <a class="btn btn-primary" href="{{ route('conta.edit',$conta->id) }}">Editar</a>
                   
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