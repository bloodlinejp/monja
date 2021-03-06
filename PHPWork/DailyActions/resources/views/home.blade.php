@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('home.Home') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('home') }}" aria-label="{{ __('home.Register') }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('home.Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" placeholder="{{ old('name', $user->name) }}" autofocus>
                                    <span class="errmsg invalid-feedback" role="alert"></span>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('home.E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="{{ old('email', $user->email) }}">
                                    <span class="errmsg invalid-feedback" role="alert"></span>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email-confirm" class="col-md-4 col-form-label text-md-right">{{ __('home.Confirm E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email-confirm" type="email" class="form-control" name="email_confirmation" placeholder="{{ old('email_confirmation', $user->email_confirmation) }}" disabled>
                            </div>
                            <label><span class="msg badge badge-success">{{ __('dailyactions.IfChange') }}</span></label>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('home.Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="newpassword" class="col-md-4 col-form-label text-md-right">{{ __('home.New Password') }}</label>

                            <div class="col-md-6">
                                <input id="newpassword" type="password" class="form-control{{ $errors->has('newpassword') ? ' is-invalid' : '' }}" name="newpassword">
                                    <span class="errmsg invalid-feedback" role="alert"></span>

                                @if ($errors->has('newpassword'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('newpassword') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <label><span class="msg badge badge-success">{{ __('dailyactions.IfChange') }}</span></label>
                        </div>

                        <div class="form-group row">
                            <label for="newpassword-confirm" class="col-md-4 col-form-label text-md-right">{{ __('home.Confirm New Password') }}</label>

                            <div class="col-md-6">
                                <input id="newpassword-confirm" type="password" class="form-control" name="newpassword_confirmation" disabled>
                            </div>
                            <label><span class="msg badge badge-success">{{ __('dailyactions.IfChange') }}</span></label>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="reset" name="reset" class="btn btn-outline-primary">{{ __('home.Reset') }}</button>
                                @component('components.btn-upd-confirm', ['btnid' => 'btn-users-update'])
                                @endcomponent
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
