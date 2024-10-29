@extends('layouts.master')
@section('content')

<div class="container mt-5">
    <a href="{{ url('roles') }}" class="btn btn-primary mx-1">Roles</a>
    <a href="{{ url('permissions') }}" class="btn btn-warning mx-1">Permissions</a>
    <a href="{{ url('users') }}" class="btn btn-warning mx-1">Users</a>
</div>

<div class="container mt-2">
    <div class="row">
        <div class="col-md-12">

            @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif

            <div class="card mt-3">
                <div class="card-header">
                    <h4>Clients
                        @can('create client')
                        <a href="{{ url('clients/create') }}" class="btn btn-primary float-end">Add Client</a>
                        @endcan
                    </h4>
                </div>
                <div class="card-body">

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th width="40%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clients as $client)
                            <tr>
                                <td>{{ $client->id }}</td>
                                <td>{{ $client->name }}</td>
                                <td>
                                    @can('update client')
                                    <a href="{{ url('clients/'.$client->id.'/edit') }}" class="btn btn-success">Edit</a>
                                    @endcan

                                    @can('delete client')
                                    <a href="{{ url('clients/'.$client->id.'/delete') }}" class="btn btn-danger mx-2" onclick="return confirmDelete()">Delete</a>
                                    @endcan
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
@endsection
<script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete this client?");
    }
</script>
