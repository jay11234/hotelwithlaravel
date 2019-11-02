@extends('layouts.app')

@section('content')
<h3 class="page-title">Check Sheet</h3>

{!! Form::model($checksheet, ['method' => 'PUT', 'route' => ['admin.checksheets.update', $checksheet->id]]) !!}

<div class="panel panel-default">
    <div class="panel-heading">
        @lang('quickadmin.qa_edit')
    </div>

    <div class="panel-body">
        <div class="row">
            <div class="col-xs-12 form-group">
                {!! Form::label('start_time', trans('Start Time').'*', ['class' => 'control-label']) !!}
                {!! Form::text('start_time', old('start_time'), ['class' => 'form-control datetimepicker', 'placeholder' => '', 'required' => '']) !!}
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
                {!! Form::label('end_time', trans('End Time').'*', ['class' => 'control-label']) !!}
                {!! Form::text('end_time', old('end_time'), ['class' => 'form-control datetimepicker', 'placeholder' => '', 'required' => '']) !!}
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
                {!! Form::label('total_cycle', trans('Total Cycle').'', ['class' => 'control-label']) !!}
                {!! Form::select('total_cycle', $rooms, old('total_cycle'), ['class' => 'form-control select2']) !!}
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
                {!! Form::label('name', trans('Room').'', ['class' => 'control-label']) !!}
                {!! Form::select('room_id', $rooms, old('room_id'), ['class' => 'form-control select2']) !!}
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
                {!! Form::label('name', trans('House Keeper').'', ['class' => 'control-label']) !!}
                {!! Form::select('name', $housekeepers, old('housekeeper_id'), ['class' => 'form-control select2']) !!}
                <p class="help-block"></p>
                @if($errors->has('name'))
                <p class="help-block">
                    {{ $errors->first('name') }}
                </p>
                @endif
            </div>
        </div>

    </div>
</div>

{!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
{!! Form::close() !!}
@stop

@section('javascript')
@parent
<script src="https://cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<script>
    $('.datetimepicker').datetimepicker({
        format: "YYYY-MM-DD HH:mm"
    });
</script>
@stop