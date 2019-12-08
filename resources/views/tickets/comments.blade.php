<div class="comments">
    @foreach($ticket->comments as $comment)
        <a name="comment-{{ $comment->id }}"></a>
        <div class="card border-@if($ticket->user->id === $comment->user_id){{"default"}}@else{{"primary"}}@endif mb-3">
            <div class="card-header">
                <a href="{{ url('tickets/'.$ticket->ticket_id.'/#comment-'.$comment->id ) }}">{{ $comment->user->name }}</a>
 
                <span class="pull-right">{{ $comment->created_at->format('Y-m-d') }}</span>
            </div>
 
            <div class="card-body">
                {{ $comment->comment }}
            </div>
            <div class="card-footer">
                @foreach ($comment->files as $file)
                <a class="btn btn-primary btn-sm" download href="{{ url('/files/', $file->file_name)}}"><i class="fas fa-download"></i> {{ $file->file_label }}</a>
                @endforeach
            </div>
        </div>
    @endforeach
</div>