@extends('layouts.base')

@section('action-content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-outline card-warning">
                        <div class="card-header no-border">
                            <h3 class="card-title">Edit Role</h3>

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
                            {!! Form::model($role, ['route' => ['role-management.update', $role->id], 'role'=>'form', 'method' => 'POST', 'enctype'=>'multipart/form-data', 'class'=>'form-horizontal', 'files' => true]) !!}
                            {{--Start of form--}}
                            {{Form::hidden('_method','PATCH')}}
                            {{ csrf_field() }}
                            <div class="form-row">
                                <div class="col-md-12">

                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        {{--<label for="username" class="col-md-4 control-label">Name</label>--}}
                                        {!! Form::label('name', 'Name', ['class' => 'col-md-4 control-label']) !!}

                                        {!! Form::text('name', $value = $role->name, ['class' => 'form-control', 'autofocus']) !!}
                                        {{--<input id="name" type="text" class="form-control" name="name"--}}
                                        {{--value="{{ $role->name }}" required autofocus>--}}
                                        @if ($errors->has('name'))
                                            <br>
                                            <span class="help-block alert-danger">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                        @endif

                                    </div>
                                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                        {{--<label for="description" class="col-md-4 control-label">Description</label>--}}
                                        {!! Form::label('description', 'Description', ['class' => 'col-md-4 control-label']) !!}

                                        {!! Form::textarea('description', $value = $role->description, ['class' => 'form-control','rows'=>'5']) !!}
                                        {{--<textarea id="description" type="text" class="form-control" name="description"--}}
                                        {{--rows="5">{{ $role->description }}</textarea>--}}
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
                                                {!! Form::checkbox('permissions[]', $permission->id, $role->permission,['class' => 'form-check minimal-blue']) !!}
                                                <span class="form-check-label">{{ $permission->name }}</span>
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

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {!! Form::submit('Update and Close',['class'=>'btn btn-warning', 'style'=>'display: block; margin: 0 auto;']) !!}
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        </div>
    </section>
@endsection
