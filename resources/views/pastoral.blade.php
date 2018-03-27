@extends('templates.template')

@section('content')

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Pastoral
                    <small></small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="{{url()}}">Home</a>
                    </li>
                    <li class="active">Pastoral</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
    @if ($voltar == true) 
          <a href='javascript:history.back(1)'>
          <input type="button" value="Voltar" class="btn btn-primary" style="margin-left: 20px;">
          </a>
          <hr>
    @endif

    @if ($id == 0)
            <!-- Intro Content -->
        <div class="container">
            
            @forelse($pastorais as $pastoral)
            <div class="well">
                <div class="row">
                    <div class="col-md-12 text-justify">
                    <h4>{{$pastoral->titulo}}</h4>
                        <p>{{ str_limit(strip_tags($pastoral->texto), 490, "...") }}</p>
                    </div>
                    <div class="col-md-2">
                        <a href='{{url("pastoral/{$pastoral->id}")}}' class="btn btn-default">Mais</a>
                    </div>
                </div>
            </div>
            @empty
            @endforelse
            {!! str_replace('/?page','?page', $pastorais->render()) !!} 
        </div>
    @else
        <!-- Intro Content -->
        <div class="container">
            
            <div class="col-md-12">
                <img class="img-responsive" src="http://placehold.it/1900x450" alt="">
            </div>
            <div class="row">
            <div class="col-lg-12 text-justify">
                <h2>{{$pastoral->titulo}}</h2>
                <p>{!! $pastoral->texto !!}</p>
            </div>
            </div>
            
        </div>
    @endif

@stop