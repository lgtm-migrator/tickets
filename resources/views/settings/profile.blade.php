@extends('layouts.base')

@section('base.title', tra('settings.title'))

@section('base.content')
<div class="container">
    <div class="row pb-5 pt-4">
        <div class="col-md-12">
            <h1>{{ tra('settings.title') }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            @include('settings._menu')
        </div>
        <div class="col-md-8 offset-md-1">
            @include('partials.messages.flashbox')

            <settings-profile />

            <form method="post" action="{{ route('settings') }}" class="d-none">
                {{ csrf_field() }}
                <div class="form-row">
                    <div class="form-group col-6 col-md-6">
                        <label for="first_name">{{ tra('settings.profile.first-name') }}</label>
                        <input type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" id="first_name" name="first_name" placeholder="Your first name" value="{{ Auth::user()->first_name }}">

                        @if ($errors->has('first_name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('first_name') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group col-6 col-md-6">
                        <label for="last_name">{{ tra('settings.profile.last-name') }}</label>
                        <input type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" id="last_name" name="last_name" placeholder="Your last name" value="{{ Auth::user()->last_name }}">

                        @if ($errors->has('last_name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('last_name') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">{{ tra('settings.profile.email') }}</label>
                    <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" name="email" placeholder="Your email address" value="{{ Auth::user()->email }}">

                    @if ($errors->has('email'))
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="phone">{{ tra('settings.profile.phone') }}</label>
                    <input id="phone" type="text" class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ Auth::user()->phone }}">

                    @if ($errors->has('phone'))
                        <div class="invalid-feedback">
                            {{ $errors->first('phone') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary px-4" value="{{ tra('form.button.update') }}">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
