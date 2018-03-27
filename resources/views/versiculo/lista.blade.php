@extends('app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">Versículo</div>

        <div class="panel-body">
      
@if(count($versiculos) == 0)
  <a href='{{url("admin/versiculos/adicionar/")}}' title="Cadastrar" >
  <input type="button" value="Novo" class="btn btn-primary ">
@else
  <a href='{!!url("#")!!}' title="Cadastrar" >
  <input type="button" value="Novo" class="btn btn-primary disabled">
@endif
</a>
    <table border="0" class="table table-striped">
          <tr>
            <th>Id</th>
            <th>Endereço</th>
            <th colspan="2">Acoes</th>
          </tr>
          @forelse($versiculos as $versiculo)
          <tr>
            <td>{{ $versiculo->id }}</td>
            <td>{{ $versiculo->versiculo }}</td>
            <td>
            
            <a href='{{url("admin/versiculos/editar/{$versiculo->id}")}}' title="Editar">
              <span class="glyphicon glyphicon-pencil"></span>
            </a>
            </td>
            <td>
            
            <a href='{!!url("#")!!}' title="Deletar" >
              <span class="glyphicon glyphicon-remove disabled"></span>
            </a>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="3">Sem Resultado</td>
          </tr>
          @endforelse
        </table>


        </div>
        </div>
    </div>
  </div>
</div>
@endsection