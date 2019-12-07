@extends('layouts.app')
 
@section('title', $ticket->title)
 
@section('content')
 
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="card card-default">
            <div class="card-header">
                #{{ $ticket->ticket_id }} - {{ $ticket->title }}
            </div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="ticket-info">
                    <p>{{ $ticket->message }}</p>
                    <p>{{ __('tickets.category') }}: {{ $ticket->category->name }}</p>
                    <p>
                        @if ($ticket->status === 'Open')
                            {{ __('tickets.status') }}: <span class="badge badge-success">{{ $ticket->status }}</span>
                        @else
                            {{ __('tickets.status') }}: <span class="badge badge-danger">{{ $ticket->status }}</span>
                        @endif
                    </p>
                    <p>Created on: {{ $ticket->created_at->diffForHumans() }}</p>
                </div>

            </div>
        </div>

        <hr>
        @include('tickets.comments')

        <hr>
        @include('tickets.reply')
    </div>
</div>
 
@endsection