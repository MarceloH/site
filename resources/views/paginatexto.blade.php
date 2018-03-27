@extends('templates.template')

@section('content')

<div class="fundo-interna">
	<div class="container" id="conteudo-interna">


		<div class="titulo-interna">::.{{ $pagina}}</div>
    <div class="titulo-interna" style="margin-top: 10px; font-size: 18px;"> {{ $objeto->titulo}} </div>
    

    <div align="justify">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      {!! $objeto->descricao !!}

    </div>
      


    	

	</div>
</div>

@stop