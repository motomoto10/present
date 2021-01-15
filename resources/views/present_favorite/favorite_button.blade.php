    @if (Auth::user()->is_favorites($present->id))
        {{-- 取り消しボタンのフォーム --}}
        {!! Form::open(['route' => ['preesnts.unfavorite', $present->id], 'method' => 'delete']) !!}
            {!! Form::submit('いいねを取り消す', ['class' => "btn btn-success btn-sm"]) !!}
        {!! Form::close() !!}
    @else
        {{-- お気に入りボタンのフォーム --}}
        {!! Form::open(['route' => ['presents.favorite', $present->id]]) !!}
            {!! Form::submit('いいね', ['class' => "btn btn-light btn-sm"]) !!}
        {!! Form::close() !!}
    @endif