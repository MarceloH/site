@extends('app')

@section('content')


<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">Endereço</div>

        <div class="panel-body">
          

          <a href="{!!url('admin/enderecos/')!!}" title="Voltar">
            <input type="button" value="Voltar" class="btn btn-primary">
          </a>
          @if( isset($endereco->id) )
          <h3>Editar</h3>
          {!! Form::open(array('url' => "admin/enderecos/editar/{$endereco->id}", 'method'=>'POST', 'files'=>true)) !!}
          @else
          <h3>Cadastrar</h3>
          {!! Form::open(array('url'=>'admin/enderecos/adicionar','method'=>'POST', 'files'=>true)) !!}
          @endif

          @if(count($errors) > 0)
          <div class="alert alert-danger">
            @foreach($errors->all() as $message)
            <p>{!! $message !!}</p>
            @endforeach
          </div>
          @endif
          <div class='form-group'>
            {!! Form::text('endereco', isset($endereco->endereco) ? $endereco->endereco : '', array('placeholder' => 'Endereco','class'=>'form-control') ) !!}
          </div>

          <div class='form-group'>
            {!! Form::text('numero', isset($endereco->numero) ? $endereco->numero : '', array('placeholder' => 'Número/Complemento','class'=>'form-control') ) !!}
          </div>

          <div class='form-group'>
            {!! Form::text('bairro', isset($endereco->bairro) ? $endereco->bairro : '', array('placeholder' => 'Bairro','class'=>'form-control') ) !!}
          </div>

          <div class='form-group'>
            {!! Form::text('cidade', isset($endereco->cidade) ? $endereco->cidade : '', array('placeholder' => 'Cidade','class'=>'form-control') ) !!}
          </div>

          <div class='form-group'>
           {!! Form::select('estado',
           [null => 'Estado' 
           ,'AC' => 'Acre'
           ,'AL' => 'Alagoas'
           ,'AP' => 'Amapá'
           ,'AM' => 'Amazonas'
           ,'BA' => 'Bahia'
           ,'CE' => 'Ceará'
           ,'DF' => 'Distrito Federal'
           ,'ES' => 'Espírito Santo'
           ,'GO' => 'Goiás'
           ,'MA' => 'Maranhão'
           ,'MT' => 'Mato Grosso'
           ,'MS' => 'Mato Grosso do Sul'
           ,'MG' => 'Minas Gerais'
           ,'PA' => 'Pará'
           ,'PB' => 'Paraíba'
           ,'PR' => 'Paraná'
           ,'PE' => 'Pernambuco'
           ,'PI' => 'Piauí'
           ,'RJ' => 'Rio de Janeiro'
           ,'RN' => 'Rio Grande do Norte'
           ,'RS' => 'Rio Grande do Sul'
           ,'RO' => 'Rondônia'
           ,'RR' => 'Roraima'
           ,'SC' => 'Santa Catarina'
           ,'SP' => 'São Paulo'
           ,'SE' => 'Sergipe'
           ,'TO' => 'Tocantins'], 
           isset($endereco->estado) ? $endereco->estado : '', array('class'=>'form-control') ) !!}
         </div>
         <div class='form-group'>
          <div class='form-inline'>
            {!! Form::text('cep', isset($endereco->cep) ? $endereco->cep : '', array('placeholder' => 'CEP','class'=>'form-control','id'=>'cep') ) !!}

            {!! Form::text('telefone', isset($endereco->telefone) ? $endereco->telefone : '', array('placeholder' => 'Telefone','class'=>'form-control','id'=>'telefone') ) !!}

            {!! Form::text('celular', isset($endereco->celular) ? $endereco->celular : '', array('placeholder' => 'Celular','class'=>'form-control','id'=>'celular') ) !!}
          </div>
        </div>
        <div class='form-group'>
          {!! Form::text('email', isset($endereco->email) ? $endereco->email : '', array('placeholder' => 'Email','class'=>'form-control') ) !!}
        </div>
        <div class='form-group'>
          {!! Form::text('linkmaps', isset($endereco->linkmaps) ? $endereco->linkmaps : '', array('placeholder' => 'Link Maps','class'=>'form-control') ) !!}
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