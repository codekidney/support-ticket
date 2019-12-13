<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Suppor Ticket Status</title>
</head>
<body>
    <p>
        {{ __('users.hello') }} {{ ucfirst($ticketOwner->name) }},
    </p>
    <p>
        {{ __('tickets.ticket_resolved', ['ticket_id' => $ticket->ticket_id]) }}
    </p>
</body>
</html>