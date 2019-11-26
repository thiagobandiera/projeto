@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Listar Transações</h1>
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
                <a href="{{ route('transacao.create') }}" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Nova Transação</a>
              </div>
              <!-- /.box-header -->

              <!-- box-Body -->
                <div class="box-body">
                    <table id="datatable" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Data</th>
                                <th>Descrição</th>
                                <th>Categoria</th>
                                <th>Conta</th>
                                <th>Conta Transferencia</th>
                                <th>Valor</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transacoes as $transacao )
                            <tr>
                                <td>{{ date("d/m/Y", strtotime($transacao->data)) }}</td>

                                <td>{{ $transacao->descricao }}</td>

                                @if ($transacao->tipo != "T")
                                  <td>{{ $transacao->categoria->name }}</td>
                                @else
                                  <td>Transferência</td>
                                @endif

                                <td>{{ $transacao->conta->name }}</td>

                                @if ($transacao->tipo == "T")
                                  <td>{{ $transacao->conta_transfer->name }}</td>
                                @else
                                  <td> - </td>
                                @endif

                                <td>RS {{ number_format($transacao->valor,2,',','.') }}</td>

                                <td style="text-align: right;">
                                  <form action="{{ route('transacao.destroy',$transacao->id) }}" method="POST">
                                    <a class="btn btn-info" href="{{ route('transacao.show',$transacao->id) }}">Visualizar</a>
    
                                    <a class="btn btn-primary" href="{{ route('transacao.edit',$transacao->id) }}">Editar</a>
                   
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