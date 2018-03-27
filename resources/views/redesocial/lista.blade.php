@extends('app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">Redes Sociais</div>

        <div class="panel-body">
      

<a href='{{url("admin/redessociais/adicionar/")}}' title="Cadastrar" >
<input type="button" value="Novo" class="btn btn-primary">
</a>
    <table border="0" class="table table-striped">
          <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Link</th>
            <th colspan="2">Acoes</th>
          </tr>
          @forelse($redessociais as $redesocial)
          <tr>
            <td>{{ $redesocial->id }}</td>
            <td>{{ $redesocial->nome }}</td>
            <td>{{ $redesocial->link }}</td>
            <td>
            <a href='{{url("admin/redessociais/editar/{$redesocial->id}")}}' title="Editar">
              <span class="glyphicon glyphicon-pencil"></span>
            </a>
            </td>
            <td>
            <a href='{!!url("admin/redessociais/deletar/{$redesocial->id}")!!}' title="Deletar" onclick="return confirm('Confirma exclusão?')">
              <span class="glyphicon glyphicon-remove"></span>
            </a>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="3">Sem Resultado</td>
          </tr>
          @endforelse
        </table>
{!! str_replace('/?page','?page', $redessociais->render()) !!}        


        </div>
        </div>
    </div>
  </div>
</div>
@endsection