{{-- コメントのフォーム --}}
<div class="my-2">{!! link_to_route('comment.create', 'コメントする', ['id' => $present->id], ['class' => 'btn-full-pop']) !!}</div>