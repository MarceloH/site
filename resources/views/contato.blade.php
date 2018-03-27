@extends('templates.template')

@section('content')


        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Contato
                    <small></small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="{{url()}}">Home</a>
                    </li>
                    <li class="active">Contato</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">
            <div class="col-md-8">
                <h3> Mensagem</h3>
                {!! Form::open(array('url'=>'contato/','id'=>'form1','method'=>'POST', 'files'=>true)) !!}

                
                <div id="mensagem" class="">
                </div>
                
                <div class='form-group'>
                    {!! Form::text('nome', isset($contato->nome) ? $contato->nome : '', array('placeholder' => 'Nome','class'=>'form-control') ) !!}
                </div>

                <div class='form-group'>
                    {!! Form::text('telefone', isset($contato->telefone) ? $contato->telefone : '', array('placeholder' => 'Telefone','class'=>'form-control','id'=>'telefone') ) !!}
                </div>

                <div class='form-group'>
                    {!! Form::text('email', isset($contato->email) ? $contato->email : '', array('placeholder' => 'Email','class'=>'form-control') ) !!}
                </div>

                <div class='form-group'>
                    {!! Form::textarea('mensagem', isset($contato->mensagem) ? $contato->mensagem : '', array('placeholder' => 'Mensagem','class'=>'form-control') ) !!}
                </div>

                <div class='form-group'>
                  {!! Form::submit('Enviar Mensagem',array('class'=>'btn btn-primary')) !!}
              </div>
              {!! Form::close() !!}
          </div>

          <!-- Contato Details Column -->
            <div class="col-md-4">
                <h3>Endereço</h3>
                <p>
                    {{$endereco->endereco}}, {{$endereco->numero}} - {{$endereco->bairro}}. <br>{{$endereco->cidade}} - {{$endereco->estado}}.
                </p>
                <p><i class="fa fa-phone"></i> 
                    <abbr title="Phone">F</abbr>: {{$endereco->telefone}} - vivo-fixo / {{$endereco->celular}} - Tim</p>
                <p><i class="fa fa-envelope-o"></i> 
                    <abbr title="Email">E</abbr>: <a href="{{$endereco->email}}">{{$endereco->email}}</a>
                </p>
                <ul class="list-unstyled list-inline list-social-icons">
                    @forelse($redessociais as $redesocial)
                    <li>
                        <a href="{{$redesocial->link}}"><i class="fa fa-{{strtolower($redesocial->nome)}}-square fa-2x"></i></a>
                    </li>
                    @empty
                    @endforelse
                </ul>
            </div>

             <!-- Map Column -->
            <div class="col-md-4">
                <!-- Embedded Google Map -->
                <iframe width="100%" height="200px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="{{$endereco->linkmaps}}"></iframe>
            </div>

      </div>
      <!-- /.row -->

        <div class="row">
           
        </div>
        <!-- /.row -->

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
{!! HTML::script('assets/js/jquery.mask.min.js') !!}
<script type="text/javascript">
  jQuery(function($){
   $("#telefone").mask("(99) 99999-9999");
 });


  $('#form1').on('submit',function(e){
    $.ajaxSetup({
        header:$('meta[name="_token"]').attr('content')
    });
    e.preventDefault(e);

    $.ajax({

        type:"POST",
        url:'{{url()}}/contato',
        data:$(this).serialize(),
        dataType: 'json',
        success: function(data){
            if (data.error == 'true') {
                $('#mensagem').addClass("alert alert-danger");
                var msgErrors = '';
                $.each(data.errors, function(index, error) {console.log(error);
                    msgErrors += "<p>"+error+"</p>";
                });
                $('#mensagem').html(msgErrors);
            } else {
                $('#mensagem').addClass("alert alert-success");
                $('#mensagem').html("<p>Mensagem enviada com sucesso</p>");
            }
        },
        error: function(data){
            $('#mensagem').addClass("alert alert-danger");
            $('#mensagem').html("<p>Erro ao enviar mensagem</p>");
        }
    });
});
</script>

@stop