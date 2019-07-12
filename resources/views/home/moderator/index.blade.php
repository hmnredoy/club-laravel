<!DOCTYPE html>
<html>
<head>
	<title>Moderator</title>
</head>
<body>

	Welcome moderator!
	Hello {{ Session::get('userInfo')->name }}
	<a href="{{route('logout')}}">Logout</a>

</body>
</html>