@extends('templates.template')

@section('content')


        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">A igreja
                    <small></small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="{{url()}}">Home</a>
                    </li>
                    <li class="active">A Igreja</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Intro Content -->
        <div class="container">
            
            <div class="col-md-12">
                <img class="img-responsive" src="http://placehold.it/1900x450" alt="">
            </div>
            @forelse($igrejas as $igreja)
            <div class="row">
            <div class="col-lg-12 text-justify">
                <h2>{{$igreja->titulo}}</h2>
                <p>{!!$igreja->texto!!}</p>
            </div>
            </div>
            @empty
            @endforelse
            
        </div>
        <!-- /.row -->

        <!-- Team Members -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Nosos Pastores</h2>
            </div>
            @forelse($pastores as $pastor)
            <div class="col-md-4 text-center">
                <div class="thumbnail">
                    <img class="img-responsive" src="{{url()}}/arquivos/pastor/{{$pastor->foto}}" alt="">
                    <div class="caption">
                        <h3>Pr. {{$pastor->nome}}<br>
                            <small>{{$pastor->categoria}}</small>
                        </h3>
                        <p>{!! $pastor->observacao !!}</p>
                        
                    </div>
                </div>
            </div>
            @empty
            @endforelse
            
        </div>
        <!-- /.row -->

@stop