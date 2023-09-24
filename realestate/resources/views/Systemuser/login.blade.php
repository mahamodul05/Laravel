<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
</head>
<body>

    <form method="post" action="{{ route('user.login')}}">
        @csrf
        @method('post')

        <div>
            <label>Username</label>
            <input type="text" id="username", name="username", placeholder="Username">
        </div>
        <div>
            <label>Password</label>
            <input type="text" id="password", name="password", placeholder="Password">
        </div>
        <div>
            <input type="submit" name="submit", value="Login">
        </div>
    </form>

</body>
</html>