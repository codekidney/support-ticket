@extends('layouts.app')

@section('title', __('tickets.my_tickets'))

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card card-default">
            <div class="card-header">
                <i class="fas fa-envelope-open-text"></i> {{ __('tickets.my_tickets') }}
                <a href="{{ url('new-ticket') }}" class="btn btn-primary btn-sm float-right">{{ __('tickets.open_new_ticket') }}</a>
            </div>

            <div class="card-body">
                @if($tickets->isEmpty())
                <p>{{ __('tickets.no_tickets') }}</p>
                @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>@sortablelink('priority', __('tickets.priority'))</th>
                            <th>@sortablelink('category_id', __('tickets.category'))</th>
                            <th>@sortablelink('title', __('tickets.title'))</th>
                            <th>@sortablelink('status', __('tickets.status'))</th>
                            <th>{{ __('tickets.last_updated') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tickets as $ticket)
                        <tr>
                            <td>
                                <div class="priority priority-{{ $ticket->priority }}"></div>
                            </td>
                            <td>
                                {{ $ticket->category->name }}
                            </td>
                            <td>
                                <a href="{{ url('tickets/' . $ticket->ticket_id) }}">
                                    #{{ $ticket->ticket_id }} - {{ $ticket->title }}
                                    <span class="badge badge-info badge-pill">{{ count($ticket->comments) }}</span>
                                </a>
                            </td>
                            <td>
                                @if($ticket->status == "Open")
                                <span class="badge badge-success">{{ $ticket->status }}</span>
                                @else
                                <span class="badge badge-danger">{{ $ticket->status }}</span>
                                @endif
                            </td>
                            <td>
                                @if ( count($ticket->comments) > 0)
                                    <small class="d-block">
                                    {{ $ticket->comments->last()->updated_at->diffForHumans() }}
                                    </small>
                                @else
                                    <small class="d-block">
                                    {{ $ticket->updated_at->diffForHumans() }}
                                    </small>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $tickets->appends(\Request::except('page'))->render() !!}

                @endif
            </div>
            <div class="card-footer">
                
            </div>
        </div>
    </div>
</div>

@endsection