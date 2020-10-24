@extends('layouts.base')
Add new role
@section('action-content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-outline card-warning">
                        <div class="card-header no-border">
                            <h3 class="card-title">Create New Role</h3>

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
                            {!! Form::open(['route' => ['role-management.store'], 'method' => 'POST','class'=>'form-horizontal',  'role'=>'form', 'enctype'=>'multipart/form-data']) !!}
                            {{--Start of form--}}
                            {{ csrf_field() }}
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        {!! Form::label('name', 'Name', ['class' => 'col-md-4 control-label']) !!}

                                        {!! Form::text('name', $value = old('name'), ['class' => 'form-control','autofocus','placeholder'=>'Enter Role Name']) !!}
                                        @if ($errors->has('name'))
                                            <br>
                                            <span class="help-block alert-danger">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                        @endif

                                    </div>
                                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                        {!! Form::label('description', 'Description', ['class' => 'col-md-4 control-label']) !!}

                                        {!! Form::textarea('description', $value = old('description'), ['class' => 'form-control','placeholder'=>'Enter Description e.g purpose of the role is for Bank Uploader', 'rows'=>'5']) !!}
                                        @if ($errors->has('description'))
                                            <br>
                                            <span class="help-block alert-danger">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                        @endif

                                    </div>
                                    <div class="form-group">


                                        {!! Form::label('permission', 'Permissions', ['class' => 'col-md-4 control-label']) !!}

                                        <div class="list-group-item custom-control form-check-inline card-columns col-md-12">
                                            @foreach($permissions as $permission)
                                                {!! Form::checkbox('permissions[]', $permission->id, false, ['class' => 'form-check minimal-blue']) !!}
                                                <span class="form-check-label">{{ $permission->name }}</span>
                                                {{--<input type="checkbox" class="form-check-input" name="permission[]" value="{{ $permission->id }}">{{ $permission->name }}--}}
                                            @endforeach
                                            @if ($errors->has('permissions'))
                                                <br>
                                                <span class="help-block alert-danger">
                                        <strong>{{ $errors->first('permissions') }}</strong>
                                    </span>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--<div class="form-group row">--}}
                    {{--<div class="card-header">--}}
                    {{--<div class="card">--}}
                    {{--{!! Form::label('permission', 'permission', ['class' => 'col-md-4 control-label']) !!}--}}
                    {{--</div>--}}
                    {{--<div class="card-body">--}}
                    {{--@foreach($permissions as $permission)--}}
                    {{--<h3>{{ $permission->category }}</h3>--}}
                    {{--<br/>--}}
                    {{--@foreach($permissions as $permission)--}}
                    {{--<div class="form-check form-check-inline">--}}
                    {{--{!! Form::checkbox('permissions[]', '1', null, ['class' => 'form-check-input']) !!}--}}
                    {{--<span class="form-check-label">{{ $permission->name }}</span>--}}

                    {{--</div>--}}
                    {{--@endforeach--}}
                    {{--@endforeach--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    <div class="form-group form-inline">
                        {!! Form::submit('Save and Close',['class'=>'btn btn-warning', 'style'=>'display: block; margin: 0 auto;']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        </div>

        </div>
    </section>
@endsection
