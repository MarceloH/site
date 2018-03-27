@extends('app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">Contatos</div>

        <div class="panel-body">
          
          <a href='{!!url("#")!!}' title="Cadastrar" >
            <input type="button" value="Novo" class="btn btn-primary disabled">
          </a>
          <table border="0" class="table table-striped">
            <tr>
              <th>Id</th>
              <th>Nome</th>
              <th>Telefone</th>
              <th>Email</th>
              <th colspan="2">Acoes</th>
            </tr>
            @forelse($contatos as $contato)
            <tr>
              <td>{{ $contato->id }}</td>
              <td>{{ $contato->nome }}</td>
              <td>{{ $contato->telefone }}</td>
              <td>{{ $contato->email }}</td>
              <td>
                
                <a href='{{url("admin/contatos/editar/{$contato->id}")}}' title="Editar">
                  <span class="glyphicon glyphicon-pencil"></span>
                </a>
              </td>
              <td>
                
                <a href='{!!url("#")!!}' title="Deletar" >
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


        </div>
      </div>
    </div>
  </div>
</div>
@endsection