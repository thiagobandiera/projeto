@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Cadastrar Nova Transação</h1>
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

                <form action="{{ route('transacao.store') }}" method="POST">
                  {!! csrf_field() !!}
                  <!-- box-Body -->
                    <div class="box-body">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Data</label>
                            <input type="date" class="form-control" name="data">  
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Tipo</label>
                            <select name="tipo" class="form-control" v-model="form.tipo">
                              <option value="" disabled selected="selected">Selecione</option>
                              <option value="O">Despesa</option>
                              <option value="I">Receita</option>
                              <option value="T">Transferência</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">  
                          <div class="form-group">
                            <label>Descrição</label>
                            <input type="text" class="form-control" name="descricao" placeholder="Descrição">
                          </div>
                        </div>
                        <div class="col-md-6" v-if="form.tipo !='T'">
                          <div class="form-group">
                            <label>Categoria</label>
                            {{ Form::select('categoria_id', $categorias, null, ['class' => 'form-control', 'placeholder' => 'Selecione']) }}
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Conta</label>
                            {{ Form::select('conta_id', $contas, null, ['class' => 'form-control', 'placeholder' => 'Selecione']) }}
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Valor</label>
                            <input type="text" class="form-control" name="valor" placeholder="valor">
                          </div>
                        </div>
                      </div>
                      <div class="row" v-if="form.tipo == 'T'">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Conta Transferencia</label>
                            {{ Form::select('conta_id_transaction', $contas, null, ['class' => 'form-control', 'placeholder' => 'Selecione']) }}
                          </div>
                        </div>
                      </div>
                    </div>
                  <!-- /.box-body -->

                  <!-- box-Footer -->
                    <div class="box-footer">
                      <button type="submit" class="btn btn-primary">Salvar</button>
                      <a href="{{ url()->previous() }}" class="btn btn-default">Back</a>
                    </div>
                  <!-- /.box-Footer -->
                  
                </form>
          </div>
        </div>
    </div>
@stop

@section('js')
    <script type="text/javascript">
        var app = new Vue({
            el: "#app",
            data: function () {
              return {
                form: {
                  tipo: ''
                }
              }
            }
        });
    </script>
@stop