<div class="col-sm-12">
    <ul class="nav nav-tabs nav-justified mb-3">
        {{-- いいね一覧タブ --}}
        <li class="nav-item">
            <a href="{{ route('presnts.favorite_present', ['id' => $user->id]) }}" class="nav-link">
                いいね一覧
                <span class="badge badge-secondary"></span>
            </a>
        </li>
        {{-- giving_user一覧タブ --}}
        <li class="nav-item">
            <a href="{{ route('users.giving_users', ['id' => $user->id]) }}" class="nav-link">
                プレゼントをあげる人一覧
                <span class="badge badge-secondary">{{ $user->giving_user }}</span>
            </a>
        </li>
        {{-- anniversary一覧タブ --}}
        <li class="nav-item">
            <a href="{{ route('users.anniversaries', ['id' => $user->id]) }}" class="nav-link">
                お祝い一覧
                <span class="badge badge-secondary"></span>
            </a>
        </li>
        {{-- present覧タブ --}}
        <li class="nav-item">
            <a href="{{ route('users.presents', ['id' => $user->id]) }}" class="nav-link">
                プレゼント一覧
                <span class="badge badge-secondary"></span>
            </a>
        </li>
    </ul>
</div>