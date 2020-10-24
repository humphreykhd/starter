@extends('layouts.base')
@section('action-content')
        <!-- Content Header (Page header) -->
@include('layouts.messages')
<section class="content">

    <!-- Main content -->
    <section class="row">

        {{--<div class="row">--}}
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-warning">
                <div class="card-body">
                    @if(is_null(Auth::user()->profilepic) or empty(Auth::user()->profilepic))
                        <img src="{{ asset("/img/avatar.png") }}"  class="profile-user-img img-responsive img-circle mx-auto d-block" alt="User Image">
                    @else
                        <img src="{{ asset("/profilepics/". Auth::user()->profilepic) }}"  class="profile-user-img img-responsive img-circle mx-auto d-block"
                             alt="User Image">
                    @endif

                    <h3 class="profile-username text-center">{{$user->first_name.' '.$user->last_name}}</h3>

                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Email:</b> <a class="pull-right">{{ $user->email }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Roles:</b> <a class="pull-right">
                                @if($loginuser != 'SuperAdmin')
                                    @foreach($roles as $role)
                                        <span class="form-check-label">{{ $role->name }}</span>
                                    @endforeach
                                @else
                                    @foreach($userrole as $roleuser)
                                        <span class="form-check-label">{{ $roleuser->name }}</span>
                                    @endforeach
                                @endif

                            </a>
                        </li>
                    </ul>

                    {{--<a href="{{ route('resetpassword', ['id'=> $user->id]) }}" class="btn btn-warning btn-block"><b>Reset Password</b></a>--}}
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="card card-outline card-warning">
                <div class="card-header no-border">
                    <div class="card-title">Edit profile</div>
                    <div class="card-tools">
                        <a href="#" class="btn btn-tool btn-sm">
                            <i class="fas fa-download"></i>
                        </a>
                        <a href="#" class="btn btn-tool btn-sm">
                            <i class="fas fa-bars"></i>
                        </a>
                    </div>
                </div>
                <hr>
                <div class="card-body">
                    {!! Form::model($user, ['route' => ['user-management.update', $user->id], 'role'=>'form', 'method' => 'POST', 'enctype'=>'multipart/form-data', 'class'=>'form-horizontal form-group', 'files' => true]) !!}
                    {{--Start of form--}}
                    {{Form::hidden('_method','PATCH')}}
                    {{ csrf_field() }}
                    <div class="form-row">
                        <div class="form-group form-inline col-md-10{{ $errors->has('first_name') ? ' has-error' : '' }}">

                            {!! Form::label('first_name', 'First Name', ['class' => 'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                                @if($loginuser != 'SuperAdmin')
                                    {!! Form::text('first_name', $value = $user->first_name, ['class' => 'form-control','disabled'=>'True','required']) !!}
                                    {!! Form::hidden('first_name', $value = $user->first_name, ['class' => 'form-control','required']) !!}

                                @else
                                    {!! Form::text('first_name', $value = $user->first_name, ['class' => 'form-control','required']) !!}

                                @endif
                                <br/>
                                @if ($errors->has('first_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group form-inline col-md-10{{ $errors->has('last_name') ? ' has-error' : '' }}">
                            {!! Form::label('last_name', 'Last Name', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                @if($loginuser != 'SuperAdmin')
                                    {!! Form::text('last_name', $value = $user->last_name, ['class' => 'form-control','disabled'=>'True','required']) !!}
                                    {!! Form::hidden('last_name', $value = $user->last_name, ['class' => 'form-control','required']) !!}

                                @else
                                    {!! Form::text('last_name', $value = $user->last_name, ['class' => 'form-control','required']) !!}
                                @endif
                                @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group form-inline col-md-10">

                            {!! Form::label('email', 'Email', ['class' => 'col-md-4 control-label']) !!}
                            @if($loginuser != 'SuperAdmin')
                                {!! Form::text('email', $value = $user->email, ['class' => 'form-control col-md-6','disabled'=>'True','required']) !!}
                                {!! Form::hidden('email', $value = $user->email, ['class' => 'form-control col-md-6','required']) !!}

                            @else
                                {!! Form::text('email', $value = $user->email, ['class' => 'form-control col-md-6','required']) !!}

                            @endif
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group form-inline col-md-10">
                            {!! Form::label('roles', 'User role(s):', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                @foreach($roles as $role)
                                    @if($loginuser != 'SuperAdmin')

                                        {!! Form::checkbox('roles[]', $role->id, $user->roles,['class' => 'form-check-input minimal','disabled'=>'True']) !!}
                                        {!! Form::hidden('roles[]', $value = $role->id, ['class' => 'form-control col-md-6','required']) !!}
                                        <span class="form-check-label">{{ $role->name }}</span>
                                    @else
                                        {!! Form::checkbox('roles[]', $role->id, $user->roles,['class' => 'form-check-input minimal']) !!}
                                        <span class="form-check-label">{{ $role->name }}</span>
                                    @endif

                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-10">

                        <div style="text-align: center;">
                                    <span class="btn btn-warning btn-file">
                                           @if(is_null($user->profilepic) or empty($user->profilepic))
                                            <span class="fileupload-new">Upload Profile Image</span>
                                            {!! Form::file('profilepic') !!}
                                                                </span>
                            @else
                                <span class="fileupload-exists">Change Image</span>
                                {!! Form::file('profilepic') !!}</span>

                                <a href="{{ route('remove-profileimage', ['id'=> $user->id], false) }}"
                                   class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove Image</a>
                                </span>
                            @endif

                        </div>
                    </div>

                    <div class="form-group form-inline">
                        {!! Form::submit('Update',['class'=>'btn btn-warning', 'style'=>'display: block; margin: 0 auto;']) !!}
                    </div>
                </div>
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
        </div>
        <!-- /.col -->
        {{--</div>--}}
        <!-- /.row -->
        {{--End of Form--}}
        {!! Form::close() !!}
    </section>
    <!-- /.content -->
</section>
@endsection
