@extends('layouts.app')

@section('content')
    <div class="row">
        @include('users.card')
        @include('users.navtab')
        @include('navarea.giving_users')
    </div>
    
@endsection