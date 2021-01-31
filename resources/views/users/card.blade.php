<div class="col-sm-10 mx-auto mb-3">
    <div class="box25">
        <div class="row no-gutters">
            <div class="col-sm-3 col-img">
                <img class="rounded img-fluid" src="/storage/profile_images/{{ $user->id }}.jpg"width="150px" height="150px" alt="">
                @if (Auth::id() == $user->id)
                <button class="btn btn-default col-sm">{!! link_to_route('profile.index', '画像を変更する', [],['class' => 'btn-flat-dashed-border']) !!}</button>
                @endif
            </div>
            <div class="col-sm-9">
                <div>
                    <h3>{{ $user->name }}</h3>
                    @if (Auth::id() == $user->id)
                        {!! link_to_route('users.edit', 'プロフィールを変更する', ['user' => $user->id],['class' => 'btn-flat-dashed-border']) !!}
                    @endif
                    <p>{{ $user->gender}}/{{ $user->born}}</p>
                    <p>自己紹介:{{ $user->myself}}</p>
                    <p>これまでに登録した人数{{ $user->giving_users->count() }}</p>
                    <p>これまでに登録したお祝い数{{ $user->anniversaries->count()}}</p>
                    <p>これまでに登録したプレゼント数</p>
                    <p>獲得したいいね数{{ $user->favorite_users->count()}}</p>
                </div>
            </div>
        </div>
    </div>
</div>