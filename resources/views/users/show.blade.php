@extends('layouts.app')

@section('content')
    <div class="row">
        @include('users.card')
        
    <div class="col-sm-12">
        @include('users.navtab')
        </div>
    </div>
@endsection