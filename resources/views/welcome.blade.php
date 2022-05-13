<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'PickRight') }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div>
            <img src="{{asset("img/logo_pick_right.png")}}">
        </div>
        <div>
            <a href="">Home</a>
            <a href="">About Us</a>
        </div>
        <div>
            <a href="{{route('login')}}">Login</a>
            <a href="{{route('register')}}">Register</a>
        </div>
    </header>

    <main>
        <div class="container">
            <div class="card"></div>
            <div class="card"></div>
            <div class="card"></div>
            <div class="card"></div>
        </div>
    </main>
</body>
<style>
    * {
        padding: 0; margin: 0;
        list-style: none;
        text-decoration: none;
        box-sizing: border-box;
        font-family: 'Kanit', sans-serif;
    }

    body {
        min-height: 100vh;
    }
    header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin: 0px 10px;
        border-bottom: 1px rgb(119, 0, 155) solid;
    }

    div a {
        margin: 0px 10px;
    }

    img {
        height: 80px;
    }
</style>
</html>
