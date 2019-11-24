@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Visualizar Transação</h1>
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

              <!-- box-Body -->
                <div class="box-body">
                    <dl>
                        <dt>Data</dt>
                        <dd>{{ $transacao->data }}</dd>
                        <br />
                        <dt>Tipo</dt>
                        <dd>{{ $transacao->tipo }}</dd>
                        <br />
                        <dt>Descrição</dt>
                        <dd>{{ $transacao->descricao }}</dd>
                        <br />
                        @if( $transacao->tipo != "T" )
                          <dt>Categoria</dt>
                          <dd>{{ $transacao->categoria->name }}</dd>
                          <br />
                        @endif
                        <dt>Conta</dt>
                        <dd>{{ $transacao->conta->name }}</dd>
                        <br />
                        @if( $transacao->tipo == "T")
                          <dt>Conta Transferencia</dt>
                          <dd>{{ $transacao->conta_transfer->name }}</dd>
                          <br />
                        @endif
                        <dt>Valor</dt>
                        <dd>{{ number_format($transacao->valor,2,',','.') }}</dd>

                    </dl>
                </div>
              <!-- /.box-Body -->

              <!-- box-Footer -->
                <div class="box-footer">
                  <a href="{{ url()->previous() }}" class="btn btn-default">Back</a>
                </div>
              <!-- /.box-Footer -->
          </div>
        </div>
    </div>
@stop