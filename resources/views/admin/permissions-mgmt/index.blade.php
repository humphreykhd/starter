@extends('layouts.base')
@section('action-content')
        <!-- Main content -->
<section class="content">
    <div class="card">

        @include('layouts.messages')
        <div class="card-header">
            <div class="row">
                <div class="col-sm-8">
                    <h3 class="card-title">List of permissions</h3>
                </div>
                <div class="col-sm-4">
                    @can('create-permission')
                    <a class="btn btn-warning" href="{{ route('permission-management.create') }}">Add new permission</a>
                    @endcan
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="permissions" class="table table-bordered table-striped dataTable" aria-describedby="example1_info">
                <thead>
                <tr role="row">
                    <th>Name</th>
                    <th>Guard</th>
                    <th>Updated At</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($permissions as $permission)
                    <tr role="row" class="odd">
                        {{--<td>{{ $loop->index + 1 }}</td>--}}
                        <td class="sorting_1">{{ $permission->name }}</td>
                        <td>{{ $permission->guard_name }}</td>
                        <td class="hidden-xs">{{ $permission->updated_at }}</td>
                        <td class="hidden-xs">{{ $permission->created_at }}</td>
                        <td>
                            @can('update-permission')
                            <a href="{{ route('permission-management.edit', $permission->id) }}"
                               class="btn btn-dark btn-margin">
                                <i class="fas fa-edit"></i> Edit</a>
                            @endcan
                            @can('delete-permission')
                            <button type="button" data-permission_id="{{$permission->id}}" data-permissionname="{{$permission->name}}"  class="btn btn-danger" data-toggle="modal" data-target="#deletePermissionModal">
                                <i class="fas fa-trash"></i>   Delete
                            </button>
                            @endcan

                        </td>
                    </tr>
                    @include('admin.permissions-mgmt.deletePermissionModal')
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Guard</th>
                    <th>Updated At</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <!-- /.card-body -->

</section>
@endsection
