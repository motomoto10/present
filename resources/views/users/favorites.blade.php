@extends('layouts.app')

@section('content')
    <div class="row">
        @include('users.card')
        @include('users.navtab')
    </div>
    <div class="col-sm-12">
    <h1>あなたのいいね一覧</h1>
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
                                                    @foreach ($presents as $present)
                                                        <tr>
                                                            <th>{!! (e($present->anniversary->giving_user->user->name)) !!}</th>
                                                            <td>{!! link_to_route('giving_users.show', '詳細', ['giving_user' => $present->anniversary->giving_user->id]) !!}</td>
                                                            <td>{!! (e($present->anniversary->giving_user->name)) !!}</td>
                                                            <td>{!! (e($present->anniversary->giving_user->relation)) !!}</td>
                                                            <td>{!! (e($present->anniversary->anniversary)) !!}</td>
                                                            <td>{!! (e($present->anniversary->day->format('n月j日') )) !!}</td>
                                                            <td>{!! (e($present->present)) !!}</td>
                                                            <td>{!! (e($present->year)) !!}</td>
                                                            @if (Auth::id() == $present->anniversary->giving_user->user_id)
                                                                <td>test2</td>
                                                            @else
                                                            <td>いいねの数{{ $present->comment->count() }}</td>
                                                            <td><button class="btn btn-default col-sm">{!! link_to_route('comment.create', 'コメント', ['id' => $present->id], ['class' => 'nav-link']) !!}</button></td>
                                                            @endif
                                                    @endforeach
                                        </tr>
                                       
                                </tbody>
                            </table>
                                <div>{{ $presents->links() }}</div>
    </div>
@endsection