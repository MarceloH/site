@extends('templates.template')

@section('content')

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Mensagem
                    <small></small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="{{url()}}">Home</a>
                    </li>
                    <li class="active">Mensagem</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        @forelse($aMensagensGeral as $aMensagens)
        <div class="row">
            @forelse($aMensagens as $mensagem)
            <div class="col-md-6 img-portfolio">
                <h3>
                    {{$mensagem->titulo}}
                </h3>
                <small>{{date("d/m/Y",strtotime($mensagem->data))}}</small>
                <p>{{$mensagem->descricao}}</p>
                <audio controls>
                    <source src="arquivos/mensagem/{{$mensagem->audio}}" type="audio/mpeg" />
                </audio>
            </div>
            @empty
            @endforelse
        </div>
        @empty
        @endforelse
        {!! str_replace('/?page','?page', $mensagens->render()) !!}

@stop