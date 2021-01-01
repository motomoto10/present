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
                    </div>
                    <div>
                        @if (Auth::id() == $giving_user->user_id)
                            <button class="btn btn-default btn-sm">{!! link_to_route('anniversaries.get', 'お祝いを登録する', [], []) !!}</button>
                            {{-- 投稿削除ボタンのフォーム --}}
                            {!! Form::open(['route' => ['giving_users.destroy', $giving_user->id], 'method' => 'delete']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
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