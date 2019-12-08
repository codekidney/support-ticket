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
                
                <form action="{{ route('ajaxFileUpload') }}" enctype="multipart/form-data" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_upl_elem" value="#uploaded_files">
                    <div class="alert alert-danger print-error-msg" role="alert" style="display:none">
                        <ul></ul>
                    </div>
                    <div class="form-group">
                        <div class="card file-list mb-2" style="display:none">
                            <div class="card-header">{{ __('files.') }}</div>
                            <div class="card-body">
                                <ol class="my-0"></ol>
                            </div>
                        </div>
                        <div class="loading mb-2" style="display:none">
                            <div class="fa-3x">
                                <i class="fas fa-spinner fa-pulse"></i>
                            </div>
                        </div>
                        <span class="btn btn-success btn-file">
                            {{ __('files.upload_image') }} <input id="ajax_file_upload_input" type="file" name="image" class="form-control mb-1">
                        </span>
                    </div>
                </form>
                
            </div>
        </div>
</div>