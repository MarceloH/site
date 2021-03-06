@extends('app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">Pastorais</div>

        <div class="panel-body">
      

<a href='{{url("admin/pastorais/adicionar/")}}' title="Cadastrar" >
<input type="button" value="Novo" class="btn btn-primary">
</a>
    <table border="0" class="table table-striped">
          <tr>
            <th>Id</th>
            <th>Título</th>
            <th>Texto</th>
            <th colspan="2">Acoes</th>
          </tr>
          @forelse($pastorais as $pastoral)
          <tr>
            <td>{{ $pastoral->id }}</td>
            <td>{{ $pastoral->titulo }}</td>
            <td>{{ str_limit(strip_tags($pastoral->texto), 50, "...") }}</td>
            <td>
            <a href='{{url("admin/pastorais/editar/{$pastoral->id}")}}' title="Editar">
              <span class="glyphicon glyphicon-pencil"></span>
            </a>
            </td>
            <td>
            <a href='{!!url("admin/pastorais/deletar/{$pastoral->id}")!!}' title="Deletar" onclick="return confirm('Confirma exclusão?')" >
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
{!! str_replace('/?page','?page', $pastorais->render()) !!}        


        </div>
        </div>
    </div>
  </div>
</div>
@endsection