@extends('app')

@section('content')


<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
      <div class="panel-heading">Atividades Semanais</div>

        <div class="panel-body">


          <a href="{!!url('admin/ativsemanais/')!!}" title="Voltar">
            <input type="button" value="Voltar" class="btn btn-primary">
          </a>
          @if( isset($ativsemanal->id) )
          <h3>Editar</h3>
          {!! Form::open(array('url' => "admin/ativsemanais/editar/{$ativsemanal->id}", 'method'=>'POST', 'files'=>true)) !!}
          @else
          <h3>Cadastrar</h3>
          {!! Form::open(array('url'=>'admin/ativsemanais/adicionar','method'=>'POST', 'files'=>true)) !!}
          @endif

          @if(count($errors) > 0)
          <div class="alert alert-danger">
            @foreach($errors->all() as $message)
            <p>{!! $message !!}</p>
            @endforeach
          </div>
          @endif
          <div class='form-group'>
            {!! Form::select('dia',[null => 'Dia', '1' => 'Domingo', 
            '2' => 'Segunda-Feira','3' => 'Terça-Feira','4' => 'Quarta-Feira','5' => 'Quinta-Feira','6' => 'Sexta-Feira','7' => 'Sábado'], 
            isset($ativsemanal->dia) ? $ativsemanal->dia : '', array('class'=>'form-control') ) !!}
          </div>

          <div class='form-group'>
            <div class="form-inline">
              {!! Form::text('hora', isset($ativsemanal->hora) ? $ativsemanal->hora : '', 
              array('placeholder' => 'Horário','class'=>'form-control','id'=>'hora') ) !!}
            </div>
          </div>

          <div class='form-group'>
            {!! Form::text('atividade', isset($ativsemanal->atividade) ? $ativsemanal->atividade : '', array('placeholder' => 'Atividade','class'=>'form-control') ) !!}
          </div>


          {!! Form::submit('Salvar',array('class'=>'btn btn-success')) !!}
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
   $("#hora").mask("99:99");
 });

</script>

@endsection