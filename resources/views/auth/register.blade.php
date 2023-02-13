<!DOCTYPE html>
<html>
<head>
    <title> google.com</title>
    <meta charset = "utf-8">

    <link rel="stylesheet" href="{{asset('auth/register/sign up1.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
<div  align = "center" id = "form1">

    <fieldset class= "test">
        <legend align="left">Sign Up</legend>
        <div id ="div1">
           <a href="#"><img  style="height: 35px;" src="{{asset('assets/admin/images/logo/logo.png')}}" alt="avatar"></a>

        </div>
        <div>
            <form name="form" method="POST" action="{{route('register')}}" class="sign-up-form">
                @csrf
                <label for = "First Name">First Name</label><br>
                <input type = "text" name = "fname" placeholder = "FName" class = "teat" value="" id="in0" required><br>


                <label for = "Second Name">Second Name</label><br>
                <input type = "text" name = "lname" placeholder = "SName" class = "teat" value="" id="in1" align="center" required><br>


                <label for = "E_Mail">E-Mail</label><br>
                <input type = "email" name = "email" placeholder = "E-Mail" class = "teat" value="" id="in2" required><br>


                <label for = "password" >password</label><br>
                <input type="password" id="in4" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" class = "teat" placeholder = "Number" required>
                <br>


                <label for = "Retype Password" >Retype Password</label><br>
                <input type = "password" name = "password_confirmation" placeholder = "password" min= "8" class = "teat" value="" id="in5"><br>
                <input type="submit" name="submit" value="Submit" class="submit" id="submit">

                 </form>

            <a href="https://www.gmail.com" target="_blank"><input type = "button" name ="google" id = "google" value=" Google"></a>
            <a href="https://www.facebook.com" target="_blank"><input type = "button" name ="facebook" id = "facebook" value=" Facebook"></a>
            <a href="https://www.twitter.com" target="_blank"><input type = "button" name ="twitter" id = "twitter" value=" Twitter"></a>
        </div>

    </fieldset>
    <div id="message">
        <h3>Password must contain the following:</h3>
        <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
        <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
        <p id="number" class="invalid">A <b>number</b></p>
        <p id="length" class="invalid">Minimum <b>8 characters</b></p>
    </div>

</div>
<script src="{{asset('auth/register/Sign Up.js')}}"></script>
</body>
</html>