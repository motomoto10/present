@if (count($giving_users) > 0)
    <ul class="list-unstyled">
        @foreach ($giving_users as $giving_user)
            <li class="media mb-3">
                {{-- 投稿の所有者のメールアドレスをもとにGravatarを取得して表示 --}}
                <img class="mr-2 rounded" src="{{ Gravatar::get($giving_user->user->email, ['size' => 50]) }}" alt="">
                <div class="media-body">
                    <div>
                        {{-- 投稿の所有者のユーザ詳細ページへのリンク --}}
                        {!! link_to_route('users.show', $giving_user->user->name, ['user' => $giving_user->user->id]) !!}
                        <span class="text-muted">posted at {{ $giving_user->created_at }}</span>
                    </div>
                    <div>
                        {{-- 投稿内容 --}}
                        <p class="mb-0">名前：{!! nl2br(e($giving_user->name)) !!}</p>
                        <p class="mb-0">関係性：{!! nl2br(e($giving_user->relation)) !!}</p>
                            @foreach ($giving_user->anniversaries as $anniversary)
                        <p class="mb-0">お祝い：{!! nl2br(e($anniversary->anniversary)) !!}</p>
                        <p class="mb-0">日程：{!! nl2br(e($anniversary->day->format('n月j日') )) !!}</p>
                            <div>
                            @if (Auth::id() == $giving_user->user_id)
                                <button class="btn btn-default btn-sm">{!! link_to_route('presents.create', 'プレゼントを登録する', ['id' => $anniversary->id], []) !!}</button>
                                {{-- 投稿削除ボタンのフォーム --}}
                                 @foreach ($anniversary->presents as $present)
                                <p class="mb-0">プレゼント：{!! nl2br(e($present->present)) !!}</p>
                                <p class="mb-0">あげた年：{!! nl2br(e($present->year)) !!}</p>
                                {!! Form::open(['route' => ['presents.destroy', $present->id], 'method' => 'delete']) !!}
                                    {!! Form::submit('プレゼントを消す', ['class' => 'btn btn-danger btn-sm']) !!}
                                {!! Form::close() !!}
                                @endforeach
                            @endif
                            </div>
                        {!! Form::open(['route' => ['anniversaries.destroy', $anniversary->id], 'method' => 'delete']) !!}
                                {!! Form::submit('お祝いを消す', ['class' => 'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}
                            @endforeach
                    </div>

                    <div>
                        @if (Auth::id() == $giving_user->user_id)
                            <button class="btn btn-default btn-sm">{!! link_to_route('anniversaries.create', 'お祝いを登録する', ['id' => $giving_user->id], []) !!}</button>
                            {{-- 投稿削除ボタンのフォーム --}}
                            
                            {!! Form::open(['route' => ['giving_users.destroy', $giving_user->id], 'method' => 'delete']) !!}
                                {!! Form::submit('送りたい相手を消す', ['class' => 'btn btn-danger btn-sm']) !!}
                            {!! Form::close() !!}
                        @endif
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
    {{-- ページネーションのリンク --}}
    {{ $giving_users->links() }}
@endif