@extends('app')

@section('content')


<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">Banners</div>

        <div class="panel-body">
      

    <a href="{!!url('admin/banners/')!!}" title="Voltar">
    <input type="button" value="Voltar" class="btn btn-primary">
    </a>
    @if( isset($banner->id) )
    <h3>Editar</h3>
      {!! Form::open(array('url' => "admin/banners/editar/{$banner->id}", 'method'=>'POST', 'files'=>true)) !!}
    @else
    <h3>Cadastrar</h3>
      {!! Form::open(array('url'=>'admin/banners/adicionar','method'=>'POST', 'files'=>true)) !!}
    @endif

    @if(count($errors) > 0)
    <div class="alert alert-danger">
      @foreach($errors->all() as $message)
        <p>{!! $message !!}</p>
      @endforeach
    </div>
    @endif
    <div class='form-group'>
      {!! Form::text('titulo', isset($banner->titulo) ? $banner->titulo : '', array('placeholder' => 'Título','class'=>'form-control') ) !!}
    </div>

    <div class='form-group'>
      {!! Form::text('link', isset($banner->link) ? $banner->link : '', array('placeholder' => 'Link','class'=>'form-control') ) !!}
    </div>

    <div class='form-group'>
      {!! Form::file('foto') !!}
      <span class="text-danger">Resolução ideal para imagem: 1690x600</span>
      @if(isset($banner->foto))
        <img id="fotos" src="{{ url() }}/arquivos/banner/{{ $banner->foto }}" >
        {!! Form::hidden('foto',$banner->foto) !!}
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