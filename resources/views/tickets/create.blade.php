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

                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                        <label for="title" class="col-md-4 control-label">{{ __('tickets.title') }}</label>

                        <div class="col-md-6">
                            <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}">

                            @if ($errors->has('title'))
                            <span class="help-block">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                        <label for="category" class="col-md-4 control-label">{{ __('tickets.category') }}</label>

                        <div class="col-md-6">
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

                    <div class="form-group{{ $errors->has('priority') ? ' has-error' : '' }}">
                        <label for="priority" class="col-md-4 control-label">{{ __('tickets.priority') }}</label>

                        <div class="col-md-6">
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

                    <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                        <label for="message" class="col-md-4 control-label">{{ __('tickets.message') }}</label>

                        <div class="col-md-6">
                            <textarea rows="10" id="message" class="form-control" name="message"></textarea>

                            @if ($errors->has('message'))
                            <span class="help-block">
                                <strong>{{ $errors->first('message') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-envelope-o"></i> {{ __('tickets.send') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection