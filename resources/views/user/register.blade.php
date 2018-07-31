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
<style>
    button
    {
        text-align: center;
        background-color: #00b3ee;
        width: 80px;
        height: 40px;
    }
    h3
    {
        color: #cc0000;
    }
</style>
</head>

<body>

<div  class="col-md-6 col-md-offset-3">
    <h3 style="text-align: center">Register</h3>
    <form action="{{ url('register') }}" method="post">
        {{ csrf_field()}}
        <div class="form-group">
            <label for="">FirstName</label>
            <input type="text" class="form-control" id="firstname"  name="firstname" ">

        </div>

        <div class="form-group">
            <label for="">LastName</label>
            <input type="text" class="form-control" id="lastname" name="lastname"">
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="text" class="form-control" id="email" name="email"">
            @if($errors->has('email'))
                <p style="color:red">{{$errors->first('email')}}</p>
            @endif
        </div>
        <div class="form-group">
            <label for="">Password</label>
            <input type="password" class="form-control"  id="password" name="password"">
            @if($errors->has('password'))
                <p style="color:red">{{$errors->first('password')}}</p>
            @endif
        </div>
        <div class="form-group">
            <label for="">Confirm Password</label>
            <input type="password" class="form-control" id="confirmpassword" name="confirmpassword"">
        </div>
        <button type="submit">Register</button>
    </form>
</div>

</body>
</html>