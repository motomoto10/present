@extends('layouts.app')

@section('content')
    <div class="center">
        <div class="text-center">
            @if (Auth::check())
                <h1>{!! (e($giving_user->user->name)) !!}から{!! (e($giving_user->name)) !!}へ贈った{!! (e($anniversary->anniversary)) !!}のお祝いの詳細です</h1>
                <img class="w-25" src="{{ asset('img/present.png') }}">
                
                <table class="table table-dark">
                                <thead>
                                    <tr>
                                        <th scope="col" colspan="2">投稿者</th>
                                        <th scope="col">名前</th>
                                        <th scope="col">関係性</th>
                                        <th scope="col">お祝い</th>
                                        <th scope="col">日程</th>
                                        <th scope="col">プレゼント</th>
                                        <th scope="col">あげた年</th>
                                        <th scope="col">アクション</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <tr>
                                    
                                        @foreach ($anniversary->presents as $present)
                                                        <tr>
                                                            <th>{!! (e($giving_user->user->name)) !!}</th>
                                                            <td>{!! link_to_route('anniversaries.show', '詳細', ['anniversary' => $anniversary->id,'id' => $giving_user->id]) !!}</td>
                                                            <td>{!! (e($giving_user->name)) !!}</td>
                                                            <td>{!! (e($giving_user->relation)) !!}</td>
                                                            <td>{!! (e($anniversary->anniversary)) !!}</td>
                                                            <td>{!! (e($anniversary->day->format('n月j日') )) !!}</td>
                                                            <td>{!! (e($present->present)) !!}</td>
                                                            <td>{!! (e($present->year)) !!}</td>
                                                            @if (Auth::id() == $giving_user->user_id)
                                                                <td>test2</td>
                                                            @else
                                                                <td>いいね</td>
                                                            @endif
                                                    @endforeach
                                            @if(count($anniversary->presents ) == 0)
                                            <tr>
                                                <th>{!! (e($giving_user->user->name)) !!}</th>
                                                <td>{!! link_to_route('anniversaries.show', '詳細', ['anniversary' => $anniversary->id,'id' => $giving_user->id]) !!}</td>
                                                <td>{!! (e($giving_user->name)) !!}</td>
                                                <td>{!! (e($giving_user->relation)) !!}</td>
                                                <td>{!! (e($anniversary->anniversary)) !!}</td>
                                                <td>{!! (e($anniversary->day->format('n月j日') )) !!}</td>
                                                <td colspan="2"><button class="btn btn-default col-sm">{!! link_to_route('presents.create', '登録', ['id' => $giving_user->id,'anniversary' => $anniversary->id], []) !!}</button></td>
                                                @if (Auth::id() == $giving_user->user_id)
                                                                <td>test2</td>
                                                            @else
                                                                <td>いいね</td>
                                                            @endif
                                            @endif
                                            
                                            
                                    </tr>
                                </tbody>
                </table>
            
            @else
            
            @endif
        </div>
    </div>
@endsection