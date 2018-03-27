@extends('templates.template')

@section('content')


        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Links Úteis
                    <small></small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="{{url()}}">Home</a>
                    </li>
                    <li class="active">Links Úteis</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->


        <!-- Projects Row -->
        @forelse($aLinksGeral as $aLinks)
        <div class="row">
            @forelse($aLinks as $linkutil)
            <div class="col-md-3 img-portfolio">
                <a href="{{$linkutil->link}}" target="_blank">
                    <img title="{{$linkutil->nome}}" class="img-responsive img-hover" src="{{url()}}/arquivos/linkutil/{{$linkutil->imagem}}" alt="{{$linkutil->nome}}">
                </a>
            </div>
            @empty
            @endforelse
        </div>
        @empty
        <div class="row">
            <div class="col-md-3 img-portfolio">
                <a href="portfolio-item.html">
                    <img class="img-responsive img-hover" src="http://placehold.it/750x450" alt="">
                </a>
            </div>
        </div>
        @endforelse
        <!-- /.row -->
        {!! str_replace('/?page','?page', $linksuteis->render()) !!}

@stop