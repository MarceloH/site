@extends('app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">Usuários</div>

        <div class="panel-body">
      

<a href="{!!url('admin/users/adicionar')!!}" title="Cadastrar">
<input type="button" value="Novo" class="btn btn-primary">
</a>
    @if(count($errors) > 0)
    <div class="alert alert-danger">
      @foreach($errors->all() as $message)
      <p>{!! $message !!}</p>
      @endforeach
    </div>
    @endif
    <table border="0" class="table table-striped">
          <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Data</th>
            <th colspan="2">Acoes</th>
          </tr>
          @forelse($users as $user)
          <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->nome }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->created_at != null ? date("d/m/Y", strtotime($user->created_at)) : '' }}</td>
            <td>
            <!--{!! HTML::link("postagens/editar/{$user->id_user}", 'Editar') !!}-->
            <a href='{{url("admin/users/editar/{$user->id}")}}' title="Editar">
              <span class="glyphicon glyphicon-pencil"></span>
            </a>
            </td>
            <td>
            <!--{!! HTML::link("postagens/deletar/{$user->id}", 'Deletar') !!} -->
            <a href='{!!url("admin/users/deletar/{$user->id}")!!}' title="Deletar" onclick="return confirm('Deletar Usuário?')">
              <span class="glyphicon glyphicon-remove"></span>
            </a>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="3">Nenhum Usuário</td>
          </tr>
          @endforelse
        </table>
{!! str_replace('/?page','?page', $users->render()) !!}


        </div>
        </div>
    </div>
  </div>
</div>
@endsection