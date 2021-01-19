<ul class="nav nav-tabs nav-justified mb-3">
    {{-- いいね一覧タブ --}}
    <li class="nav-item">
        <a href="{{ route('users.show', ['user' => $user->id]) }}" class="nav-link {{ Request::routeIs('users.show') ? 'active' : '' }}">
            TimeLine
            <span class="badge badge-secondary">{{ $user->microposts_count }}</span>
        </a>
    </li>
    {{-- giving_user一覧タブ --}}
    <li class="nav-item">
        <a href="{{ route('users.followings', ['id' => $user->id]) }}" class="nav-link {{ Request::routeIs('users.followings') ? 'active' : '' }}">
            Followings
            <span class="badge badge-secondary">{{ $user->followings_count }}</span>
        </a>
    </li>
    {{-- anniversary一覧タブ --}}
    <li class="nav-item">
        <a href="{{ route('users.followers', ['id' => $user->id]) }}" class="nav-link {{ Request::routeIs('users.followers') ? 'active' : '' }}">
            Followers
            <span class="badge badge-secondary">{{ $user->followers_count }}</span>
        </a>
    </li>
    {{-- present覧タブ --}}
    <li class="nav-item">
        <a href="{{ route('microposts.favorite_post', ['id' => $user->id]) }}" class="nav-link {{ Request::routeIs('microposts.favorite_post') ? 'active' : '' }}">
            お気に入り
            <span class="badge badge-secondary">{{ $user->favorites_count }}</span>
        </a>
    </li>
</ul>