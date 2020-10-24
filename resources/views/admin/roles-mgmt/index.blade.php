@extends('layouts.base')
@section('action-content')
        <!-- Main content -->
<section class="content">
    @include('layouts.messages')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-8">
                            <h3 class="card-title">List of roles</h3>
                        </div>
                        <div class="col-sm-4">
                            @can('create-role')
                            <a class="btn btn-warning" href="{{ route('role-management.create') }}">Add new role</a>
                            @endcan
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="roles" class="table table-bordered table-striped table-hover dataTable"
                           role="grid" aria-describedby="example1_info">
                        <thead>
                        <tr role="row">
                            <th>Name</th>
                            {{--<th>Description</th>--}}
                            <th>Updated At</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($roles as $role)
                            <tr role="row" class="odd">
                                {{--<td>{{ $loop->index + 1 }}</td>--}}
                                <td class="sorting_1">{{ $role->name }}</td>
                                {{--<td>{{ $role->description }}</td>--}}
                                <td class="hidden-xs">{{ $role->updated_at }}</td>
                                <td class="hidden-xs">{{ $role->created_at }}</td>
                                <td>
                                    <a href="{{ route('role-management.edit', $role->id) }}"
                                       class="btn btn-dark btn-margin">
                                        <i class="fas fa-edit"></i> Edit</a>
                                    <button type="button" data-role_id="{{$role->id}}" data-rolename="{{$role->name}}"  class="btn btn-danger" data-toggle="modal" data-target="#deleteRoleModal">
                                        <i class="fas fa-trash"></i>   Delete
                                    </button>

                                </td>
                            </tr>
                            @include('admin.roles-mgmt.deleteRoleModal')
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Name</th>
                            {{--<th>Description</th>--}}
                            <th>Updated At</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                    </table>

                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
@endsection
