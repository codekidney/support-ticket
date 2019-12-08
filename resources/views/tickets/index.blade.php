@extends('layouts.app')

@section('title', __('tickets.all_tickets'))

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-default">
            <div class="card-header">
                <i class="fas fa-envelope-open-o"></i> {{ __('tickets.tickets') }}
            </div>

            <div class="card-body">
                @if ($tickets->isEmpty())
                <p>{{ __('tickets.tickets') }}</p>
                @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>@sortablelink('priority', __('tickets.priority'))</th>
                            <th>@sortablelink('category_id', __('tickets.category'))</th>
                            <th>@sortablelink('title', __('tickets.title'))</th>
                            <th>@sortablelink('status', __('tickets.status'))</th>
                            <th>@sortablelink('status', __('tickets.last_updated'))</th>
                            <th>{{ __('tickets.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tickets as $ticket)
                        <tr>
                            <td>
                                <div class="priority priority-{{ $ticket->priority }}"></div>
                            </td>
                            <td>
                                <span class="badge badge-info">{{ $ticket->category->name }}</span>
                            </td>
                            <td>
                                <a href="{{ url('tickets/'. $ticket->ticket_id) }}">
                                    #{{ $ticket->ticket_id }} - {{ $ticket->title }}
                                    <span class="badge badge-info badge-pill">{{ count($ticket->comments) }}</span>
                                </a>
                            </td>
                            <td>
                                @if ($ticket->status === 'Open')
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
                            <td>
                                @if($ticket->status === 'Open')
                                <a href="{{ url('tickets/' . $ticket->ticket_id) }}" class="btn btn-primary btn-sm mb-2">{{ __('tickets.reply') }}</a>

                                <form action="{{ url('admin/close_ticket/' . $ticket->ticket_id) }}" method="POST">
                                    {!! csrf_field() !!}
                                    <button type="submit" class="btn btn-danger btn-sm">{{ __('tickets.close_ticket') }}</button>
                                </form>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $tickets->appends(\Request::except('page'))->render() !!}

                {{ $tickets->render() }}
                @endif
            </div>
        </div>
    </div>
</div>
@endsection