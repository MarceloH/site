@extends('app')

@section('content')


<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">Versículo</div>

        <div class="panel-body">
          

          <a href="{!!url('admin/versiculos/')!!}" title="Voltar">
            <input type="button" value="Voltar" class="btn btn-primary">
          </a>
          @if( isset($versiculo->id) )
          <h3>Editar</h3>
          {!! Form::open(array('url' => "admin/versiculos/editar/{$versiculo->id}", 'method'=>'POST', 'files'=>true)) !!}
          @else
          <h3>Cadastrar</h3>
          {!! Form::open(array('url'=>'admin/versiculos/adicionar','method'=>'POST', 'files'=>true)) !!}
          @endif

          @if(count($errors) > 0)
          <div class="alert alert-danger">
            @foreach($errors->all() as $message)
            <p>{!! $message !!}</p>
            @endforeach
          </div>
          @endif
          <div class='form-group'>
            {!! Form::text('versiculo', isset($versiculo->versiculo) ? $versiculo->versiculo : '', array('placeholder' => 'Versículo','class'=>'form-control') ) !!}
          </div>
        <div class='form-group'>
          {!! Form::submit('Salvar',array('class'=>'btn btn-success')) !!}
        </div>
        {!! Form::close() !!}


      </div>
    </div>
  </div>
</div>
</div>



<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
{!! HTML::script('assets/js/jquery.mask.min.js') !!}
<script type="text/javascript">
  jQuery(function($){
   $("#telefone").mask("(99) 9999-9999");
   $("#celular").mask("(99) 99999-9999");
   $("#cep").mask("99999-999");
 });

</script>

@endsection