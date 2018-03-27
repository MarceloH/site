@extends('app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">Albuns</div>

        <div class="panel-body">


          <a href="{!!url('admin/albuns/adicionar')!!}" title="Cadastrar">
            <input type="button" value="Novo" class="btn btn-primary">
          </a>
          <table border="0" class="table table-striped">
            <tr>
              <th>Id</th>
              <th>Título</th>
              <th>Data</th>
              <th colspan="2">Acoes</th>
            </tr>
            @forelse($albuns as $album)
            <tr>
              <td>{{ $album->id }}</td>
              <td>{{ $album->titulo }}</td>
              <td>{{ $album->data != null ? date("d/m/Y", strtotime($album->data)) : '' }}</td>
              <td>
                <!--{!! HTML::link("postagens/editar/{$album->id_album}", 'Editar') !!}-->
                <a href='{{url("admin/albuns/editar/{$album->id}")}}' title="Editar">
                  <span class="glyphicon glyphicon-pencil"></span>
                </a>
              </td>
              <td>
                <!--{!! HTML::link("postagens/deletar/{$album->id}", 'Deletar') !!} -->
                <a href='{!!url("admin/albuns/deletar/{$album->id}")!!}' title="Deletar" onclick="return confirm('Confirma exclusão?')" >
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
          {!! str_replace('/?page','?page', $albuns->render()) !!} 

        </div>
      </div>
    </div>
  </div>
</div>
@endsection