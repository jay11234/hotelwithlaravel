@extends('layouts.app')
<!-- ['start_time', 'end_time', 'total_cycle','room_id','housekeeper_id']; -->
@section('content')
    <h3 class="page-title">Check Sheet</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.checksheets.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        <!-- ['name','address','phone','details']; -->
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('start_time', trans('quickadmin.checksheets.fields.start_time').'', ['class' => 'control-label']) !!}
                    {!! Form::text('start_time', old('start_time'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('start_time'))
                        <p class="help-block">
                            {{ $errors->first('start_time') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('end_time', trans('quickadmin.checksheets.fields.end_time').'', ['class' => 'control-label']) !!}
                    {!! Form::text('end_time', old('end_time'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('end_time'))
                        <p class="help-block">
                            {{ $errors->first('end_time') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('total_cycle', trans('quickadmin.checksheets.fields.total_cycle').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('total_cycle', old('total_cycle'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('total_cycle'))
                        <p class="help-block">
                            {{ $errors->first('total_cycle') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('room_id', trans('quickadmin.checksheets.fields.room_id').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('room_id', old('room_id'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('room_id'))
                        <p class="help-block">
                            {{ $errors->first('room_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('housekeeper_id', trans('quickadmin.checksheets.fields.housekeeper_id').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('housekeeper_id', old('housekeeper_id'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('housekeeper_id'))
                        <p class="help-block">
                            {{ $errors->first('housekeeper_id') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

