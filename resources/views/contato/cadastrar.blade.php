@extends('app')

@section('content')


<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">Contato</div>

        <div class="panel-body">


          <a href="{!!url('admin/contatos/')!!}" title="Voltar">
            <input type="button" value="Voltar" class="btn btn-primary">
          </a>
          @if( isset($contato->id) )
          <h3>Editar</h3>
          {!! Form::open(array('url' => "admin/contatos/editar/{$contato->id}", 'method'=>'POST', 'files'=>true)) !!}
          @else
          <h3>Cadastrar</h3>
          {!! Form::open(array('url'=>'admin/contatos/adicionar','method'=>'POST', 'files'=>true)) !!}
          @endif

          @if(count($errors) > 0)
          <div class="alert alert-danger">
            @foreach($errors->all() as $message)
            <p>{!! $message !!}</p>
            @endforeach
          </div>
          @endif
          <div class='form-group'>
            {!! Form::text('nome', isset($contato->nome) ? $contato->nome : '', array('placeholder' => 'Nome','class'=>'form-control','readonly'=>'readonly') ) !!}
          </div>

          <div class='form-group'>
            {!! Form::text('telefone', isset($contato->telefone) ? $contato->telefone : '', array('placeholder' => 'Telefone','class'=>'form-control','id'=>'telefone','readonly'=>'readonly') ) !!}
          </div>
          <div class='form-group'>
            {!! Form::text('email', isset($contato->email) ? $contato->email : '', array('placeholder' => 'Email','class'=>'form-control','readonly'=>'readonly') ) !!}
          </div>
          <div class='form-group'>
            {!! Form::textarea('mensagem', isset($contato->mensagem) ? $contato->mensagem : '', array('placeholder' => 'Mensagem','class'=>'form-control','readonly'=>'readonly') ) !!}
          </div>
          <div class='form-group'>
            {!! Form::submit('Salvar',array('class'=>'btn btn-success','disabled'=>'disabled')) !!}
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
   $("#telefone").mask("(99) 99999-9999");
 });

</script>

@endsection