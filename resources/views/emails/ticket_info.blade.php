<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Suppor Ticket</title>
    </head>
    <body>
        <p>
            {{ __('tickets.ticket_opened', ['username' => ucfirst($user->name)]) }}:
        </p>
        <p>{{ __('tickets.title') }}: {{ $ticket->title }}</p>
        <p>{{ __('tickets.priority') }}: {{ $ticket->priority }}</p>
        <p>{{ __('tickets.status') }}: {{ $ticket->status }}</p>
        <p>
            {{ __('tickets.you_can_view') }} {{ url('tickets/'. $ticket->ticket_id) }}
        </p>
    </body>
</html>