{{-- コメントのフォーム --}}
{!! Form::open(['route' => ['comment.create', $present->id]]) !!}
    {!! Form::submit('コメントする', ['class' => "btn btn-light btn-sm"]) !!}
{!! Form::close() !!}