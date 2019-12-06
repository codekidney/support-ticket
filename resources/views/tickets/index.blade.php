@extends('layouts.app')

@section('title', __('tickets.all_tickets'))

@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-ticket"> {{ __('tickets.tickets') }}</i>
            </div>

            <div class="panel-body">
                @if ($tickets->isEmpty())
                <p>{{ __('tickets.tickets') }}</p>
                @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>{{ __('tickets.category') }}</th>
                            <th>{{ __('tickets.title') }}</th>
                            <th>{{ __('tickets.status') }}</th>
                            <th>{{ __('tickets.last_updated') }}</th>
                            <th style="text-align:center" colspan="2">{{ __('tickets.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tickets as $ticket)
                        <tr>
                            <td>
                                {{ $ticket->category->name }}
                            </td>
                            <td>
                                <a href="{{ url('tickets/'. $ticket->ticket_id) }}">
                                    #{{ $ticket->ticket_id }} - {{ $ticket->title }}
                                </a>
                            </td>
                            <td>
                                @if ($ticket->status === 'Open')
                                <span class="label label-success">{{ $ticket->status }}</span>
                                @else
                                <span class="label label-danger">{{ $ticket->status }}</span>
                                @endif
                            </td>
                            <td>{{ $ticket->updated_at }}</td>
                            <td>
                                @if($ticket->status === 'Open')
                                <a href="{{ url('tickets/' . $ticket->ticket_id) }}" class="btn btn-primary">Reply</a>

                                <form action="{{ url('admin/close_ticket/' . $ticket->ticket_id) }}" method="POST">
                                    {!! csrf_field() !!}
                                    <button type="submit" class="btn btn-danger">{{ __('tickets.close_ticket') }}</button>
                                </form>
                                @endif
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