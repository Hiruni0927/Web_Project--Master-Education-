<?php

session_start();

include("db.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $Name = $_POST['name'];
    $Email = $_POST['email'];
    $Stream = $_POST['stream'];
    $Phone = $_POST['phone'];
    $Date = $_POST['date'];
    $Address = $_POST['address'];
    $Password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    $duplicate = mysqli_query($conn, "SELECT * FROM signup WHERE name = '$Name' OR email = '$Email'");
    if (mysqli_num_rows($duplicate) > 0) {
        echo "<script>alert('Name or Email Has Already Taken'); </script>";
    } else {
        if ($Password == $confirmpassword) {
            if (!empty($Email) && !empty($Password) && !is_numeric($Email)) {

                $query = "INSERT INTO signup (Name,Email,Stream,Phone,Date,Address,Password) VALUES ('$Name','$Email','$Stream','$Phone','$Date','$Address','$Password')";
                if (mysqli_query($conn, $query)) {
                    echo "<script type='text/javascript'> alert('Successfully Registered ! Please Login to Continue');window.location.href = 'login.php';
              </script>";
                } else {
                    echo "<script type='text/javascript'> alert('Error:" . mysqli_error($conn) . "')</script>";
                }
            } else {
                echo "<script type='text/javascript'> alert('Please enter some valid information')</script>";
            }
        } else {
            echo "<script type= 'text/javascript'> alert('Password Does Not Match ')</script>";
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
    <title>Sign Up</title>
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

        footer p {
            background-color: black;
            color: white;
            text-align: center;
            margin-top: 85px;

        }

        .signup_form_container {
            position: relative;
            width: 900px;
            height: 950px;
            max-width: 1200px;
            max-height: 950px;
            background: #2c3793;
            border-radius: 50px 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            margin-left: 350px;
            margin-top: 20px;
        }

        .signup_form {
            position: absolute;
            content: '';
            background-color: white;
            border-radius: 50px 10px;
            inset: 5px;
            padding: 50px 40px;
            z-index: 10;
            color: #3c11e9;

        }

        h2 {
            font-size: 40px;
            font-weight: 600;
            text-align: center;
            color: rgb(37, 30, 30);
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
            height: 50px;
            background: transparent;
            border: none;
            outline: none;
            border-bottom: 1px solid #191f20;
            font-size: 20px;
            padding-left: 10px;
            color: black;

        }

        ::placeholder {
            font-size: 15px;
            color: #0d607452;
            letter-spacing: 1px;

        }

        .fa {
            font-size: 25px;

        }


        input[type="submit"]:hover {
            color: orange;
            background-color: antiquewhite;
            font-weight: 600;
        }


        input[type="submit"] {
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
            position: relative;
            width: 300px;
            height: 40px;
            transition: 1s;
            margin-top: 40px;
            margin-left: 250px;
            color: white;
        }


        .me {
            margin-top: 10px;

        }

        option {
            color: yellow;
            background-color: black;
        }

        .fotter {
            margin-top: 20px;
            display: flex;
            justify-content: center;
            align-items: center;

        }

        .fotter a {
            text-decoration: none;
            cursor: pointer;
            font-size: 18px;


        }

        .fotter i {
            font-size: 15px;
        }

        .fotter a:hover {
            color: red;
        }


        .glowIcon {
            text-shadow: 0 0 10px #00ccff;

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
            <li><a href="profile.php">My Profile </a></li>
        </ul>

    </nav>

    <div class="signup_form_container">
        <div class="signup_form">
            <h2>Please SignUp to Continue</h2>


            <form method="POST" action="signup.php">
                <div class="input_group">
                    <i class="fa fa-user"></i>
                    <pre>  </pre>
                    <input type="text" name="name" placeholder="   Enter Your Full Name" class="input_text" autocomplete="off" />
                </div>

                <div class="input_group">
                    <i class="fa fa-envelope"></i>
                    <pre>  </pre>
                    <input type="email" name="email" placeholder="   Enter Your Email Address" class="input_text" autocomplete="off" />
                </div>
                <div class="input_group">
                    <i class="fa fa-book"></i>
                    <pre>  </pre>
                    <select type="dropbox" name="stream" placeholder="   Choose Your Subject Stream" class="input_text" autocomplete="off" />
                    <option>Arts</option>
                    <option>Commerce</option>
                    <option>Bio Science</option>
                    <option>Physical Science (Maths)</option>
                    <option>Technology</option>

                </div>
        </div>
        <div class="input_group">
            <i class="fa fa-phone"></i>
            <pre>  </pre>
            <input type="text" name="phone" placeholder="   Enter Your Phone Number" class="input_text" autocomplete="off" />
        </div>
        <div class="input_group">
            <i class="fa fa-calendar-times-o"></i>
            <pre>  </pre>
            <input type="date" name="date" placeholder="   Enter Your Birth Date" class="input_text" autocomplete="off" />
        </div>
        <div class="input_group">
            <i class="fa fa-location-arrow"></i>
            <pre>  </pre>
            <input type="text" name="address" placeholder="   Enter Your Address" class="input_text" autocomplete="off" />
        </div>

        <div class="input_group">
            <i class="fa fa-envelope"></i>
            <pre>  </pre>
            <input type="password" name="password" placeholder="   Enter Your Password" class="input_text" autocomplete="off" />
        </div>
        <div class="input_group">
            <i class="fa fa-envelope"></i>
            <pre>  </pre>
            <input type="password" name="confirmpassword" placeholder="   Re-Type Your Password" class="input_text" autocomplete="off" />
        </div>

        <br>
        <p class="me"><input type="checkbox"> By creating this account, you agree to our Privacy Policy & Cookie Policy.</p>

        <div class="button_group" id="signup_button">

            <input type="submit" value="Sign Up">
        </div>
        </form>
        <div class="fotter">
            <a href="login.php"><i class="fa fa-hand-o-right"></i> i already have an account,Log in <i class="fa fa-hand-o-left"></i></a>
        </div>
        </form>
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