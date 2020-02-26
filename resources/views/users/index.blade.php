@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="text-center">
                <h2>Users Management</h2>
            </div>
            <div class="text-right m-auto">
                <a href="{{ route('users.create') }}" class="btn btn-success">Create New Users</a>
            </div>
        </div>
    </div>

    <br><br>
    @if($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>No   :</th>
            <th>Name :</th>
            <th>Email :</th>
            <th>Roles :</th>
            <th>Action :</th>
        </tr>
        </thead>

        <tbody>
        @foreach($users as $key => $user)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @if(!empty($user->getRoleNames()))
                        @foreach($user->getRoleNames() as $v)
                            <label for="" class="badge badge-success">{{$v}}</label>
                        @endforeach
                    @endif
                </td>

                <td>
                    <a href="{{ route('users.show', $user->id) }}" class="btn btn-info">Show</a>
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                    {!! Form::open(['method' => 'DELETE' , 'route' => ['users.destroy', $user->id], 'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}

                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!!  $users->render() !!}

</div>
@endsection
