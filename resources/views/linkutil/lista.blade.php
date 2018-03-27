@extends('app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">Links Úteis</div>

        <div class="panel-body">
      

<a href="{!!url('admin/linksuteis/adicionar')!!}" title="Cadastrar" >
<input type="button" value="Novo" class="btn btn-primary ">
</a>
    <table border="0" class="table table-striped">
          <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Link</th>
            <th colspan="2">Acoes</th>
          </tr>
          @forelse($linksuteis as $linkutil)
          <tr>
            <td>{{ $linkutil->id }}</td>
            <td>{{ $linkutil->nome }}</td>
            <td>{{ $linkutil->link }}</td>
            <td>
            
            <a href='{{url("admin/linksuteis/editar/{$linkutil->id}")}}' title="Editar" >
              <span class="glyphicon glyphicon-pencil"></span>
            </a>
            </td>
            <td>
            
            <a href='{!!url("admin/linksuteis/deletar/{$linkutil->id}")!!}' title="Deletar" onclick="return confirm('Confirma exclusão?')">
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
{!! str_replace('/?page','?page', $linksuteis->render()) !!}        


        </div>
        </div>
    </div>
  </div>
</div>
@endsection