@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="rightside bg-grey-100">
            <!-- BEGIN PAGE HEADING -->
            <div class="page-head bg-grey-100">
                <h1 class="page-title">Permissions</h1>
                <a href="{{ route('permissions.create') }}" class="btn btn-lg    btn-primary active text-right mb-3" role="button"> Add Permission</a></h1>
            </div>

            @if($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif


            <div class="container-fluid">
                <!-- Main row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel no-border ">
                            <div class="panel-title bg-white no-border">
                            </div>
                            <div class="panel-body no-padding-top bg-white">
                                <table id="staffs" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Guard Name</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <tr>
                                        @foreach ($permissions as $permission)
                                            <td class="text-center">{{ $permission->name}}</td>
                                            <td class="text-center">{{ $permission->guard_name}}</td>

                                            <td class="text-center">
                                                <a class="btn btn-info btn-sm" href="{{ route('permissions.edit',$permission->id) }}">
                                                    <i class="fa fa-edit "></i>
                                                </a>

                                                <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST"  style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <button type="submit" class="btn btn-sm btn-danger" > <i class="fa fa-trash "></i> </button>

                                                </form>
                                            </td>

                                    </tr>

                                    @endforeach

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@stop
