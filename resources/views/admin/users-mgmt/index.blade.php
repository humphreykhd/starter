@extends('layouts.base')
@section('action-content')
        <!-- Main content -->
<section class="content">
    @include('layouts.messages')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-8">
                    <h3 class="card-title">List of users</h3>
                </div>
                <div class="col-sm-4">
                    @can('create-user')
                    <a class="btn btn-warning" href="{{ route('user-management.create') }}">Add new user</a>
                    @endcan
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card card-body card-warning">
            <table id="users" class="table table-bordered table-striped table-hover dataTable" role="grid"
                   aria-describedby="example2_info">
                <thead>
                <tr role="row">
                    <th>Name</th>
                    <th>Email</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                    <tr role="row" class="odd">
                        <td class="sorting_1">{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td class="hidden-xs">{{ $user->first_name }}</td>
                        <td class="hidden-xs">{{ $user->last_name }}</td>

                        <td>
                            @can('update-user')
                            <a href="{{ route('user-management.edit', $user->id) }}"
                               class="btn btn-dark btn-dark">
                                <i class="fas fa-edit"></i> Edit</a>
                            @endcan
                            @can('delete-user')
                            <button type="button" data-userid="{{$user->id}}" data-username="{{$user->name}}" class="btn btn-danger" data-toggle="modal" data-target="#deleteUserModal">
                                <i class="fas fa-trash"></i>   Delete
                            </button>
                            @endcan

                        </td>
                    </tr>
                    @include('admin.users-mgmt.deleteUserModal')
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Action</th>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
</section>
@endsection
