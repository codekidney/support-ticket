@extends('layouts.app')

@section('title', __('tickets.my_tickets'))

@section('content')

<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="card card-default">
            <div class="card-header">
                <i class="fas fa-envelope-open-text"></i> {{ __('tickets.my_tickets') }}
                <a href="{{ url('new-ticket') }}" class="btn btn-primary float-right">{{ __('tickets.open_new_ticket') }}</a>
            </div>

            <div class="card-body">
                @if($tickets->isEmpty())
                <p>{{ __('tickets.no_tickets') }}</p>
                @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>{{ __('tickets.category') }}</th>
                            <th>{{ __('tickets.title') }}</th>
                            <th>{{ __('tickets.status') }}</th>
                            <th>{{ __('tickets.last_updated') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tickets as $ticket)
                        <tr>
                            <td>
                                {{ $ticket->category->name }}
                            </td>
                            <td>
                                <a href="{{ url('tickets/' . $ticket->ticket_id) }}">
                                    #{{ $ticket->ticket_id }} - {{ $ticket->title }}
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
                                {{ $ticket->updated_at }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $tickets->render() }}
                @endif
            </div>
            <div class="card-footer">
                
            </div>
        </div>
    </div>
</div>

@endsection