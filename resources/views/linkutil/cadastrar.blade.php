@extends('app')

@section('content')


<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">Links Úteis</div>

        <div class="panel-body">
      

    <a href="{!!url('admin/linksuteis/')!!}" title="Voltar">
    <input type="button" value="Voltar" class="btn btn-primary">
    </a>
    @if( isset($linkutil->id) )
    <h3>Editar</h3>
      {!! Form::open(array('url' => "admin/linksuteis/editar/{$linkutil->id}", 'method'=>'POST', 'files'=>true)) !!}
    @else
    <h3>Cadastrar</h3>
      {!! Form::open(array('url'=>'admin/linksuteis/adicionar','method'=>'POST', 'files'=>true)) !!}
    @endif

    @if(count($errors) > 0)
    <div class="alert alert-danger">
      @foreach($errors->all() as $message)
        <p>{!! $message !!}</p>
      @endforeach
    </div>
    @endif
    <div class='form-group'>
      {!! Form::text('nome', isset($linkutil->nome) ? $linkutil->nome : '', array('placeholder' => 'Nome','class'=>'form-control') ) !!}
    </div>

    <div class='form-group'>
      {!! Form::text('link', isset($linkutil->link) ? $linkutil->link : '', array('placeholder' => 'Link','class'=>'form-control') ) !!}
    </div>

    <div class='form-group'>
      {!! Form::file('imagem') !!}
      <span class="text-danger">Resolução ideal para imagem: 262x157</span>
      @if(isset($linkutil->imagem))
        <img id="fotos" src="{{ url() }}/arquivos/linkutil/{{ $linkutil->imagem }}" >
        {!! Form::hidden('imagem',$linkutil->imagem) !!}
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