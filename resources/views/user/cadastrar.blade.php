@extends('app')

@section('content')


<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">Usuários</div>

        <div class="panel-body">
          

          <a href="{!!url('admin/users/')!!}" title="Voltar">
            <input type="button" value="Voltar" class="btn btn-primary">
          </a>
          @if( isset($user->id) )
          <h3>Editar</h3>
          {!! Form::open(array('url' => "admin/users/editar/{$user->id}", 'method'=>'POST', 'files'=>true)) !!}
          @else
          <h3>Cadastrar</h3>
          {!! Form::open(array('url'=>'admin/users/adicionar','method'=>'POST', 'files'=>true)) !!}
          @endif

          @if(count($errors) > 0)
          <div class="alert alert-danger">
            @foreach($errors->all() as $message)
            <p>{!! $message !!}</p>
            @endforeach
          </div>
          @endif
          <div class='form-group'>
            {!! Form::text('name', isset($user->name) ? $user->name : '', array('placeholder' => 'Nome','class'=>'form-control') ) !!}
          </div>
          <div class='form-group'>
            {!! Form::text('email', isset($user->email) ? $user->email : '', array('placeholder' => 'Email','class'=>'form-control') ) !!}
          </div>
          <div class='form-group'>
            {!! Form::password('password', array('placeholder' => 'Senha','class'=>'form-control') ) !!}
          </div>
          <div class='form-group'>
            {!! Form::password('password2', array('placeholder' => 'Confirma Senha','class'=>'form-control') ) !!}
          </div>

          {!! Form::submit('Salvar',array('class'=>'btn btn-success')) !!}
          {!! Form::close() !!}


        </div>
      </div>
    </div>
  </div>
</div>


<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>


@endsection