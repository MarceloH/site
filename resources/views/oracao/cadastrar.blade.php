@extends('app')

@section('content')


<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
      <div class="panel-heading">Motivo de Oração</div>

        <div class="panel-body">


          <a href="{!!url('admin/oracoes/')!!}" title="Voltar">
            <input type="button" value="Voltar" class="btn btn-primary">
          </a>
          @if( isset($oracao->id) )
          <h3>Editar</h3>
          {!! Form::open(array('url' => "admin/oracoes/editar/{$oracao->id}", 'method'=>'POST', 'files'=>true)) !!}
          @else
          <h3>Cadastrar</h3>
          {!! Form::open(array('url'=>'admin/oracoes/adicionar','method'=>'POST', 'files'=>true)) !!}
          @endif

          @if(count($errors) > 0)
          <div class="alert alert-danger">
            @foreach($errors->all() as $message)
            <p>{!! $message !!}</p>
            @endforeach
          </div>
          @endif

          <div class='form-group'>
            {!! Form::text('motivo', isset($oracao->motivo) ? $oracao->motivo : '', array('placeholder' => 'Motivo','class'=>'form-control') ) !!}
          </div>

          {!! Form::submit('Salvar',array('class'=>'btn btn-success')) !!}
          {!! Form::close() !!}


        </div>
      </div>
    </div>
  </div>
</div>

@endsection