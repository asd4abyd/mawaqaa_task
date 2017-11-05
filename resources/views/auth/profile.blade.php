@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('auth.register') }}</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('user.profile') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <label for="first_name" class="col-md-4 control-label">{{ trans('auth.first_name') }}</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name')?: auth()->user()->first_name  }}" required autofocus>

                                @if ($errors->has('first_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                            <label for="last_name" class="col-md-4 control-label">{{ trans('auth.last_name') }}</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name')?: auth()->user()->last_name }}">

                                @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">{{ trans('auth.email') }}</label>
                            <div class="col-md-6">
                                <label class="form-control">{{ auth()->user()->email }}</label>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                            <label for="country" class="col-md-4 control-label">{{ trans('auth.country') }}</label>

                            <div class="col-md-6">
                                <select id="country" class="form-control" name="country"  required>
                                    <option value="">{{ trans('auth.select_country') }}</option>
                                    @foreach(trans('country') as $key=>$value)
                                        <option value="{{ $key }}" {{ (old('country')?: auth()->user()->country)==$key? 'selected="selected"': '' }}>{{ $value }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('country'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone" class="col-md-4 control-label">{{ trans('auth.phone') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone')?: auth()->user()->phone }}">

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-primary">
                                            {{ trans('auth.register') }}
                                        </button>
                                    </div>
                                    <div class="col-md-6">
                                        @if ($done)
                                        <div class="alert alert-success" role="alert">
                                            {{ trans('common.save_success') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
