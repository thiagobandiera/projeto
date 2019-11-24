@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Editar Contas</h1>
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

                <form action="{{ route('conta.update', $conta->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- box-Body -->
                      <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">  
                                <div class="form-group">
                                    <label>Nome</label>
                                    <input type="text" class="form-control" name="name" placeholder="Nome", value="{{ $conta->name }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Saldo Inicial</label>
                                    <input type="text" class="form-control" name="saldo_inicial" placeholder="Saldo Inicial" value="{{ $conta->saldo_inicial }}">
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