<div class="col-sm-12">
    <div class ="row">
        {{-- いいね一覧タブ --}}
            
        <div class="col-sm-3 my-2 text-center">{!! link_to_route('presnts.favorite_present', 'いいね一覧', ['id' => $user->id], ['class' => 'btn-full-green']) !!}</div>

        {{-- giving_user一覧タブ --}}
            
        <div class="col-sm-3 my-2 text-center">{!! link_to_route('users.giving_users', 'プレゼントをあげる人一覧', ['id' => $user->id], ['class' => 'btn-full-blue']) !!}</div>

        {{-- anniversary一覧タブ --}}
            
        <div class="col-sm-3 my-2 text-center">{!! link_to_route('users.anniversaries', 'お祝い一覧', ['id' => $user->id], ['class' => 'btn-full-pink']) !!}</div>

        {{-- present覧タブ --}}
        <div class="col-sm-3 my-2 text-center">{!! link_to_route('users.presents', 'プレゼント一覧', ['id' => $user->id], ['class' => 'btn-full-yellow']) !!}</div>
    </div>
</div>