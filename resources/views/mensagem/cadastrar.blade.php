@extends('app')

@section('content')


<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">Mensagem</div>

        <div class="panel-body">


          <a href="{!!url('admin/mensagens/')!!}" title="Voltar">
            <input type="button" value="Voltar" class="btn btn-primary">
          </a>
          @if( isset($mensagem->id) )
          <h3>Editar</h3>
          {!! Form::open(array('url' => "admin/mensagens/editar/{$mensagem->id}", 'method'=>'POST', 'files'=>true)) !!}
          @else
          <h3>Cadastrar</h3>
          {!! Form::open(array('url'=>'admin/mensagens/adicionar','method'=>'POST', 'files'=>true)) !!}
          @endif

          @if(count($errors) > 0)
          <div class="alert alert-danger">
            @foreach($errors->all() as $message)
            <p>{!! $message !!}</p>
            @endforeach
          </div>
          @endif
          <div class='form-group'>
            {!! Form::text('titulo', isset($mensagem->titulo) ? $mensagem->titulo : '', array('placeholder' => 'Título','class'=>'form-control') ) !!}
          </div>
          <div class='form-group'>
            {!! Form::textarea('descricao', isset($mensagem->descricao) ? $mensagem->descricao : '', array('placeholder' => 'Descrição','class'=>'form-control') ) !!}
          </div>

          <div class='form-group'>
            <div class="input-group date">
              {!! Form::text('data', isset($mensagem->data) ? date('d/m/Y',strtotime($mensagem->data)) : '', 
              array('placeholder' => 'Data','class'=>'form-control') ) !!}
              <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
            </div>
          </div>

          <div class='form-group'>
          {!! Form::file('audio') !!}
            @if(isset($mensagem->audio))
            <audio controls>
              <source src="{{ url() }}/arquivos/mensagem/{{ $mensagem->audio }}" type="audio/mpeg" />
            </audio>
            {!! Form::hidden('audio',$mensagem->audio) !!}
            @endif
          </div>


          {!! Form::submit('Salvar',array('class'=>'btn btn-success')) !!}
          {!! Form::close() !!}


        </div>
      </div>
    </div>
  </div>
</div>

@endsection