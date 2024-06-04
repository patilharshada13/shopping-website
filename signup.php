<?php 
if(isset($_POST['signup'])){
    include "connection.php";
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];

    $sql="SELECT * FROM `shopping` WHERE username = '$username'";
    $result = mysqli_query($conn,$sql);
    $count_username = mysqli_num_rows($result); 

    $sql="SELECT * FROM shopping WHERE email = '$email'";
    $result = mysqli_query($conn,$sql);
    $count_email = mysqli_num_rows($result);

    if($count_username==0 || $count_email==0){
        if($password==$cpassword){
            $sql = "insert into shopping (username,email,password) values('$username','$email','$password')";
            $result = mysqli_query($conn,$sql);
        }

    else{
        echo '<script>
        alert("password do not match..");
        window.location.href="signup.php";
        </script>';

    }
}
else{
    echo '<script>
        alert("user already exists..");
        window.location.href="index.php";
        </script>';

}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobile Shop</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="scripts.js" defer></script>
    <style>
        * {
            margin: 0px;
            padding: 0px;
        }

        body {
            background-color: black
        }

        #demo {
            background-color: black;
            color: #fff;
            padding: 10px 20px;
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.5em;
        }

        .search-bar {
            display: flex;
            flex: 1;
            margin: 0 20px;
        }

        .search-bar input {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 2px 0 0 2px;
        }

        .search-bar button {
            padding: 10px;
            border: none;
            background-color: #f9a825;
            border-radius: 0 2px 2px 0;
            cursor: pointer;
        }

        .login-cart a {
            margin-left: 20px;
            color: #fff;
            text-decoration: none;
        }

        nav {
            background-color: #fff;
            box-shadow: 0 4px 2px -2px gray;
        }

        nav ul {
            display: flex;
            justify-content: space-around;
            list-style: none;
            padding: 10px 0;
        }

        nav a {
            color: #333;
            text-decoration: none;
            padding: 5px 10px;
        }

         .container {
            height: 77vh;
            width: 100%;
            display: flex;
            justify-content: center;
            background-color: black
        }

        .form {
            max-width: 430px;
            width: 100%;
            padding: 30px;
            border-radius: 6px;
            background: white;
        }

        #head {
            font-size: 28px;
            font-weight: 600;
            text-align: center;
        }

        form {
            margin-top: 30px;
        }

        form .field {
            height: 50px;
            width: 100%;
            margin-top: 20px;
        }

        .field input,
        .field button {
            height: 100%;
            width: 100%;
            border: none;
            font-size: 16px;
            font-weight: 400;
            border-radius: 6px;
        }

        .field input {

            border: 1px solid #CACACA;
        }

        .form-link {
            text-align: center;
            margin-top: 10px;
        }

        .form-link span {
            font-size: 14px;
            font-weight: 400;
            font-family: Arial, Helvetica, sans-serif;
        }

        .form a {
            text-decoration: none;
        }

        .form a:hover {
            text-decoration: underline;
        }

        .field button {
            color: white;
            background-color: #0171d3;
        }

        footer {
            background-color: black;
            color: #fff;
            padding: 20px 0;
        }

        .footer-content {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            padding: 20px;
        }

        .footer-section {
            flex: 1;
            margin: 10px;
            min-width: 200px;
        }

        .footer-section h2 {
            margin-bottom: 10px;
        }

        .footer-section p,
        .footer-section ul,
        .footer-section form {
            margin-bottom: 10px;
        }

        .footer-section .socials a {
            color: #fff;
            margin-right: 10px;
            text-decoration: none;
            font-size: 1.5em;
        }

        .footer-section .socials a:hover {
            color: #2874f0;
        }

        .footer-section form input {
            padding: 10px;
            border: none;
            border-radius: 5px;
            margin-right: 10px;
        }

        .footer-section form button {
            padding: 10px;
            border: none;
            background-color: #2874f0;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
        }

        .footer-section form button i {
            font-size: 1em;
        }

        .footer-bottom {
            text-align: center;
            padding: 10px 0;
            border-top: 1px solid black;
            margin-top: 20px;
        }



        @media (max-width: 600px) {
            .header-content {
                flex-direction: column;
            }
        }


        @media (max-width:515px) {

            .container forms {
                margin-left: 1rem;
                margin-right: 1rem;
            }

            nav {
                width: 100%;
                margin: 0em;
            }
        }
    </style>
</head>

<body>
    <header id="demo">
        <div class="header-content">
            <div class="logo">Wireless World.</div>
            <div class="search-bar">
                <input type="text" placeholder="Search for products, brands and more">
                <button>Search</button>
            </div>
            <br>
            <div class="login-cart">
                <a href="login.html">Login</a>
                <a href="cart.html"><i class="fas fa-shopping-cart"></i> Cart</a>
            </div>
        </div>
    </header>
    <nav>
        <ul>
            <li><a href="index.html"><i class="fas fa-home"></i> Home</a></li>
            <li><a href="index.html"><i class="fas fa-laptop"></i> Electronics</a></li>
            <li><a href="#"><i class="fas fa-tshirt"></i> Fashion</a></li>
            <li><a href="#"><i class="fas fa-ellipsis-h"></i> More</a></li>
        </ul>
    </nav>

    <div class="container forms">
        <div class="form login">
            <header id="head">Sign Up</header>

            <form name="form" action="signup.php" method="post">
                <div class="field input-field">
                    <input type="text" id="username" name="username" placeholder="    Username" class="input">
                </div>
                <div class="field input-field">
                    <input type="email" id="email" name="email" placeholder="    Email" class="input">
                </div>
                <div class="field input-field">
                    <input type="password" id="password" name="password" placeholder="    Password" class="input">
                </div>
                <div class="field input-field">
                    <input type="cpassword" id="cpassword" name="cpassword" placeholder="    Confirm Password" class="input">
                </div>
                <div class="field button-field">
                    <button type="signup" id="btn" name="signup" >Sign Up</button>
                </div>
                <div class="form-link">
                    <span>Already have an account? <a href="login.html">Login here</a></span>
                </div>
            </form>
        </div>
    </div>

    <center>
        <footer>
            <div class="footer-section contact">
                <h2>Contact Us</h2>
                <p><i class="fas fa-map-marker-alt"></i> 123 Shirpur, Main Street</p>
                <p><i class="fas fa-phone-alt"></i> +1 234 567 890</p>
                <p><i class="fas fa-envelope"></i> support@patil.com</p>
                <div class="socials">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin"></i></a>
                </div>
            </div>
            <br>
            <div class="footer-section newsletter">
                <h2>Newsletter</h2>
                <p>Subscribe to our newsletter to get the latest updates and offers.</p>
                <form action="#">
                    <input type="email" placeholder="Enter your email">
                    <button type="submit"><i class="fas fa-paper-plane"></i></button>
                </form>
            </div>
            <div class="footer-bottom">
                &copy; 2024 Wireless World. All rights reserved.
            </div>
        </footer>
    </center>
</body>

</html>
