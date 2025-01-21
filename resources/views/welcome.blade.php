<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Home Page</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }
    .header {
        background-color: #f2f2f2;
        padding: 10px;
        text-align: left;
    }
    .header a {
        margin-right: 20px;
        text-decoration: none;
        color: #333;
    }
    .content {
        margin-top: 50px;
        text-align: left;
        padding-left: 20px;
    }
    button {
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
</style>
</head>
<body>
    @if(auth()->check() )
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
@else
    <a href="{{ route('login') }}">Login</a>
    <a href="{{ route('register') }}">Register</a>
@endif

<div class="content">
    <h1>Welcome to the Home Page</h1>
</div>
</body>
</html>
