@extends('templates.template')

<div class="container">
<div id="myCarousel" class="carousel slide">
    <!-- Indicators -->
    <ol class="carousel-indicators">
    @forelse($home['banners'] as $key => $banner)
        @if(isset($banner->first))
        <li data-target="#myCarousel" data-slide-to="{{$key}}" class="active"></li>
        @else
        <li data-target="#myCarousel" data-slide-to="{{$key}}" ></li>
        @endif
    @empty
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    @endforelse
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
    
    @forelse($home['banners'] as $banner)
        @if(isset($banner->first))
        <div class="item active">
        @else
        <div class="item">
        @endif
            <a href="{{url($banner->link)}}">
            <img class="fill" src="{{url()}}/arquivos/banner/{{$banner->foto}}">
            <div class="carousel-caption">
                <h2>{{$banner->titulo}}</h2>
            </div>
            </a>
        </div>
    @empty
        <div class="item active">
            <div class="fill" style="background-image:url('http://placehold.it/1900x1080&text=Jesus é o Senhor');"></div>
            <div class="carousel-caption">
                <h2>Igreja Batista da Ressureição</h2>
            </div>
        </div>
    @endforelse
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="icon-prev"></span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="icon-next"></span>
    </a>
</div>
</div>

@section('content')

    <!-- Marketing Icons Section -->
    <div class="row">
        <div class="col-lg-12" style="margin-top: 10px;">
            <!-- Call to Action Section -->
            <div class="well">
                <div class="row">
                    <div class="col-md-10">
                        <p>{{$home['versiculo']->versiculo}}</p>
                    </div>
                    <div class="col-md-2">
                       <a class="btn btn-lg btn-default btn-block" href="https://www.bible.com/pt/" target="_blank">Bíblia Online</a>
                   </div>
               </div>
           </div>
       </div>
       <div class="col-md-4">
        <div class="panel panel-default">
        
            <div class="panel-heading">
                <h4><i class="fa fa-fw fa-check"></i>{{$home['pastorais']->titulo}}</h4>
            </div>
            <div class="panel-body panel-home text-justify">
                <p>{{str_limit(strip_tags($home['pastorais']->texto), 250, "...")}}</p>
                <a href="{{url('pastoral/'.$home['pastorais']->id)}}" class="btn btn-default">Leia Mais</a>
            </div>
        
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4><i class="fa fa-fw fa-check"></i> Motivos de Oração</h4>
            </div>
            <div class="panel-body panel-home">
                <a href="{{url('oracao/')}}" ><img class="img-responsive img-portfolio img-hover" src="{{url()}}/css/imagem/oracao.jpg" alt=""></a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4><i class="fa fa-fw fa-check"></i>Avisos</h4>
            </div>
            <div class="text-justify panel-body panel-home">
                <p><b>{{$home['avisos']->titulo}} </b>- {{substr($home['avisos']->descricao,0,220)}}</p>
                <a href="{{url('aviso/')}}" class="btn btn-default">Leia Mais</a>
            </div>
        </div>
    </div>
</div>
<!-- /.row -->

<!-- Portfolio Section -->
<div class="row">
    <div class="col-lg-12">
        <a href="{{url('galeria/')}}"><h2 class="page-header">Galeria</h2></a>
    </div>
                
            @forelse($home['fotos'] as $foto)
                <div class="col-md-4 col-sm-6">
                    <a href="foto.html">
                        <img class="img-responsive img-portfolio img-hover img-home" src="{{url()}}/arquivos/foto/{{$foto->foto}}" alt="{{$foto->titulo}}">
                    </a>
                </div>
            @empty
                <div class="col-md-4 col-sm-6">
                    <a href="portfolio-item.html">
                        <img class="img-responsive img-portfolio img-hover" src="http://placehold.it/700x450" alt="">
                    </a>
                </div>
            @endforelse

            </div>
            <!-- /.row -->

            <!-- Features Section -->
            <div class="row">

                <div class="col-md-6">
                    <div class="col-lg-12">
                        <h2 class="page-header">Atividades Semanais</h2>
                    </div>
                    @forelse($home['ativsemanais'] as $dia => $aAtivsemanal)
                      <p><strong>{{$dia}}:</strong></p>
                      <ul>
                        @forelse($aAtivsemanal as $oAtividade)
                          <li>{{$oAtividade->hora}} - {{$oAtividade->atividade}}</li>
                        @empty
                        @endforelse
                      </ul>
                    @empty
                    @endforelse
                    <br>
                    <p>É um prazer ter você conosco. Queremos te dizer que és muito especial para Deus e para nós. Ficamos muito alegres em tê-lo em nossa igreja ouvindo a Palavra de Deus que é luz para o nosso caminho, fonte de paz e alegria.</p>
                </div>

                <div class="col-md-6">

                    <h2 class="page-header">Vídeos</h2>
                    
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item"  src="https://www.youtube.com/embed/k67qejJWQt4" ></iframe>
                    </div>
                </div>
                
            </div>

@stop