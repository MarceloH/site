<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Administração</title>

	<!-- <link href="../css/app.css" rel="stylesheet">
	<link href="../css/simple-sidebar.css" rel="stylesheet"> -->
	{!! HTML::style('css/app.css') !!}
    {!! HTML::style('css/simple-sidebar.css') !!}
    {!! HTML::style('assets/css/bootstrap.css') !!}
    {!! HTML::style('assets/datepicker/css/bootstrap-datepicker.min.css') !!}

    <!-- transformar textareas em editor de texto html -->
						

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
	<style type="text/css">
	#fotos{
	border: 4px solid #CCC;
	height: 138px;
	width: 188px;
	border-radius: 5px;
	margin-bottom: 3px;
}
	</style>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{{ url('/admin/') }}">Administração</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="{{ url('/') }}">Site</a></li>
				</ul>

				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<li><a href="{{ url('/auth/login') }}">Login</a></li>
						<!-- <li><a href="{{ url('/auth/register') }}">Register</a></li> -->
						<li><a href="#"></a></li>
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/auth/logout') }}">Logout</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>

@if (!Auth::guest())
    <div id="wrapper" >

        <!-- Sidebar -->
        <div id="sidebar-wrapper" class="panel panel-default">
            <ul class="sidebar-nav" style="margin-bottom: 20px;">
                <li class="sidebar-brand">
                    <a href="{{ url('/admin/') }}">
                        Home
                    </a>
                </li>
                <li>
                    <a href="{{ url('admin/banners/') }}">Banners</a>
                </li>
                <li>
                    <a href="{{  url('admin/versiculos/') }}">Versículo</a>
                </li>
                <li>
                    <a href="{{ url('admin/albuns/') }}">Albuns</a>
                </li>
                <li>
                    <a href="{{ url('admin/fotos/') }}">Fotos</a>
                </li>
                <li>
                    <a href="{{ url('admin/enderecos/') }}">Endereço</a>
                </li>
                <li>
                    <a href="{{ url('admin/redessociais/') }}">Redes Sociais</a>
                </li>
                <li>
                    <a href="{{ url('admin/ativsemanais/') }}">Atividades Semanais</a>
                </li>
                <li>
                    <a href="{{ url('admin/avisos/') }}">Avisos</a>
                </li>
                <li>
                    <a href="{{ url('admin/contatos/') }}">Contato</a>
                </li>
                <li>
                    <a href="{{ url('admin/igrejas/') }}">Igreja</a>
                </li>
                <li>
                    <a href="{{ url('admin/mensagens/') }}">Mensagens</a>
                </li>
                <li>
                    <a href="{{ url('admin/ministerios/') }}">Ministerios</a>
                </li>
                <li>
                    <a href="{{ url('admin/pastorais/') }}">Pastorais</a>
                </li>
                <li>
                    <a href="{{ url('admin/oracoes/') }}">Motivos de Oração</a>
                </li>
                <li>
                    <a href="{{  url('admin/linksuteis/') }}">Links Úteis</a>
                </li>
                <li>
                    <a href="{{ url('admin/pastores/') }}">Pastores</a>
                </li>
                <li>
                    <a href="{{ url('admin/users/') }}">Usuários</a>
                </li>

                <li class="sidebar-brand">
                    <a href="{{ url('/admin/') }}">
                        Home
                    </a>
                </li>

            </ul>
        </div>
        <!-- /#sidebar-wrapper -->
@endif
        
	@yield('content')

	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
	{!! HTML::script('assets/datepicker/js/bootstrap-datepicker.min.js') !!}

	<script type="text/javascript">
 $(document).ready(function () {
        $('.input-group.date').datepicker({
            format: "dd/mm/yyyy",
            language: "pt-BR"
        });
      });

    </script>

</body>
</html>
