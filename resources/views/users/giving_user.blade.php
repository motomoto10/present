@extends('layouts.app')

@section('content')
    <div class="row">
        @include('users.card')
        @include('users.navtab')
    </div>
    @include('giving_users.giving_users')
@endsection