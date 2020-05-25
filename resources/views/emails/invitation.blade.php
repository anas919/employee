<p>Hi,</p>

<p>{{ $invite->user->email }} has invited you to access work together on [Here projects].</p>

<a href="{{ route('accept', $invite->token) }}">Click here</a> to accept invitation.