@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('auth.new_location') }}</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ isset($location['id'])?route('user.location.edit', $location['id']): route('user.location.add_new') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('paci') ? ' has-error' : '' }}">
                            <label for="paci" class="col-md-4 control-label">{{ trans('auth.paci') }}</label>

                            <div class="col-md-6">
                                <input id="paci" type="text" class="form-control" name="paci" value="{{ old('paci', isset($location['paci'])?$location['paci']:'') }}" autofocus>

                                @if ($errors->has('paci'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('paci') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('area') ? ' has-error' : '' }}">
                            <label for="area" class="col-md-4 control-label">{{ trans('auth.area') }}</label>

                            <div class="col-md-6">
                                <input id="area" type="text" class="form-control" name="area" value="{{ old('area', isset($location['area'])?$location['area']:'') }}">

                                @if ($errors->has('area'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('area') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">{{ trans('auth.location') }}</label>

                            <div class="col-md-6">
                                <input id="location" type="text" class="form-control" name="location" value="{{ old('location', isset($location['location'])?$location['location']:'') }}" />

                                @if ($errors->has('location'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('location') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('map') ? ' has-error' : '' }}">
                            <label for="map" class="col-md-4 control-label">{{ trans('auth.map') }}</label>

                            <div class="col-md-6">
                                <input id="map" type="text" class="form-control" name="map" value="{{ old('map', isset($location['map'])?$location['map']:'') }}">

                                @if ($errors->has('map'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('map') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('is_active') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">{{ trans('auth.status') }}</label>

                            <div class="col-md-6">
                                <label class="radio-inline"><input type="radio" value="1" {{ old('is_active', isset($location['is_active'])?$location['is_active']:1)==1? 'checked="checked"': '' }} name="is_active"> {{ trans_choice('auth.active_choice', 1) }}</label>
                                <label class="radio-inline"><input type="radio" value="0" {{ old('is_active', isset($location['is_active'])?$location['is_active']:1)==0? 'checked="checked"': '' }} name="is_active"> {{ trans_choice('auth.active_choice', 0) }}</label>

                                @if ($errors->has('map'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('is_active') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ trans(isset($location['id'])?'common.save':'common.add_new') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
