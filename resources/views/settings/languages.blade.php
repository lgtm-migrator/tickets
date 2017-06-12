@extends('layouts.settings')

@section('settings.title', Helper::tra('settings.panel.title.language'))

@section('content')
<form method="post" action="{{ route('settings.language') }}">
    {{ csrf_field() }}
    <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
        <label for="inputLanguage" class="control-label">{{ Helper::tra('settings.language.language') }}</label>
        <select class="form-control" name="language" id="inputLanguage">
            <option value="none" {{ (Auth::user()->language == "") ? "checked" : "" }}>{{ Helper::tra('language.automatic') }}</option>
            <option value="en" {{ (Auth::user()->language == "en") ? "checked" : "" }}>{{ Helper::tra('language.english') }}</option>
            <option value="fi" {{ (Auth::user()->language == "sv") ? "checked" : "" }}>{{ Helper::tra('language.finnish') }}</option>
        </select>

        @if ($errors->has('language'))
            <span class="help-block">
                <strong>{{ $errors->first('language') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-default">{{ Helper::tra('form.button.update') }}</button>
    </div>
</form>
@endsection
