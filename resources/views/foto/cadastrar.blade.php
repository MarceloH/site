@extends('app')

@section('content')


<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">Fotos</div>

        <div class="panel-body">
      

    <a href="{!!url('admin/fotos/')!!}" title="Voltar">
    <input type="button" value="Voltar" class="btn btn-primary">
    </a>
    @if( isset($foto->id) )
    <h3>Editar</h3>
      {!! Form::open(array('url' => "admin/fotos/editar/{$foto->id}", 'method'=>'POST', 'files'=>true)) !!}
    @else
    <h3>Cadastrar</h3>
      {!! Form::open(array('url'=>'admin/fotos/adicionar','method'=>'POST', 'files'=>true)) !!}
    @endif

    @if(count($errors) > 0)
    <div class="alert alert-danger">
      @foreach($errors->all() as $message)
        <p>{!! $message !!}</p>
      @endforeach
    </div>
    @endif
    <div class='form-group'>
      {!! Form::text('titulo', isset($foto->titulo) ? $foto->titulo : '', array('placeholder' => 'Título','class'=>'form-control') ) !!}
    </div>

    <div class='form-group'>
      {!! Form::select('id_album',$aAlbum , 
      isset($foto->id_album) ? $foto->id_album : '', array('class'=>'form-control') ) !!}
    </div>

    <div class='form-group'>
      {!! Form::file('foto') !!}
      <span class="text-danger">Resolução ideal para imagem: 1140x475</span>
      @if(isset($foto->foto))
        <img id="fotos" src="{{ url() }}/arquivos/foto/{{ $foto->foto }}" >
        {!! Form::hidden('foto',$foto->foto) !!}
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