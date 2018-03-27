@extends('app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">Banners</div>

        <div class="panel-body">
      

<a href="{!!url('admin/banners/adicionar')!!}" title="Cadastrar">
<input type="button" value="Novo" class="btn btn-primary">
</a>
    <table border="0" class="table table-striped">
          <tr>
            <th>Id</th>
            <th>Título</th>
            <th>Link</th>
            <th>Data</th>
            <th colspan="2">Acoes</th>
          </tr>
          @forelse($banners as $banner)
          <tr>
            <td>{{ $banner->id }}</td>
            <td>{{ $banner->titulo }}</td>
            <td>{{ $banner->link }}</td>
            <td>{{ $banner->updated_at != null ? date("d/m/Y", strtotime($banner->updated_at)) : '' }}</td>
            <td>
            <!--{!! HTML::link("postagens/editar/{$banner->id_banner}", 'Editar') !!}-->
            <a href='{{url("admin/banners/editar/{$banner->id}")}}' title="Editar">
              <span class="glyphicon glyphicon-pencil"></span>
            </a>
            </td>
            <td>
            <!--{!! HTML::link("postagens/deletar/{$banner->id}", 'Deletar') !!} -->
            <a href='{!!url("admin/banners/deletar/{$banner->id}")!!}' title="Deletar" onclick="return confirm('Confirma exclusão?')" >
              <span class="glyphicon glyphicon-remove"></span>
            </a>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="3">Nenhum Banner</td>
          </tr>
          @endforelse
        </table>
{!! str_replace('/?page','?page', $banners->render()) !!}        

        <!--<ul class="pagination">
        <li class="disabled"><span>«</span></li> <li class="active"><span>1</span></li><li>
        <a href='{!!url("banners/page/2")!!}' >2</a></li> 
        <li><a href='{!!url("banners/page/2")!!}' rel="next">»</a></li></ul> -->


        </div>
        </div>
    </div>
  </div>
</div>
@endsection