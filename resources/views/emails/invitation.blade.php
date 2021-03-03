<p>Hi,</p>

<p>{{ $invite->user->email }} has invited you to access work together on EmpWik Platform.</p>

<a href="{{ route('accept', $invite->token) }}">Click here</a> to accept invitation.