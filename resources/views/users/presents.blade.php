@extends('layouts.app')

@section('content')
    <div class="row">
        @include('users.card')
        @include('users.navtab')
    </div>
    <div class="container" >
        <div class="row justify-content-center">
        @foreach ($giving_users as $giving_user)
            @foreach ($giving_user->anniversaries as $anniversary)
                    @if(count($anniversary->presents) > 0)
                        @foreach ($anniversary->presents as $present)
                            @include('users.present')
                        @endforeach
                    @endif
                @endforeach  
            @endforeach
        </div>
    </div>
@endsection