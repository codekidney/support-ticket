<div class="card card-default">
    <div class="card-header">{{ __('tickets.add_reply') }}</div>
 
        <div class="card-body">
            <div class="comment-form">
 
                <form action="{{ url('comment') }}" method="POST" class="form">
                    {!! csrf_field() !!}
 
                    <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
 
                    <div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
                        <textarea rows="10" id="comment" class="form-control" name="comment"></textarea>
 
                        @if ($errors->has('comment'))
                            <span class="help-block">
                               <strong>{{ $errors->first('comment') }}</strong>
                            </span>
                        @endif
                    </div>
                    
                    <!-- Upload File -->
                    <input id="uploaded_files" type="hidden" class="form-control" name="uploaded_files" class="form-control">   
 
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">{{ __('tickets.send') }}</button>
                    </div>
                </form>
                
                @include('partials.ajax_file_upload', ['_upl_elem' => '#uploaded_files'])
                
            </div>
        </div>
</div>