@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Edit Product</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>

            </div>

        </div>

    </div>



    @if ($errors->any())

        <div class="alert alert-danger">

            <strong>Whoops!</strong> There were some problems with your input.<br><br>

            <ul>

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif



    <form action="{{ route('products.update',$product->id) }}" method="POST">

        @csrf

        @method('PUT')

        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group  {{ $errors->has('name') ? 'has-error' : '' }}">

                    <strong>Name:</strong>

                    <input type="text" name="name" value="{{ $product->name }}" class="form-control" placeholder="Name">

                </div>

                @if($errors->has('name'))
                    <p class="help-block">
                        {{ $errors->first('name') }}
                    </p>
                @endif
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group  {{ $errors->has('details') ? 'has-error' : '' }}">

                    <strong>Detail:</strong>

                    <textarea class="form-control" style="height:150px" name="details" placeholder="Detail">{{ $product->details }}</textarea>

                </div>
                @if($errors->has('details'))
                    <p class="help-block">
                        {{ $errors->first('details') }}
                    </p>
                @endif
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                <button type="submit" class="btn btn-primary">Submit</button>

            </div>

        </div>

    </form>
</div>

@endsection

