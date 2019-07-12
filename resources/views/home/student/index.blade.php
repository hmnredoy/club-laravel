<!DOCTYPE html>
<html>
<head>
	<title>Student</title>
</head>
<body>

	Welcome student!
	Hello {{ Session::get('userInfo')->name }}
	<a href="{{route('logout')}}">Logout</a>

</body>
</html>