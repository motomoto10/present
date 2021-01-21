@extends('layouts.app')

@section('content')
    <div class="row">
        @include('users.card')

        <div class="col-sm-12 no-gutters">
        @include('users.navtab')
        </div>
    </div>
    @include('giving_users.giving_users')
@endsection