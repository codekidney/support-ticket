<form action="{{ route('ajaxFileUpload') }}" enctype="multipart/form-data" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="_upl_elem" value="{{ $_upl_elem }}">
    <div class="alert alert-danger print-error-msg" role="alert" style="display:none">
        <ul></ul>
    </div>
    <div class="form-group">
        <div class="card file-list mb-2" style="display:none">
            <div class="card-header">{{ __('files.attachments') }}</div>
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