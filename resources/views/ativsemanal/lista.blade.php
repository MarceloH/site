@extends('app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">Atividades Semanais</div>

        <div class="panel-body">
      

<a href='{{url("admin/ativsemanais/adicionar/")}}' title="Cadastrar" >
<input type="button" value="Novo" class="btn btn-primary">
</a>
    <table border="0" class="table table-striped">
          <tr>
            <th>Id</th>
            <th>Dia</th>
            <th>Horário</th>
            <th>Atividade</th>
            <th colspan="2">Acoes</th>
          </tr>
          @forelse($ativsemanais as $ativsemanal)
          <tr>
            <td>{{ $ativsemanal->id }}</td>
            <td>{{ $ativsemanal->dia }}</td>
            <td>{{ date('H:i',strtotime($ativsemanal->hora)) }}</td>
            <td>{{ $ativsemanal->atividade }}</td>
            <td>
            <a href='{{url("admin/ativsemanais/editar/{$ativsemanal->id}")}}' title="Editar">
              <span class="glyphicon glyphicon-pencil"></span>
            </a>
            </td>
            <td>
            <a href='{!!url("admin/ativsemanais/deletar/{$ativsemanal->id}")!!}' title="Deletar" onclick="return confirm('Confirma exclusão?')" >
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
{!! str_replace('/?page','?page', $ativsemanais->render()) !!}        


        </div>
        </div>
    </div>
  </div>
</div>
@endsection