@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Editar Transação</h1>
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

                <form action="{{ route('transacao.update', $transacao->id) }}" method="POST">
                  @csrf
                  @method('PUT')
                  
                  <!-- box-Body -->
                    <div class="box-body">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Data</label>
                            <input type="date" class="form-control" name="data" value="{{ $transacao->data }}">  
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Tipo</label>
                            {{ Form::select('tipo', ['O'=>'Despesa ', 'I'=>'Receita', 'T'=>'Transferência'], $transacao->tipo, ['class' => 'form-control', 'placeholder' => 'Selecione']) }}
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">  
                          <div class="form-group">
                            <label>Descrição</label>
                            <input type="text" class="form-control" name="descricao" placeholder="Descrição" value="{{ $transacao->descricao }}">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Categoria</label>
                            {{ Form::select('categoria_id', $categorias, $transacao->categoria_id, ['class' => 'form-control', 'placeholder' => 'Selecione']) }}
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Conta</label>
                            {{ Form::select('conta_id', $contas, $transacao->conta_id, ['class' => 'form-control', 'placeholder' => 'Selecione']) }}
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Valor</label>
                            <input type="text" class="form-control" name="valor" placeholder="valor" value="{{ $transacao->valor }}">
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