@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default panel-primary">
                <div class="panel-heading">
                    {{ trans('auth.locations_manager') }}
                    <div class="control-label pull-right" style="margin-top: -5px">
                        <a class="btn btn-sm btn-success" href="{{ route('user.location.add_new') }}">@lang('auth.new_location')</a>
                    </div>
                </div>

                <div class="panel-body">
                    <table class="table">

                        <thead>
                        <tr>
                            <th>@lang('auth.paci')</th>
                            <th>@lang('auth.area')</th>
                            <th>@lang('auth.location')</th>
                            <th>@lang('auth.map')</th>
                            <th>@lang('auth.active')</th>
                            <th>@lang('common.created_at')</th>
                            <th>@lang('common.updated_at')</th>
                            <th>@lang('common.action')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($locations as $location)
                            <tr>
                                <td>{{ $location->paci }}</td>
                                <td>{{ $location->area }}</td>
                                <td>{{ $location->location }}</td>
                                <td>{{ $location->map }}</td>
                                <td>{{ $location->create_at }}</td>
                                <td>{{ $location->update_at }}</td>
                                <td><span>{{ trans_choice('auth.active_choice', $location->is_active) }}</span></td>
                                <td><a class="btn btn-sm btn-warning" href="{{ route('user.location.edit', $location->id) }}">@lang('common.edit')</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
