<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>
    <legend>Register</legend>
    <form action="{{ url('register') }}" method="post">
        {{ csrf_field() }}
        <table>

            <tr>
                <th><label for="">FirstName:</label></th>
                <th><input type="text" name="firstname"></th>


            </tr>

            <tr>
                <th><label for="">LastName:</label></th>
                <th><input type="text" name="lastname"></th>

            </tr>
            <br>
            <tr>
                <th><label for="">Email:</label></th>
                <th><input type="text" name="email"></th>

            </tr>

            <tr>
                <th><label for="">Password:</label></th>
                <th><input type="password" name="password"></th>

            </tr>

            <tr>
                <th><label for="">Confirm Password:</label></th>
                <th><input type="password" name="confirmpassword"></th>
            </tr>

        </table>

        <button type="submit">Register</button>
    </form>
</body>
</html>