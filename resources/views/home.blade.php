@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                @can('view user')
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <td><a href="roles">Roles</a></td>
                                <td><a href="permissions">Permissions</a></td>
                                <td><a href="users">Users</a></td>
                                <td><a href="clients">Clients</a></td>
                                <td><a href="home">Categories</a></td>
                                <td><a href="home">Brands</a></td>
                                <td><a href="home">Attributes</a></td>
                                <td><a href="home">Products</a></td>
                                <td><a href="home">Attribute Values</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
