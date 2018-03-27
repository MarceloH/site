@extends('app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">Fotos</div>

        <div class="panel-body">
          

          <a href="{!!url('admin/fotos/adicionar')!!}" title="Cadastrar">
            <input type="button" value="Novo" class="btn btn-primary">
          </a>
          <table border="0" class="table table-striped">
            <tr>
              <th>Id</th>
              <th>Título</th>
              <th>Album</th>
              <th>Data</th>
              <th colspan="2">Acoes</th>
            </tr>
            @forelse($fotos as $foto)
            <tr>
              <td>{{ $foto->id }}</td>
              <td>{{ $foto->titulo }}</td>
              <td>{{ str_limit($foto->album, 50, "...") }}</td>
              <td>{{ $foto->created_at != null ? date("d/m/Y", strtotime($foto->created_at)) : '' }}</td>
              <td>
                
                <a href='{{url("admin/fotos/editar/{$foto->id}")}}' title="Editar">
                  <span class="glyphicon glyphicon-pencil"></span>
                </a>
              </td>
              <td>
                <!--{!! HTML::link("postagens/deletar/{$foto->id}", 'Deletar') !!} -->
                <a href='{!!url("admin/fotos/deletar/{$foto->id}")!!}' title="Deletar" onclick="return confirm('Confirma exclusão?')" >
                  <span class="glyphicon glyphicon-remove"></span>
                </a>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="3">Nenhuma Foto</td>
            </tr>
            @endforelse
          </table>
          {!! str_replace('/?page','?page', $fotos->render()) !!}        

        <!--<ul class="pagination">
        <li class="disabled"><span>«</span></li> <li class="active"><span>1</span></li><li>
        <a href='{!!url("fotos/page/2")!!}' >2</a></li> 
        <li><a href='{!!url("fotos/page/2")!!}' rel="next">»</a></li></ul> -->


      </div>
    </div>
  </div>
</div>
</div>
@endsection