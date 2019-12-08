@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card card-default">
                <div class="card-header">{{ __('home.logged_in') }}</div>
                <div class="card-body">
                    @if(Auth::user()->is_admin)
                        <p>
                            <a class="btn btn-primary" href="{{ url('admin/tickets') }}">{{ __('tickets.tickets') }}tickets</a>
                        </p>
                    @else
                        <p>
                            <a class="btn btn-secondary" href="{{ url('my_tickets') }}">{{ __('tickets.my_tickets') }}</a>
                        </p>
                        <p>
                            <a class="btn btn-primary" href="{{ url('new-ticket') }}">{{ __('tickets.open_new_ticket') }}</a>
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
