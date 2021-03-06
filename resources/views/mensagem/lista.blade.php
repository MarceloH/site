@extends('app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">Mensagens</div>

        <div class="panel-body">


          <a href="{!!url('admin/mensagens/adicionar')!!}" title="Cadastrar">
            <input type="button" value="Novo" class="btn btn-primary">
          </a>
          <table border="0" class="table table-striped">
            <tr>
              <th>Id</th>
              <th>Título</th>
              <th>Data</th>
              <th colspan="2">Acoes</th>
            </tr>
            @forelse($mensagens as $mensagem)
            <tr>
              <td>{{ $mensagem->id }}</td>
              <td>{{ $mensagem->titulo }}</td>
              <td>{{ $mensagem->data != null ? date("d/m/Y", strtotime($mensagem->data)) : '' }}</td>
              <td>
                <a href='{{url("admin/mensagens/editar/{$mensagem->id}")}}' title="Editar">
                  <span class="glyphicon glyphicon-pencil"></span>
                </a>
              </td>
              <td>
              <a href='{!!url("admin/mensagens/deletar/{$mensagem->id}")!!}' title="Deletar" onclick="return confirm('Confirma exclusão?')">
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
          {!! str_replace('/?page','?page', $mensagens->render()) !!} 

        </div>
      </div>
    </div>
  </div>
</div>
@endsection