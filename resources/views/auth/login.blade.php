<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title>LogIn</title>
    <link rel="stylesheet" href="{{asset('auth/login/style1.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    </style>
</head>
<body >

<div id="login-box" data-vide-bg="myvideo.mp4">
    <div class="left-box" data-vide-bg="myvideo.mp4">
        <h1>Log In</h1>
        @include('alerts.success')
        @include('alerts.sweet_alert')
        @include('alerts.error')
        <form name="form" action="{{route('login')}}" method="POST">
            @csrf
            <input type="text" name="email" placeholder="email">
            @error('email')
            <span style="color: red;font-size: 12px " class="text-danger">{{$message}}</span>
            @enderror
            <input type="password" name="password" placeholder="Password">
            @error('password')
            <span style="color: red;font-size: 12px" class="text-danger">{{$message}}</span>
            @enderror
            <input type="checkbox" onclick="myFunction()"><p style="font-size: 15px;display: inline;margin-right: 0; ">Show Password</p>
            <input type="submit"  value="Log in" >

        </form>
        <br>
        <div>
            <a  href="{{url('register_page')}}"class="link1">Register</a>
        </div>
    </div>
    <div class="right-box">
        <span class="social">Log In With:<br></span><br>
        <button class="facebook"><i class="fa fa-facebook-square" style="margin: 5px;"></i><a class="aa" href="https://www.facebook.com" target="_blank">Login With Facebook</a></button>
        <button class="twitter"><a class="aa" href="https://www.twitter.com" target="_blank"><i class="fa fa-twitter" style=" margin: 5px;"></i>Login With Twitter</a></button>
        <button class="google"><i class="fa fa-google-plus-square" style="margin: 5px;"></i><a class="aa" href="https://www.gmail.com" target="_blank">Login With Google </a></button>
    </div>

</div>
<script src="{{asset('auth/login/logIn.js')}}"></script>
</body>
</html>
