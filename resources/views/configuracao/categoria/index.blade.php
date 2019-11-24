@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Listar Categoria</h1>
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
                <a href="{{ route('categoria.create') }}" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Nova Categoria</a>
              </div>
              <!-- /.box-header -->

              <!-- box-Body -->
                <div class="box-body">
                    <table id="datatable" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Categoria Pai</th>
                                <th>Criado</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categorias as $categoria )
                            <tr>
                                <td>{{ $categoria->name }}</td>
                                @if ($categoria->categoriaPai)
                                    <td>{{ $categoria->categoriaPai->name }}</td>
                                @else
                                    <td>-</td>
                                @endif
                                <td>{{ $categoria->created_at }}</td>
                                <td style="text-align: right;">
                                  <form action="{{ route('categoria.destroy',$categoria->id) }}" method="POST">
                                    <a class="btn btn-info" href="{{ route('categoria.show',$categoria->id) }}">Visualizar</a>
    
                                    <a class="btn btn-primary" href="{{ route('categoria.edit',$categoria->id) }}">Editar</a>
                   
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