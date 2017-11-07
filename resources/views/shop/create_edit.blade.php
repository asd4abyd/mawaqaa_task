@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('shop.create') }}</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route(isset($shop['id'])?'shop.edit':'shop.create') }}">
                        {{ csrf_field() }}
                        @if(isset($shop['id']))
                        <input name="id" type="hidden" value="{{ $shop['id'] }}" />
                        @endif
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">{{ trans('shop.name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name', isset($shop['name'])?$shop['name']:'') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('phone_1') ? ' has-error' : '' }}">
                            <label for="phone_1" class="col-md-4 control-label">{{ trans('shop.phone_1') }}</label>

                            <div class="col-md-6">
                                <input id="phone_1" type="text" class="form-control" name="phone_1" value="{{ old('phone_1', isset($shop['phone_1'])?$shop['phone_1']:'') }}" required>

                                @if ($errors->has('phone_1'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone_1') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('phone_2') ? ' has-error' : '' }}">
                            <label for="phone_2" class="col-md-4 control-label">{{ trans('shop.phone_2') }}</label>

                            <div class="col-md-6">
                                <input id="phone_2" type="text" class="form-control" name="phone_2" value="{{ old('phone_2', isset($shop['phone_2'])?$shop['phone_2']:'') }}">

                                @if ($errors->has('phone_2'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone_2') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('delivery_time') ? ' has-error' : '' }}">
                            <label for="delivery_time" class="col-md-4 control-label">{{ trans('shop.delivery_time') }}</label>

                            <div class="col-md-6">
                                <input id="delivery_time" type="text" class="form-control number" name="delivery_time" value="{{ old('delivery_time', isset($shop['delivery_time'])?$shop['delivery_time']:'') }}" required>

                                @if ($errors->has('delivery_time'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('delivery_time') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('delivery_charge') ? ' has-error' : '' }}">
                            <label for="delivery_charge" class="col-md-4 control-label">{{ trans('shop.delivery_charge') }}</label>

                            <div class="col-md-6">
                                <input id="delivery_charge" type="text" class="form-control number-float" name="delivery_charge" value="{{ old('delivery_charge', isset($shop['delivery_charge'])?$shop['delivery_charge']:'') }}" required>

                                @if ($errors->has('delivery_charge'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('delivery_charge') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('pref_description') ? ' has-error' : '' }}">
                            <label for="pref_description" class="col-md-4 control-label">{{ trans('shop.pref_description') }}</label>

                            <div class="col-md-6">
                                <textarea id="pref_description" class="form-control" name="pref_description">{{ old('pref_description', isset($shop['pref_description'])?$shop['pref_description']:'') }}</textarea>

                                @if ($errors->has('pref_description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pref_description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">{{ trans('shop.description') }}</label>

                            <div class="col-md-6">
                                <textarea id="description" style="min-height: 100px;" class="form-control" name="description" required>{{ old('description', isset($shop['description'])?$shop['description']:'') }}</textarea>

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ trans('shop.create') }}
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
