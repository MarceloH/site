@extends('app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">Endereço</div>

        <div class="panel-body">
      
@if(count($enderecos) == 0)
  <a href='{{url("admin/enderecos/adicionar/")}}' title="Cadastrar" >
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
            <th>Bairro</th>
            <th>Cidade</th>
            <th colspan="2">Acoes</th>
          </tr>
          @forelse($enderecos as $endereco)
          <tr>
            <td>{{ $endereco->id }}</td>
            <td>{{ $endereco->endereco }}</td>
            <td>{{ $endereco->bairro }}</td>
            <td>{{ $endereco->cidade }}</td>
            <td>
            
            <a href='{{url("admin/enderecos/editar/{$endereco->id}")}}' title="Editar">
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