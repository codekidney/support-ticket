@extends('layouts.app')

@section('title', __('tickets.open_new_ticket'))

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card card-default">
            <div class="card-header">{{ __('tickets.open_new_ticket') }}</div>

            <div class="card-body">


                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif

                <form class="form-horizontal" role="form" method="POST">
                    {!! csrf_field() !!}

                    <div class="form-row">
                        <div class="form-group col{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="control-label">{{ __('tickets.title') }}</label>
                            <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}">
                            @if ($errors->has('title'))
                            <span class="help-block">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group col{{ $errors->has('category') ? ' has-error' : '' }}">
                            <label for="category" class="control-label">{{ __('tickets.category') }}</label>
                            <select id="category" type="category" class="form-control" name="category">
                                <option value="">{{ __('tickets.select_category') }}</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('category'))
                            <span class="help-block">
                                <strong>{{ $errors->first('category') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col{{ $errors->has('message') ? ' has-error' : '' }}">
                            <label for="message" class="control-label">{{ __('tickets.message') }}</label>
                            <textarea rows="10" id="message" class="form-control" name="message"></textarea>
                            @if ($errors->has('message'))
                            <span class="help-block">
                                <strong>{{ $errors->first('message') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group col{{ $errors->has('priority') ? ' has-error' : '' }}">
                            <label for="priority" class="control-label">{{ __('tickets.priority') }}</label>
                            <select id="priority" type="" class="form-control" name="priority">
                                <option value="">{{ __('tickets.select_priority') }}</option>
                                <option value="low">{{ __('tickets.priority_low') }}</option>
                                <option value="medium">{{ __('tickets.priority_medium') }}</option>
                                <option value="high">{{ __('tickets.priority_high') }}</option>
                            </select>
                            @if ($errors->has('priority'))
                            <span class="help-block">
                                <strong>{{ $errors->first('priority') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    
                    <!-- Upload File -->
                    <input id="uploaded_files" type="hidden" class="form-control" name="uploaded_files" class="form-control">  

                    <div class="form-row">
                        <div class="form-group col-12">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-envelope-o"></i> {{ __('tickets.send') }}
                            </button>
                        </div>
                    </div>
                </form>
                
                @include('partials.ajax_file_upload', ['_upl_elem' => '#uploaded_files'])
                
            </div>
        </div>
    </div>
</div>

@endsection