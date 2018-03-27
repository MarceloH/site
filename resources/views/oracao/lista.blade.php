@extends('app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">Motivos de Oração</div>

        <div class="panel-body">
          

          <a href='{{url("admin/oracoes/adicionar/")}}' title="Cadastrar" >
            <input type="button" value="Novo" class="btn btn-primary">
          </a>
          <table border="0" class="table table-striped">
            <tr>
              <th>Id</th>
              <th>Motivo</th>
              <th colspan="2">Acoes</th>
            </tr>
            @forelse($oracoes as $oracao)
            <tr>
              <td>{{ $oracao->id }}</td>
              <td>{{ $oracao->motivo }}</td>
              <td>
                <a href='{{url("admin/oracoes/editar/{$oracao->id}")}}' title="Editar">
                  <span class="glyphicon glyphicon-pencil"></span>
                </a>
              </td>
              <td>
                <a href='{!!url("admin/oracoes/deletar/{$oracao->id}")!!}' title="Deletar" onclick="return confirm('Confirma exclusão?')" >
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
          {!! str_replace('/?page','?page', $oracoes->render()) !!}        


        </div>
      </div>
    </div>
  </div>
</div>
@endsection