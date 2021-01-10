@if (count($giving_users) > 0)
    @foreach ($giving_users as $giving_user)
    @foreach ($giving_user->anniversaries as $anniversary)
    @foreach ($anniversary->presents as $present)
    <section>
        <div class="d-flex justify-content-center align-items-center mb-6">
            <div>
                <ul class="list-unstyled">
                    <li class="media mb-3">
                        <div class="media-body">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th scope="col" colspan="2">投稿者</th>
                                        <th scope="col">名前</th>
                                        <th scope="col">関係性</th>
                                        <th scope="col">お祝い</th>
                                        <th scope="col">日程</th>
                                        <th scope="col">プレゼント</th>
                                        <th scope="col">あげた年</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th colspan="2">{!! (e($giving_user->user->name)) !!}</th>
                                        <td>{!! (e($giving_user->name)) !!}</td>
                                        <td>{!! (e($giving_user->relation)) !!}</td>
                                        <td>{!! (e($anniversary->anniversary)) !!}</td>
                                        <td>{!! (e($anniversary->day->format('n月j日') )) !!}</td>
                                        <td>{!! (e($present->present)) !!}</td>
                                        <td>{!! (e($present->year)) !!}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <img class="mr-2 rounded" src="{{ Gravatar::get($giving_user->user->email, ['size' => 50]) }}" alt="">
                                        </td>
                                        @if (Auth::id() == $giving_user->user_id)
                                            <td colspan="2">
                                                {{-- 削除ボタンのフォーム --}}
                                                {!! Form::open(['route' => ['giving_users.destroy', $giving_user->id], 'method' => 'delete']) !!}
                                                    {!! Form::submit('送りたい相手を消す', ['class' => 'btn btn-danger btn-sm']) !!}
                                                {!! Form::close() !!}
                                            </td>
                                            <td colspan="2">
                                                {!! Form::open(['route' => ['anniversaries.destroy', $anniversary->id], 'method' => 'delete']) !!}
                                                {!! Form::submit('お祝いを消す', ['class' => 'btn btn-danger btn-sm']) !!}
                                                {!! Form::close() !!}
                                            </td>
                                            <td colspan="2">
                                                {!! Form::open(['route' => ['presents.destroy', $present->id], 'method' => 'delete']) !!}
                                                {!! Form::submit('プレゼントを消す', ['class' => 'btn btn-danger btn-sm']) !!}
                                                {!! Form::close() !!}
                                            </td>
                                        @endif
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </li>
           
                </ul>
            </div>
    </div>
    </section>
    @endforeach
    @endforeach
    @endforeach
    {{-- ページネーションのリンク --}}
    {{ $giving_users->links() }}
@endif