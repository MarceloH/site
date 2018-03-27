@extends('templates.template')

@section('content')

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Galeria
                    <small></small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="{{url()}}">Home</a>
                    </li>
                    <li class="active">Galeria</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
    @if ($voltar == true) 
          <a href='javascript:history.back(1)'>
          <input type="button" value="Voltar" class="btn btn-primary" style="margin-left: 20px;">
          </a>
    @endif

    @if ($id == 0)

        <!-- Intro Content -->
      <div class="container">
      @forelse($fotos as $foto)
        <div class="well">
                <div class="row">
                    <div class="col-md-12 text-justify">
                    <a href='{{url("galeria/{$foto->id}")}}'><h4>{{$foto->titulo}}</h4></a>
                    <h5>{{date("d/m/Y",strtotime($foto->data))}}</h5>
                    </div>
                </div>
            </div>
      @empty
        <div align="justify">Sem Album</div>
      @endforelse
      {!! str_replace('/?page','?page', $fotos->render()) !!} 
      </div>
    @else

        <!-- Portfolio Item Row -->
        <div class="row">

            <div class="col-md-12">
                <h2>{{$fotos[0]->album}}</h2>
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                    @forelse($fotos as $key => $foto)
                        @if($key == 0)
                        <div class="item active" data-slide-number="{{$key}}">
                        @else
                        <div class="item" data-slide-number="{{$key}}">
                        @endif
                            <img class="img-responsive" src="{{url()}}/arquivos/foto/{{$foto->foto}}" alt="">
                        </div>
                    @empty
                    @endforelse
                    </div>

                    <!-- Controls -->
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
            </div>

        </div>
         <!-- /.row -->
        <hr>
        <!-- Related Projects Row -->
        <div class="row">
            
            <div class="carousel slide media-carousel" id="media">
                <div class="carousel-inner">
                @forelse($aFotosGeral as $pos => $aFotos)
                  @if($pos == 0)
                  <div class="item  active">
                  @else
                  <div class="item">
                  @endif
                      <div class="row">
                      @forelse($aFotos as $key => $foto)
                        <div class="col-sm-3 col-xs-6">
                            <a id="carousel-selector-{{$key}}">
                                <img class="img-foto img-responsive img-hover img-related" src="{{url()}}/arquivos/foto/mini_{{$foto->foto}}" alt="{{$foto->titulo}}">
                            </a>
                        </div>
                      @empty
                      @endforelse
                    </div>
                </div>
                @empty
                @endforelse

            </div>
            <a data-slide="prev" href="#media" class="left carousel-control barra-galeria">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a data-slide="next" href="#media" class="right carousel-control barra-galeria">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
        </div>

    </div>
        <!-- /.row --> 
	  @endif

<!-- jQuery -->
<script src="{{url()}}/js/jquery.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="{{url()}}/js/bootstrap.min.js"></script>
<script type="text/javascript">
      jQuery(document).ready(function($) {
 
        $('#myCarousel').carousel({
                interval: 50000
        });
 
        //Handles the carousel thumbnails
        $('[id^=carousel-selector-]').click(function () {
        var id_selector = $(this).attr("id");
        try {
            var id = /-(\d+)$/.exec(id_selector)[1];
            jQuery('#myCarousel').carousel(parseInt(id));
        } catch (e) {
            console.log('Regex failed!', e);
        }
    });
        // When the carousel slides, auto update the text
        $('#myCarousel').on('slid.bs.carousel', function (e) {
                 var id = $('.item.active').data('slide-number');
                $('#carousel-text').html($('#slide-content-'+id).html());
        });
});
</script>

@stop