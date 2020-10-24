@extends('layouts.base')

@section('action-content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-outline card-warning">
                        <div class="card-header no-border">
                            <h3 class="card-title">Create New Permission</h3>

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
                            {!! Form::open(['route' => ['permission-management.store'], 'class'=>'form-horizontal', 'method' => 'POST', 'role'=>'form', 'enctype'=>'multipart/form-data']) !!}
                            {{--Start of form--}}
                            {{ csrf_field() }}
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                                        {!! Form::label('name', 'Name', ['class' => 'col-md-4 control-label']) !!}

                                        {{--<input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>--}}
                                        {!! Form::text('name', $value = old('name'), ['class' => 'form-control','autofocus','placeholder'=>'Enter Permission Name']) !!}
                                        @if ($errors->has('name'))
                                            <span class="help-block alert-danger">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                        @endif

                                    </div>
                                </div>
                            </div>

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
