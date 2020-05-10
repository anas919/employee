<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<form class="" action="{{ route('redirecttoLogin') }}" method="post">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			Email : <input type="email" name="email" value="">
			<button type="submit" name="button">GO</button>
		</form>
	</body>
</html>
