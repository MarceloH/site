@extends('app')

@section('content')


<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">Ministério</div>

        <div class="panel-body">
          

          <a href="{!!url('admin/ministerios/')!!}" title="Voltar">
            <input type="button" value="Voltar" class="btn btn-primary">
          </a>
          @if( isset($ministerio->id) )
          <h3>Editar</h3>
          {!! Form::open(array('url' => "admin/ministerios/editar/{$ministerio->id}", 'method'=>'POST', 'files'=>true)) !!}
          @else
          <h3>Cadastrar</h3>
          {!! Form::open(array('url'=>'admin/ministerios/adicionar','method'=>'POST', 'files'=>true)) !!}
          @endif

          @if(count($errors) > 0)
          <div class="alert alert-danger">
            @foreach($errors->all() as $message)
            <p>{!! $message !!}</p>
            @endforeach
          </div>
          @endif
          <div class='form-group'>
            {!! Form::text('nome', isset($ministerio->nome) ? $ministerio->nome : '', array('placeholder' => 'Nome','class'=>'form-control') ) !!}
          </div>
          <div class='form-group'>
            {!! Form::textarea('descricao', isset($ministerio->descricao) ? $ministerio->descricao : '', array('placeholder' => 'Descrição','class'=>'form-control') ) !!}
          </div>
          <div class='form-group'>
            {!! Form::text('escala', isset($ministerio->escala) ? $ministerio->escala : '', array('placeholder' => 'Escala','class'=>'form-control') ) !!}
          </div>

          <div class='form-group'>
            <div class="input-group date">
              {!! Form::text('dataescala', isset($ministerio->dataescala) ? date('d/m/Y',strtotime($ministerio->dataescala)) : '', 
              array('placeholder' => 'Data Escala','class'=>'form-control') ) !!}
              <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
            </div>
          </div>


          {!! Form::submit('Salvar',array('class'=>'btn btn-success')) !!}
          {!! Form::close() !!}


        </div>
      </div>
    </div>
  </div>
</div>

<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>

@endsection