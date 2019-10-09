<!DOCTYPE html>
<html>
    <head>
        <title>Contact US</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>
<body>

    <div class="container">
        <h1>Contactez nous</h1>

        @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
        @endif
        
        @if(Session::has('faild'))
        <div class="alert alert-danger">
            {{ $errors->first('message') }}
        </div>
        @endif

        {!! Form::open(['route'=>'Emailcontroller.store']) !!}

        <div class="form-group">
            {!! Form::label('Sujet:') !!}
            {!! Form::text('sujet', old('sujet'), ['class'=>'form-control','required', 'placeholder'=>'Concernant quoi!!']) !!}
            <span class="text-danger">{{ $errors->first('sujet') }}</span>
        </div>

        <div class="form-group">
            {!! Form::label('Email:') !!}
            {!! Form::text('e-mail', old('e-mail'), ['class'=>'form-control','required', 'placeholder'=>'Enter Email']) !!}
            <span class="text-danger">{{ $errors->first('email') }}</span>
        </div>

        <div class="form-group">
            {!! Form::label('Description:') !!}
            {!! Form::textarea('description', old('description'), ['class'=>'form-control','required', 'placeholder'=>'. . . ']) !!}
            <span class="text-danger">{{ $errors->first('description') }}</span>
        </div>

        <div class="form-group">
            <button class="btn btn-success">Envoyer</button>
        </div>

        {!! Form::close() !!}

    </div>

</body>
</html>