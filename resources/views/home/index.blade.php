<?php

if (session()->has('userInfo')) {

  $user=session()->get('userInfo');
}
else{

	return redirect('login');
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
</head>
<body>

	<p>This is home</p>
	{{userinfo}}

</body>
</html>