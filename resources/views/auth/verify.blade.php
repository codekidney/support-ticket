@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('users.verify_email') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('users.verify_link_sent') }}
                    </div>
                    @endif

                    {{ __('users.before_verify') }}
                    {{ __('users.if_didnt_receive') }}, <a href="{{ route('verification.resend') }}">{{ __('users.request_link') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection