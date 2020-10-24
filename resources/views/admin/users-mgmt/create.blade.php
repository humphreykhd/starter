@extends('layouts.base')

@section('action-content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-outline card-warning">
                        <div class="card-header no-border">
                            <h3 class="card-title">Create New User</h3>

                            <div class="card-tools">
                                <a href="{{ route('user-management.index') }}" class="btn btn-tool btn-sm">
                                    <i class="fas fa-chevron-circle-left"></i>
                                </a>
                                <a href="#" class="btn btn-tool btn-sm">
                                    <i class="fas fa-bars"></i>
                                </a>
                            </div>
                        </div>
                        <hr>
                        <div class="card-body">
                            {!! Form::open(['route' => ['user-management.store'], 'method' => 'POST','role'=>'form', 'enctype'=>'multipart/form-data', 'class'=>'form-horizontal']) !!}
                            {{ csrf_field() }}

                            <div class="form-row">
                                <div class="form-group col-md-10">

                                    <img src="{{ asset("/img/avatar.png") }}"  class="profile-user-img img-responsive img-circle mx-auto d-block" alt="User Image">

                                    <div style="text-align: center;">
                                    <span class="btn btn-warning btn-file">
                                            <span class="fileupload-new">Insert Profile Image</span>
                                        {!! Form::file('profilepic') !!}
                                                                </span>

                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-inline{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                <div class="col-md-4">
                                    {!! Form::label('first_name', 'First Name', ['class' => 'control-label']) !!}
                                </div>
                                <div class="col-md-6">
                                    {{--<input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required>--}}
                                    {!! Form::text('first_name', $value = old('first_name'), ['class' => 'form-control','placeholder'=>'Enter First Name']) !!}
                                    @if ($errors->has('first_name'))
                                        <br>
                                        <span class="help-block alert-danger">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group form-inline{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                {!! Form::label('last_name', 'Last Name', ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-6">
                                    {!! Form::text('last_name', $value = old('last_name'), ['class' => 'form-control','placeholder'=>'Enter Last Name']) !!}
                                    @if ($errors->has('last_name'))
                                        <br>
                                        <span class="help-block alert-danger">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group form-inline{{ $errors->has('email') ? ' has-error' : '' }}">
                                {!! Form::label('email', 'Email Address', ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-6">
                                    {!! Form::text('email', $value = old('email'), ['class' => 'form-control','placeholder'=>'Enter Valid Email Address']) !!}
                                    @if ($errors->has('email'))
                                        <br>
                                        <span class="help-block alert-danger">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            {{--<div class="form-group form-inline{{ $errors->has('roles') ? ' has-error' : '' }}">--}}
                                {{--{!! Form::label('roles', 'User role(s):', ['class' => 'col-md-4 control-label']) !!}--}}
                                {{--<div class="col-md-6">--}}
                                    {{--@foreach($roles as $role)--}}
                                        {{--{!! Form::checkbox('roles[]', $role->id, null,['class' => 'form-check-input minimal']) !!}--}}
                                        {{--<span class="form-check-label">{{ $role->name }}</span>--}}
                                    {{--@endforeach--}}
                                    {{--@if ($errors->has('roles'))--}}
                                        {{--<br>--}}
                                        {{--<span class="help-block alert-danger">--}}
                                        {{--<strong>{{ $errors->first('roles') }}</strong>--}}
                                    {{--</span>--}}
                                    {{--@endif--}}

                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="form-group form-inline{{ $errors->has('member_id') ? ' has-error' : '' }}">--}}
                                {{--{!! Form::label('member_id', 'Member Institution:', ['class' => 'col-md-4 control-label']) !!}--}}
                                {{--<div class="col-md-6">--}}
                                    {{--{!! Form::select('member_id', $members->pluck('institution_name', 'id'), null, ['class' => 'form-control', 'placeholder' => 'Select Member...']) !!}--}}

                                    {{--@if ($errors->has('member_id'))--}}
                                        {{--<br>--}}
                                        {{--<span class="help-block alert-danger">--}}
                                        {{--<strong>{{ $errors->first('member_id') }}</strong>--}}
                                    {{--</span>--}}
                                    {{--@endif--}}

                                {{--</div>--}}
                            {{--</div>--}}

                            <div class="form-group form-inline">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-4">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Enter New Password" >

                                    @if ($errors->has('password'))
                                        <br>
                                        <span class="help-block alert-danger">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group form-inline">
                                <label for="password-confirmation" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-4">
                                    <input id="password-confirmation" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
                                    @if ($errors->has('password_confirmation'))
                                        <br>
                                        <span class="help-block alert-danger">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>


                            <div class="form-group form-inline">
                                {!! Form::submit('Save',['class'=>'btn btn-warning', 'style'=>'display: block; margin: 0 auto;']) !!}
                            </div>
                            {{--End of Form--}}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection