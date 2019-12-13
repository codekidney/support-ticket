<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Support Ticket</title>
</head>
<body>
<p>
    {{ $comment->comment }}
</p>
 
---
<p>{{ __('tickets.replied_by') }}: {{ $user->name }}</p>
 
<p>{{ __('tickets.title') }}: {{ $ticket->title }}</p>
<p>ID: {{ $ticket->ticket_id }}</p>
<p>{{ __('tickets.status') }}: {{ $ticket->status }}</p>
 
<p>
    {{ __('tickets.you_can_view') }} {{ url('tickets/'. $ticket->ticket_id) }}
</p>
 
</body>
</html>