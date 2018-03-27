@extends('app')

@section('content')


<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">Pastor</div>

        <div class="panel-body">
          

          <a href="{!!url('admin/pastores/')!!}" title="Voltar">
            <input type="button" value="Voltar" class="btn btn-primary">
          </a>
          @if( isset($pastor->id) )
          <h3>Editar</h3>
          {!! Form::open(array('url' => "admin/pastores/editar/{$pastor->id}", 'method'=>'POST', 'files'=>true)) !!}
          @else
          <h3>Cadastrar</h3>
          {!! Form::open(array('url'=>'admin/pastores/adicionar','method'=>'POST', 'files'=>true)) !!}
          @endif

          @if(count($errors) > 0)
          <div class="alert alert-danger">
            @foreach($errors->all() as $message)
            <p>{!! $message !!}</p>
            @endforeach
          </div>
          @endif
          <div class='form-group'>
            {!! Form::text('nome', isset($pastor->nome) ? $pastor->nome : '', array('placeholder' => 'Nome','class'=>'form-control') ) !!}
          </div>
          <div class='form-group'>
            {!! Form::text('categoria', isset($pastor->categoria) ? $pastor->categoria : '', array('placeholder' => 'Categoria','class'=>'form-control') ) !!}
          </div>
          <div class='form-group'>
            {!! Form::textarea('observacao', isset($pastor->observacao) ? $pastor->observacao : '', array('placeholder' => 'Observação','class'=>'form-control') ) !!}
          </div>

          <div class='form-group'>
            {!! Form::file('foto') !!}
            <span class="text-danger">Resolução ideal para imagem: 350x210</span>
            @if(isset($pastor->foto))
            <img id="fotos" src="{{ url() }}/arquivos/pastor/{{ $pastor->foto }}" >
            {!! Form::hidden('foto',$pastor->foto) !!}
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