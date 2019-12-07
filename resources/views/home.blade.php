@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card card-default">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    <p>{{ __('home.logged_in') }} {{ App::getLocale() }}</p>
                    @if(Auth::user()->is_admin)
                        <p>
                            See all <a href="{{ url('admin/tickets') }}">tickets</a>
                        </p>
                    @else
                        <p>
                            See all your <a href="{{ url('my_tickets') }}">tickets</a> or <a href="{{ url('new-ticket') }}">{{ __('tickets.open_new_ticket') }}</a>
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
