@extends('layouts.app')

@section('title', __('tickets.my_tickets'))

@section('content')

<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-ticket"> {{ __('tickets.my_tickets') }}</i>
            </div>

            <div class="panel-body">
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
                                <span class="label label-success">{{ $ticket->status }}</span>
                                @else
                                <span class="label label-danger">{{ $ticket->status }}</span>
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
        </div>
    </div>
</div>

@endsection