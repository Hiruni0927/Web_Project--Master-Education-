<?php

session_start();

include('db.php');


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $Email = $_POST['email'];
    $Password = $_POST['password'];

    if (!empty($Email) && !empty($Password) && !is_numeric($Email)) {

        $query = "SELECT * FROM signup WHERE Email='$Email' LIMIT 1";

        $result = mysqli_query($conn, $query);

        if ($result) {
            if ($result && mysqli_num_rows($result) > 0) {

                $user_data = mysqli_fetch_assoc($result);
                if ($user_data['password'] == $Password) {
                    echo "<script>alert('Logging Successfully...!')</script>";
                    echo "<meta http-equiv='refresh' content='0;url=profile.php?email=perera@gmail.com'>";
                    die;
                }
            }
            echo "<script type='text/javascript'> alert('Wrong user name or password 1 !')</script>";
        } else {
            echo "<script type='text/javascript'> alert('Wrong user name or password 2 !')</script>";
        }
    }
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            width: 100%;
            height: 100%;
            justify-content: center;
            align-items: center;
            letter-spacing: 1px;
            background: radial-gradient(circle, rgba(195, 34, 113, 0.4907212885154062) 0%, rgba(253, 181, 45, 0.7540266106442577) 100%);
        }


        nav {
            background-color: #222;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
        }

        .logo {
            font-size: 24px;
            color: #fff;
            flex-grow: 1;
            text-align: left;
            color: #dee10c;
        }

        .menu-icon {
            font-size: 24px;
            cursor: pointer;
            display: none;
        }

        .menu {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        .menu li {
            margin-right: 20px;
        }

        .menu li a {
            color: #fff;
            text-decoration: none;
            transition: color 0.3s;
        }

        .menu li a:hover {
            color: #ff6600;
        }

        .login_form_container {
            position: relative;
            width: 400px;
            height: 550px;
            max-width: 400px;
            max-height: 520px;
            background: #0c73ea;
            border-radius: 50px 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            margin-left: 600px;
            margin-top: 41px;
        }


        .login_form {
            position: absolute;
            content: '';
            background-color: white;
            border-radius: 50px 10px;
            inset: 5px;
            padding: 50px 40px;
            z-index: 10;
            color: #1e21f7;

        }

        h2 {
            font-size: 40px;
            font-weight: 600;
            color: red;
            text-align: center;

        }

        .input_group {
            margin-top: 40px;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: start;
        }

        .input_text {
            width: 95%;
            height: 30px;
            background: transparent;
            border: none;
            outline: none;
            border-bottom: 1px solid #20aacc;
            font-size: 20px;
            padding-left: 10px;
            color: rgb(30, 30, 30);

        }

        ::placeholder {
            font-size: 15px;
            color: #1f292c52;
            letter-spacing: 1px;

        }

        .fa {
            font-size: 25px;

        }

        #login_button {
            position: relative;
            width: 300px;
            height: 40px;
            transition: 1s;
            margin-top: 40px;
            color: white;


        }

        #login_button input[type='submit'] :hover {

            background-color: antiquewhite;
            font-weight: 600;
            color: white;
        }

        #login_button input[type='submit'] {
            position: absolute;
            width: 100%;
            height: 100%;
            text-decoration: none;
            z-index: 10;
            cursor: pointer;
            font-size: 22px;
            letter-spacing: 2px;
            border: 1px solid #00ccff;
            border-radius: 50px;
            background-color: #0c1022;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .me {
            margin-top: 10px;

        }

        .fotter1 {
            margin-top: 25px;
            display: flex;
            justify-content: space-between;
            justify-content: center;
            align-items: center;

        }

        .fotter1 a {
            text-decoration: none;
            cursor: pointer;
            font-size: 18px;

        }

        .fotter1 a:hover {
            color: red;
        }

        .fotter2 {
            margin-top: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;


        }

        .fotter2 a {
            text-decoration: none;
            cursor: pointer;
            font-size: 18px;

        }

        .fotter2 i {
            font-size: 15px;

        }

        .fotter2 a:hover {
            color: red;
        }


        input[type="submit"] {
            color: white;
            background-color: white;
        }


        input[type="submit"]:hover {
            color: red;
            border: 2px solid purple;
        }

        .glowIcon {
            text-shadow: 0 0 10px #00ccff;

        }

        footer p {
            background-color: black;
            color: white;
            text-align: center;
            margin-top: 115px;

        }
    </style>
</head>

<body>
    <nav>
        <div class="logo">Master Education</div>
        <ul class="menu">
            <li><a href="home.html">Home</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="team.html">Our Team</a></li>
            <li><a href="help and contact.php">Help & Contact</a></li>
            <li><a href="privacy.html">privacy & policy </a></li>
        </ul>

    </nav>
    <div class="login_form_container">

        <div class="login_form">
            <h2>Please Login to Continue</h2>
            <form method="POST" action="login.php">
                <div class="input_group">
                    <i class="fa fa-envelope"></i>
                    <pre>  </pre>
                    <input type="email" name="email" placeholder="   Enter Your Email Address" class="input_text" autocomplete="off" />
                </div>
                <div class="input_group">
                    <i class="fa fa-unlock-alt"></i>
                    <pre>  </pre>
                    <input type="password" name="password" placeholder="   Enter Your Password" class="input_text" autocomplete="off" />
                </div>
                <br>
                <p class="me"><input type="checkbox"> Remember me</p>
                <div class="button_group" id="login_button">
                    <input type="submit" value="Log In" />
                </div>
            </form>
            <div class="fotter1">
                <a href="recovery.html">Forgot Password? </a>
            </div>
            <div class="fotter2">
                <a href="signup.php"><i class="fa fa-hand-o-right"></i> Sign Up <i class="fa fa-hand-o-left"></i></a>
            </div>
        </div>
    </div>

    <footer>
        <p>&copy; Master Education. All rights reserved.</p>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>
        $(".input_text").focus(function() {
            $(this).prev('.fa').addclass('glowIcon')
        })
        $(".input_text").focusout(function() {
            $(this).prev('.fa').removeclass('glowIcon')
        })
    </script>
</body>

</html>