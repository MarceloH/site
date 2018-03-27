@extends('app')

@section('content')


<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
      <div class="panel-heading">Avisos</div>

        <div class="panel-body">


          <a href="{!!url('admin/avisos/')!!}" title="Voltar">
            <input type="button" value="Voltar" class="btn btn-primary">
          </a>
          @if( isset($aviso->id) )
          <h3>Editar</h3>
          {!! Form::open(array('url' => "admin/avisos/editar/{$aviso->id}", 'method'=>'POST', 'files'=>true)) !!}
          @else
          <h3>Cadastrar</h3>
          {!! Form::open(array('url'=>'admin/avisos/adicionar','method'=>'POST', 'files'=>true)) !!}
          @endif

          @if(count($errors) > 0)
          <div class="alert alert-danger">
            @foreach($errors->all() as $message)
            <p>{!! $message !!}</p>
            @endforeach
          </div>
          @endif

          <div class='form-group'>
            {!! Form::text('titulo', isset($aviso->titulo) ? $aviso->titulo : '', array('placeholder' => 'Título','class'=>'form-control') ) !!}
          </div>

          <div class='form-group'>
            {!! Form::textarea('descricao', isset($aviso->descricao) ? $aviso->descricao : '', array('placeholder' => 'Descrição','class'=>'form-control') ) !!}
          </div>


          {!! Form::submit('Salvar',array('class'=>'btn btn-success')) !!}
          {!! Form::close() !!}


        </div>
      </div>
    </div>
  </div>
</div>

@endsection