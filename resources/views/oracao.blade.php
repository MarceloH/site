@extends('templates.template')

@section('content')

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Motivos de Oração
                    <small></small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="{{url()}}">Home</a>
                    </li>
                    <li class="active">Motivos de Oração</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

            <!-- Intro Content -->
        <div class="container">
            
            @forelse($oracoes as $oracao)
            <div class="well">
                <div class="row">
                    <div class="col-md-12 text-justify">
                    <li><h4>{{$oracao->motivo}}</h4></li>
                    </div>
                </div>
            </div>
            @empty
            @endforelse
            {!! str_replace('/?page','?page', $oracoes->render()) !!} 
        </div>

@stop