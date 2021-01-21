@if (count($users) > 0)
    <ul class="list-unstyled">
        @foreach ($users as $user)
            <li class="media">
                <div class="col-12 mb-3">
                    <div class="card">
                        <div class="row no-gutters">
                            <div class="col-3">
                                <img class="rounded img-fluid" src="/storage/profile_images/{{ $user->id }}.jpg"width="150px" height="150px" alt="">
                            </div>
                            <div class="col-9">
                                <div class="card-body">
                                    <h3 class="card-title">{{ $user->name }}</h3>
                                    <p>称号</p>
                                    <p>{{ $user->gender}}/{{ $user->born}}</p>
                                    <p>自己紹介:{{ $user->myself}}</p>
                                    <p>これまでに登録した人数{{ $user->giving_users->count() }}</p>
                                    <p>これまでに登録したお祝い数{{ $user->anniversaries->count()}}</p>
                                    <p>獲得したいいね数</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        @endforeach
    </ul
    {{-- ページネーションのリンク --}}
    {{ $users->links() }}
@endif