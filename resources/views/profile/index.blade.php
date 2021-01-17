@extends('layouts.app')

@section('content')
    <div class="center">
        <div class="text-center">
            @if (Auth::check())
                <h1>画像の変更</h1>
                <img class="w-25" src="{{ asset('img/present.png') }}">
                
                @if ($is_image)
                <figure>
                    <img src="/storage/profile_images/{{ Auth::id() }}.jpg" width="100px" height="100px">
                    <figcaption>現在のプロフィール画像</figcaption>
                </figure>
                @endif
                
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                <form method="POST" action="/profile" enctype="multipart/form-data" >
                    {{ csrf_field() }}
                    <input type="file" name="photo">
                    <input type="submit">
                </form>
                
            @else
            
            @endif
        </div>
    </div>
@endsection