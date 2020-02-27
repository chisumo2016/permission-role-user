@extends('layouts.app')
@section('content')

<div class="container">
    <div class="card">

        <div class="card-header">
            <h2>Edit Permissions</h2>
        </div>

        <div class="card-body">
            <form action="{{ route("permissions.update", [$permission->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                    <label for="title"> Name</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($permission) ? $permission->name : '') }}" required>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif

                </div>

                <div class="form-group {{ $errors->has('guard_name') ? 'has-error' : '' }}">
                    <label for="title"> Name</label>
                    <input type="text" id="guard_name" name="guard_name" class="form-control" value="{{ old('guard_name', isset($permission) ? $permission->guard_name : '') }}" required>
                    @if($errors->has('guard_name'))
                        <p class="help-block">
                            {{ $errors->first('guard_name') }}
                        </p>
                    @endif

                </div>
                <div>
                    <input class="btn btn-danger" type="submit" value="Update">
                </div>
            </form>


        </div>
    </div>
</div>
@endsection
