@if (count($users) > 0)
    <div class="row">
        @foreach ($users as $user)
                <div class="col-6 mb-3">
                    <div class="boxmi4">
                        <div class="row no-gutters">
                            <div class="col-3">
                                <img class="rounded img-fluid" src="/storage/profile_images/{{ $user->id }}.jpg"width="100px" height="100px" alt="">
                            </div>
                            <div class="col-9">
                                <div>
                                    <h3>{{ $user->name }}</h3>
                                    <p>称号</p>
                                    <p>{{ $user->gender}}　{{ $user->born}}</p>
                                    <p>自己紹介:{{ $user->myself}}</p>
                                    <p>これまでに登録した人数{{ $user->giving_users->count() }}</p>
                                    <p>これまでに登録したお祝い数{{ $user->anniversaries->count()}}</p>
                                    <p>獲得したいいね数{{ $user->favorite_users->count()}}</p>
                                    {!! link_to_route('users.show', 'ユーザーの詳細へ', ['user' => $user->id]) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        @endforeach
    </div>
    {{-- ページネーションのリンク --}}
    {{ $users->links() }}
@endif