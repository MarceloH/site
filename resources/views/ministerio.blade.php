@extends('templates.template')

@section('content')

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Ministério
                    <small></small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="{{url()}}">Home</a>
                    </li>
                    <li class="active">Ministério</li>
                </ol>
            </div>
        </div>

                <!-- Intro Content -->
        <div class="container">
            
            <div class="row">
                <div class="col-lg-12 text-justify">
                    <h2>{{$ministerio->nome}}</h2>
                    <p>{!!$ministerio->descricao!!}</p>
                </div>
                @if(!empty($ministerio->escala))
                <h3>
                    Escala semanal
                </h3>
                <small>{{date("d/m/Y",strtotime($ministerio->dataescala))}}</small>
                <p>{{$ministerio->escala}}</p>
                @endif
            </div>
            
        </div>


@stop