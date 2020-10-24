@extends('layouts.base')

@section('action-content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-outline card-warning">
                        <div class="card-header no-border">
                            <h3 class="card-title">Edit permission</h3>

                            <div class="card-tools">
                                <a href="{{ route('permission-management.index') }}" class="btn btn-tool btn-sm">
                                    <i class="fas fa-chevron-circle-left"></i>
                                </a>
                                <a href="#" class="btn btn-tool btn-sm">
                                    <i class="fas fa-bars"></i>
                                </a>
                            </div>
                        </div>
                        <hr>
                        <div class="card-body">
                            {!! Form::model($permission, ['route' => ['permission-management.update', $permission->id], 'role'=>'form', 'method' => 'POST', 'class'=>'form-horizontal form-group', 'enctype'=>'multipart/form-data']) !!}
                            {{--Start of form--}}
                            {{Form::hidden('_method','PATCH')}}
                            {{ csrf_field() }}
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        {{--<label for="name" class="col-md-4 control-label">Name</label>--}}
                                        {!! Form::label('name', 'Name', ['class' => 'col-md-4 control-label']) !!}

                                        {!! Form::text('name', $value = $permission->name, ['class' => 'form-control', 'autofocus']) !!}
                                        @if ($errors->has('name'))
                                            <span class="help-block alert-danger">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                        @endif

                                    </div>
                                </div>
                            </div>
                            {{--<div class="form-group form-inline{{ $errors->has('category') ? ' has-error' : '' }}">--}}
                            {{--{!! Form::label('category', 'Category', ['class' => 'col-md-4 control-label']) !!}--}}
                            {{--<div class="col-md-6">--}}
                            {{--{!! Form::text('category', $value = $permission->category, ['class' => 'form-control', 'autofocus', 'required']) !!}--}}
                            {{--@if ($errors->has('category'))--}}
                            {{--<span class="help-block">--}}
                            {{--<strong>{{ $errors->first('category') }}</strong>--}}
                            {{--</span>--}}
                            {{--@endif--}}
                            {{--</div>--}}
                            {{--</div>--}}

                            <div class="form-group">
                                {!! Form::submit('Update',['class'=>'btn btn-warning', 'style'=>'display: block; margin: 0 auto;']) !!}
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
