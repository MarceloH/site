@extends('templates.template')

@section('content')


        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Calendário
                    <small></small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="{{url()}}">Home</a>
                    </li>
                    <li class="active">Calendário</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

         <!-- Intro Content -->
        <div class="embed-responsive embed-responsive-16by9">
                    <iframe src="https://calendar.google.com/calendar/embed?src=ibressurreicao%40gmail.com&ctz=America/Sao_Paulo"  class="embed-responsive-item" ></iframe>
            
        </div>

@stop