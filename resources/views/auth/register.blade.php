<!DOCTYPE html>
<html>
    <head>
        <title>Ebchod | Register</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link href="/css/glob.css" rel="stylesheet" type="text/css">

    </head>
    <body class="login-screen">
        <form class="login" method="post" action="">
            <div class="area">
                <h5 class="center dark-grey-text">Admin register</h5>
                <hr />
                {!! csrf_field() !!}
                <input placeholder="Nick" type="text" name="name" value="{{ old('name') }}">
                <input placeholder="Email" type="email" name="email" value="{{ old('email') }}">
                <input placeholder="Heslo" type="password" name="password">
                <input placeholder="Znovu heslo" type="password" name="password_confirmation">
                <hr />
                <button type="submit" class="orange">Register</button>
            </div>
        </form>
    </body>
</html>