@extends('app')

@section('content')


<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
      <div class="panel-heading">Redes Sociais</div>

        <div class="panel-body">


          <a href="{!!url('admin/redessociais/')!!}" title="Voltar">
            <input type="button" value="Voltar" class="btn btn-primary">
          </a>
          @if( isset($redesocial->id) )
          <h3>Editar</h3>
          {!! Form::open(array('url' => "admin/redessociais/editar/{$redesocial->id}", 'method'=>'POST', 'files'=>true)) !!}
          @else
          <h3>Cadastrar</h3>
          {!! Form::open(array('url'=>'admin/redessociais/adicionar','method'=>'POST', 'files'=>true)) !!}
          @endif

          @if(count($errors) > 0)
          <div class="alert alert-danger">
            @foreach($errors->all() as $message)
            <p>{!! $message !!}</p>
            @endforeach
          </div>
          @endif
          <div class='form-group'>
            {!! Form::select('nome',[null => 'Redes Sociais', 'Facebook' => 'Facebook', 
            'Twitter' => 'Twitter'], 
            isset($redesocial->nome) ? $redesocial->nome : '', array('class'=>'form-control') ) !!}
          </div>

          <div class='form-group'>
            {!! Form::text('link', isset($redesocial->link) ? $redesocial->link : '', array('placeholder' => 'Link','class'=>'form-control') ) !!}
          </div>


          {!! Form::submit('Salvar',array('class'=>'btn btn-success')) !!}
          {!! Form::close() !!}


        </div>
      </div>
    </div>
  </div>
</div>

@endsection