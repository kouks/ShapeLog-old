<!DOCTYPE html>
<html>
    <head>
        <title>Ebchod | Login</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link href="/css/glob.css" rel="stylesheet" type="text/css">

    </head>
    <body class="login-screen">
        <form method="post" class="login" action="">
            <div class="area">
                <h5 class="center dark-grey-text">Admin login</h5>
                <hr />
                {!! csrf_field() !!}
                <input placeholder="Email" type="email" name="email" value="{{ old('email') }}">
                <input placeholder="Heslo" type="password" name="password" id="password">
                <hr />
                <label for="remember">Remember Me</label>
                <input type="checkbox" name="remember" id="remember"> 
                <hr />
                <button type="submit" class="btn">Login</button>
            </div>
        </form>
    </body>
</html>