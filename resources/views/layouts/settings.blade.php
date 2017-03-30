@extends('layouts.base')

@section('base.content')
    <div class="row">
        <div class="col-md-3">
            @include("partials.nav.settings")
        </div>

        <div class="col-md-9">
            <div class="panel panel-default">@yield('settings.title')</div>

            <div class="panel-body">

                @yield('content')

            </div>
        </div>
    </div>
</div>
@endsection
