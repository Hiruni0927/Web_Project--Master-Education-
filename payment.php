<?php
include("db.php");
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get form data
    $cardholderName = $_POST["cardholderName"];
    $cardNumber = $_POST["cardNumber"];
    $cardType = isset($_POST["cardType"]) ? $_POST["cardType"] : "";
    $expiryMonth = $_POST["expiryMonth"];
    $expiryYear = $_POST["expiryYear"];
    $cvv = $_POST["cvv"];

    $query = "insert into payments (cardholderName, cardNumber, cardType, expiryMonth, expiryYear, cvv) VALUES ('$cardholderName','$cardNumber','$cardType','$expiryMonth','$expiryYear',$cvv)";
    if (mysqli_query($conn, $query)) {
        echo '<script>
        function showPopup() {
            // Create a new div element for the popup
            var popup = document.createElement("div");
            popup.className = "popup";

            // Add content to the popup
            popup.innerHTML = 
                `<div class="tick-container">
                <img src="tick.gif" alt="Tick Image" style= "width:90px;padding-left:70px;">
              </div>
                <h2>Payment Successful!</h2>
                <p>Thank you for your payment.</p>
                <a href="content.html" onclick="closePopup()" style="padding-left:100px; text-decoration:none; color:black;">OK</a>`;

            // Style the popup
            popup.style.position = "fixed";
            popup.style.top = "50%";
            popup.style.left = "50%";
            popup.style.transform = "translate(-50%, -50%)";
            popup.style.padding = "20px";
            popup.style.backgroundColor = "#f0f0f0";
            popup.style.boxShadow = "0 4px 8px rgba(0, 0, 0, 0.1)";
            popup.style.borderRadius = "8px";
            popup.style.zIndex = "9999";

            // Add the popup to the document
            document.body.appendChild(popup);
        }

        // Function to close the popup
        function closePopup() {
            var popup = document.querySelector(".popup");
            if (popup) {
                document.body.removeChild(popup);
            }
        }

        // Call the showPopup function after the page has loaded
        window.onload = showPopup;
    </script>';
    }
}
?>


<html>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        body {
            font-family: 'Roboto', sans-serif !important;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .mainscreen {
            min-height: 120vh;
            width: 100%;
            display: flex;
            flex-direction: column;
            background-color: #efeef1;
            color: rgb(0, 0, 0);
        }

        .card {
            width: 38rem;
            height: auto;
            margin: auto;
            background: white;
            position: center;
            align-self: center;
            top: 50rem;
            border-radius: 1.5rem;
            box-shadow: 4px 3px 20px #3535358c;
            display: flex;
            flex-direction: row;
        }

        .product {
            object-fit: cover;
            width: 20em;
            height: 20em;
            border-radius: 100%;
        }

        .rightside {
            background-color: #ffffff;
            width: 35rem;
            border-bottom-right-radius: 1.5rem;
            border-bottom-left-radius: 1.5rem;
            border-top-left-radius: 1.5rem;
            border-top-right-radius: 1.5rem;
            padding: 1rem 2rem 3rem 3rem;
        }

        h1 {
            color: #131212;
            text-align: center;
            padding-bottom: 30px;
            display: block;
            font-size: 2.5rem;
            font-weight: 400;
            margin: .77rem 0;
        }

        .icons {
            display: flex;
        }

        .icons img {
            width: 48px;
            height: 48px;
            margin-right: 10px;
        }

        p {
            display: block;
            font-size: 1.1rem;
            font-weight: 400;
            margin: .8rem 0;
        }

        .inputbox {
            color: #030303;
            width: 100%;
            padding: 0.5rem;
            border: none;
            border-bottom: 1.5px solid #ccc;
            margin-bottom: 1rem;
            border-radius: 0.3rem;
            font-family: 'Roboto', sans-serif;
            color: #615a5a;
            font-size: 1.1rem;
            font-weight: 500;
            outline: none;
        }

        .Month,
        .Year {
            width: 145px;
            margin-bottom: 20px;
            padding-left: 20px;
            border: 2px solid #e1e8ee;
            border-radius: 6px;
        }

        input[type=radio],
        [type=checkbox] {
            border: 0px;
            height: 3em;
            width: 1.5em;
        }

        .visa img {
            width: 40px;
        }

        .master img {
            width: 40px;
        }

        .vi_text {
            font-size: 1.3em;
            margin-left: 0.2em;
            position: relative;
            top: -10px;
        }

        .ms_text {
            font-size: 1.3em;
            margin-left: 0.2em;
            position: relative;
            top: -10px;
        }

        .master {
            margin-top: -50px;
            margin-left: 20em;
        }

        .expcvv {
            display: flex;
            justify-content: space-between;
            padding-top: 0.6rem;
        }

        .expcvv_text {
            padding-right: 1rem;
        }

        .expcvv_text2 {
            padding: 0 1rem;
        }

        .save {
            font-size: 20px;
            padding: 0;
            margin-top: -1.7em;
            margin-left: 1.5em;
            margin-bottom: 2em;
        }

        .button {
            margin-bottom: -10px;
            background: linear-gradient(135deg, #753370 0%, #298096 100%);
            padding: 15px;
            border: none;
            border-radius: 50px;
            color: white;
            font-weight: 400;
            font-size: 1.2rem;
            margin-top: 10px;
            width: 100%;
            letter-spacing: .11rem;
            outline: none;
        }

        .button:hover {
            transform: scale(1.05) translateY(-3px);
            box-shadow: 3px 3px 6px #38373785;
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
            margin-top: 5px;

        }
    </style>
</head>

<body>

    <div class="mainscreen">
        <div class="card">
            <div class="rightside">
                <form action="payment.php" method="post">
                    <h1>Payment Information</h1>
                    <p>Accepted cards :
                    <p>
                    <div class="icons">
                        <img src="https://img.icons8.com/color/48/000000/visa.png" />
                        <img src="https://img.icons8.com/color/48/000000/mastercard-logo.png" />

                    </div>
                    <p>Cardholder Name</p>
                    <input type="text" class="inputbox" name="cardholderName" required />
                    <p>Card Number</p>
                    <input type="text" class="inputbox" name="cardNumber" id="cardNumber" minlength="16" maxlength="16" required />

                    <p class="cardtype">
                    <div class="visa">
                        <input type="radio" id="visa" name="cardType" value="Visa">
                        <img src="https://img.icons8.com/color/48/000000/visa.png" />
                        <lable for="visa" class="vi_text">Visa</lable>
                    </div>
                    <div class="master">
                        <input type="radio" id="visa" name="cardType" value="Master">
                        <img src="https://img.icons8.com/color/48/000000/mastercard-logo.png" />
                        <lable for="MasterCard" class="ms_text">MasterCard</lable>
                    </div>
                    </p>
                    </p>

                    <div class="expcvv">
                        <p class="expcvv_text">Expiry</p>
                        <select class="Month" name="expiryMonth" required>
                            <option value="january">January</option>
                            <option value="february">February</option>
                            <option value="march">March</option>
                            <option value="april">April</option>
                            <option value="may">May</option>
                            <option value="june">June</option>
                            <option value="july">July</option>
                            <option value="august">August</option>
                            <option value="september">September</option>
                            <option value="october">October</option>
                            <option value="november">November</option>
                            <option value="december">December</option>
                        </select>&nbsp;&nbsp;
                        <select class="Year" name="expiryYear" required>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                            <option value="2026">2026</option>
                            <option value="2027">2027</option>
                            <option value="2028">2028</option>
                        </select>

                        <p class="expcvv_text2">CVV</p>
                        <input type="password" class="inputbox" name="cvv" id="cvv" maxlength="3" minlength="3" required placeholder="***" />
                    </div>

                    <input type="checkbox" name="save" checked />
                    <p class="save"> Save my card for future purchases </p>

                    <button type="submit" class="button">PAY NOW 50$</button>
                </form>
            </div>
        </div>
    </div>
    <footer>
        <p>&copy; Master Education. All rights reserved.</p>
    </footer>

</body>

</html>