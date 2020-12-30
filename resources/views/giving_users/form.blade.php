{!! Form::open(['route' => 'giving_users.store']) !!}
    <div class="form-group">
        名前：{!! Form::textarea('name', old('name'), ['class' => 'form-control', 'rows' => '1']) !!}
        関係性：{!! Form::textarea('relation', old('relation'), ['class' => 'form-control', 'rows' => '1']) !!}
        {!! Form::submit('Post', ['class' => 'btn btn-primary btn-block']) !!}
    </div>
{!! Form::close() !!}