@extends('templates.template')

@section('content')

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Aviso
                    <small></small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="{{url()}}">Home</a>
                    </li>
                    <li class="active">Aviso</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

            <!-- Intro Content -->
        <div class="container">
            
            @forelse($avisos as $aviso)
            <div class="well">
                <div class="row">
                    <div class="col-md-12 text-justify">
                    <h4>{{$aviso->titulo}}</h4>
                        <p>{{ $aviso->descricao }}</p>
                    </div>
                </div>
            </div>
            @empty
            @endforelse
            {!! str_replace('/?page','?page', $avisos->render()) !!} 
        </div>

@stop