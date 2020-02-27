@extends('layouts.app')



@section('content')
<div class="container">
    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="text-center">

                <h2>Create New Role</h2>

            </div>

            <div class="text-right">

                <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>

            </div>

        </div>

    </div>



    @if (count($errors) > 0)

        <div class="alert alert-danger">

            <strong>Whoops!</strong> There were some problems with your input.<br><br>

            <ul>

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif



    {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}

    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">

                <strong>Name:</strong>

                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}

            </div>
            @if($errors->has('name'))
                <p class="help-block">
                    {{ $errors->first('name') }}
                </p>
            @endif
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group   {{ $errors->has('name') ? 'has-error' : '' }}">

                <strong>Permission:</strong>

                <br/>

                @foreach($permission as $value)

                    <label>{{ Form::checkbox('permissions[]', $value->id, false, array('class' => 'name')) }}

                        {{ $value->name }}</label>

                    <br/>

                @endforeach

            </div>

            @if($errors->has('name'))
                <p class="help-block">
                    {{ $errors->first('name') }}
                </p>
            @endif

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">

            <button type="submit" class="btn btn-primary">Submit</button>

        </div>

    </div>

    {!! Form::close() !!}


</div>

@endsection
