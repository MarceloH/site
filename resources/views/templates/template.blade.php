<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Igreja Batista da Ressureição</title>

    {!! HTML::style(url('').'/css/bootstrap.min.css') !!}
    {!! HTML::style(url('').'/css/modern-business.css') !!}
    {!! HTML::style(url('').'/css/font-awesome/css/font-awesome.min.css') !!}
    {!! HTML::style(url('').'/css/default.css') !!}

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="{{url()}}"><img class="img-top" src="{{url()}}/imagens/LogoIBR-head.png"></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="{{url('igreja/')}}">A Igreja</a>
                    </li>
                    <li>
                        <a href="{{url('pastoral/')}}">Pastoral</a>
                    </li>
                    <li>
                        <a href="{{url('mensagem/')}}">Mensagens</a>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Ministérios <b class="caret"></b></a>
                        <ul id="ministerio-menu" class="dropdown-menu">
                        </ul>
                    </li>

                    <li>
                        <a href="{{url('calendario/')}}">Calendário</a>
                    </li>
                    <li>
                        <a href="{{url('contato/')}}">Contato</a>
                    </li>
                    <li>
                        <a href="{{url('linkutil/')}}">Links Úties</a>
                    </li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
<!-- Page Content -->
    <div class="container">

    @yield('content')

    <hr>
    <footer>
        <div class="row">
            <div id="info-footer" class="col-lg-12">
                <p>&copy; <span id="endereco-footer"></span></p>
            </div>
        </div>
    </footer>
    <hr>
</div>
<!-- /.container -->

<!-- jQuery -->
<script src="{{url()}}/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{url()}}/js/bootstrap.min.js"></script>

<!-- Script to Activate the Carousel -->
<script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    });
    /**
     * Buscar menus de ministerios
     */
    $.get("{{url()}}/ministerio", function(data) {
        $("#ministerio-menu").html(data.ministerios);
    });
    /**
     * Buscar o endereco para rodape
     */
    $.get("{{url()}}/endereco", function(data) {
        $("#endereco-footer").text(data.endereco);
    });
</script>

</body>

</html>
