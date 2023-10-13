<?php

session_start();
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $Name = $_POST['name'];
    $Email = $_POST['email'];
    $Subject = $_POST['subject'];
    $Message = $_POST['message'];

    if (!empty($Email) && !is_numeric($Email)) {
        $query = "INSERT INTO contact (Name,Email,Subject,Message) VALUES ('$Name','$Email','$Subject','$Message')";
        if (mysqli_query($conn, $query)) {
            echo "<script type='text/javascript'> alert('Submitted your Request') </script>";
        } else {
            echo "<script type='text/javascript'> alert('Error:" . mysqli_error($conn) . "')</script>";
        }
    } else {
        echo "<script type='text/javascript'> alert('Please enter some valid information')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Help and Contact</title>
    <style>
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

        header {
            background: linear-gradient(to right, #4caf50, #2196F3);
            /* Gradient background */
            color: white;
            text-align: center;
            padding: 50px 20px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            /* Add a subtle shadow effect */
        }

        header h1 {
            font-size: 36px;
            margin-bottom: 10px;
            /* Add space between heading and subheading */
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            /* Add text shadow for emphasis */
        }

        header h3 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        header p {
            font-size: 18px;
            line-height: 1.6;
        }

        /* Hover effect for header links */
        header a {
            color: #FFC107;
            /* Change link color */
            text-decoration: none;
            transition: color 0.3s ease;
        }

        header a:hover {
            color: #FF9800;
            /* Change link color on hover */
        }

        .contact-form {
            background-color: #f9f9f9;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            text-align: left;
            width: 80%;
            max-width: 400px;
            margin: 0 auto;
        }

        .contact-form fieldset {
            border: none;
            margin: 0;
            padding: 0;
            text-align: left;
        }

        .contact-form legend {
            font-weight: bold;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .contact-form .form-group {
            margin-bottom: 20px;
        }

        .contact-form label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        .contact-form input[type="text"],
        .contact-form input[type="email"],
        .contact-form textarea {
            width: calc(100% - 20px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .contact-form textarea {
            height: 150px;
            resize: none;
        }

        .contact-form button[type="submit"] {
            background-color: #07166b;
            color: white;
            border: none;
            padding: 15px 30px;
            cursor: pointer;
            font-size: 18px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .contact-form button[type="submit"]:hover {
            background-color: #0787c2;
        }

        .contact-details {
            margin-top: 40px;
            text-align: center;
            background-color: #f4f4f4;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .contact-details h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        .contact-details p {
            margin-bottom: 10px;
            font-size: 18px;
            color: #555;
        }


        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        footer {
            background-color: #000000;
            color: white;
            text-align: center;
            padding: 5px 0;
            bottom: 0;
            width: 100%;
        }

        #myBtn {
            display: none;
            position: fixed;
            bottom: 2.5px;
            right: 10px;
            z-index: 99;
            font-size: 15px;
            border: none;
            outline: none;
            background-color: red;
            color: white;
            cursor: pointer;
            padding: 15px;
            border-radius: 4px;
        }

        #myBtn:hover {
            background-color: #13017a;
            color: rgb(255, 183, 0);
        }
    </style>
</head>

<body>
    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-arrow-up"aria-hidden="true"></i></button>
    <nav>

        <div class="logo">Master Education</div>
        <ul class="menu">
            <li><a href="home.html">Home</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="help and contact.html">Help & Contact</a></li>
            <li><a href="privacy.html">privacy & policy </a></li>
            <li><a href="profile.html">Profile</a></li>
        </ul>
    </nav>
    <header>
        <h1>Contact Us</h1>
        <h3>We are here to assist you.</h3>
        <p>Welcome to Master Education, your premier online learning platform designed exclusively for A/L students! Our
            mission is to provide a comprehensive and interactive learning experience that empowers students to excel in
            their academic pursuits. If you require any assistance during your learning journey, our dedicated support
            team is always here to help. Whether you have questions about our courses, need technical guidance, or seek
            academic advice, don't hesitate to reach out to us. Your success is our top priority, and we are committed
            to ensuring you have a seamless and enriching learning experience. Contact us today through the channels
            provided below and let us help you unlock your full potential!</p>
    </header>
    <section class="contact-form">
        <form method="POST" action="help and contact.php">
            <fieldset>
                <legend>Your Information</legend>
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" placeholder="Your Name" required>
                </div><br>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" placeholder="Your Email" required>
                </div><br>
            </fieldset>

            <fieldset>
                <legend>Message Details</legend>
                <div class="form-group">
                    <label for="subject">Subject:</label>
                    <input type="text" id="subject" name="subject" placeholder="Subject" required>
                </div><br>
                <div class="form-group">
                    <label for="message">Message:</label>
                    <textarea id="message" name="message" rows="5" placeholder="Your Message" required></textarea>
                </div><br>
            </fieldset>

            <button type="submit">Send Message</button>
        </form>
    </section>
    <div class="contact-details">
        <h2>Contact Information:</h2>
        <p>Email: mastereducation@gmail.com</p>
        <p>Phone: +1 (800) 123-4567</p>
        <p>Address: 1234 Main Street, Cityville, State, Zip Code, Country</p>
        <p>Social Media: Follow us on Twitter, Facebook, and Instagram for updates, tips, and educational
            content.</p>
    </div>
    <footer>
        <p>&copy; Master Education. All rights reserved.</p>
    </footer>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var contactForm = document.getElementById("contactForm");

            contactForm.addEventListener("submit", function (event) {
                event.preventDefault();

                // Validate form fields
                var name = document.getElementById("name").value;
                var email = document.getElementById("email").value;
                var subject = document.getElementById("subject").value;
                var message = document.getElementById("message").value;

                if (name.trim() === "" || email.trim() === "" || subject.trim() === "" || message.trim() === "") {
                    alert("All fields are required!");
                    return;
                }

                // Simulate form submission (you can replace this with an actual form submission)
                alert("Form submitted successfully!");
                contactForm.reset(); // Clear form fields after submission
            });
        });
        // Get the button
        let mybutton = document.getElementById("myBtn");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function () { scrollFunction() };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }
        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }

        function openNav() {
            document.getElementById("mySidebar").style.width = "250px";
            document.getElementById("main").style.marginLeft = "250px";
        }

        function closeNav() {
            document.getElementById("mySidebar").style.width = "0";
            document.getElementById("main").style.marginLeft = "0";
        }

    </script>
</body>

</html>