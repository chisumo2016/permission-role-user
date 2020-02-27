@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="rightside bg-grey-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="card-body">
                            <div class="card-text">
                                <div class="card-head">Enter Details of the permission</div>
                            </div>

                            {!! Form::open(array('route' => 'permissions.store','method'=>'POST')) !!}

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            {!! Form::label('name','Name') !!}
                                            {!! Form::text('name',null,['class'=>'form-control', 'id' => 'name']) !!}
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            {!! Form::label('guard_name','Guard Name') !!}
                                            {!! Form::text('guard_name',null,['class'=>'form-control', 'id' => 'guard_name']) !!}
                                        </div>
                                    </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-2 pull-right">
                                <div class="form-group">
                                    {!! Form::submit('Create', ['class' => 'btn btn-primary pull-right']) !!}
                                </div>
                            </div>
                        </div>

                        {!! Form::Close() !!}


                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
@stop
