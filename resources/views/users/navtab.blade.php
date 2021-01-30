<div class="col-sm-12">
    <ul class="nav nav-tabs nav-justified mb-3">
        {{-- いいね一覧タブ --}}
        <li class="nav-item">
            
        <button class="btn col-sm">{!! link_to_route('presnts.favorite_present', 'いいね一覧', ['id' => $user->id], ['class' => 'btn-full-green']) !!}</button>

        </li>
        {{-- giving_user一覧タブ --}}
        <li class="nav-item">
            
        <button class="btn col-sm">{!! link_to_route('users.giving_users', 'プレゼントをあげる人一覧', ['id' => $user->id], ['class' => 'btn-full-blue']) !!}</button>

        </li>
        {{-- anniversary一覧タブ --}}
        <li class="nav-item">
            
        <button class="btn col-sm">{!! link_to_route('users.anniversaries', 'お祝い一覧', ['id' => $user->id], ['class' => 'btn-full-pink']) !!}</button>

        </li>
        {{-- present覧タブ --}}
        <li class="nav-item">
            <button class="btn col-sm">{!! link_to_route('users.presents', 'プレゼント一覧', ['id' => $user->id], ['class' => 'btn-full-yellow']) !!}</button>
        </li>
    </ul>
</div>