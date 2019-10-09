@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.agencies.title')</h3>
 <!-- ['name','address','phone','details']; -->
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.agencies.fields.name')</th>
                            <td field-key='name'>{{ $agency->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.agencies.fields.address')</th>
                            <td field-key='address'>{{ $agency->address }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.agencies.fields.phone')</th>
                            <td field-key='phone'>{{ $agency->phone }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.agencies.fields.details')</th>
                            <td field-key='details'>{{ $agency->details }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
 
     
<!-- Tab panes --> 

            <p>&nbsp;</p>

            <a href="{{ route('admin.countries.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop
