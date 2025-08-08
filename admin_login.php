<?php
session_start();
include "database.php";
$admin_username = "admin";
$admin_password = "admin_1234"; 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username === $admin_username && $password === $admin_password) {
        $_SESSION["admin"] = true;

        header("Location: admin_dashboard.php");
        exit();
    } else {
        header("Location: admin_login.php?error=invalid_credentials");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - ESSS</title>
    <link rel="icon" href="Essslogo (2).png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #c9d6ff;
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .head {
            width: 100%;
            height: 100px;
            background-color: rgb(242, 236, 236);
            display: flex;
            align-items: center;
            padding-left: 1.9%;
            position: fixed;
            top: 0;
            z-index: 1000;
        }

        .head img {
            height: 70px;
            width: 70px;
        }

        .header {
            color: black;
            margin-left: 20px;
        }

        .header h1 {
            font-size: 23px;
            margin: 0;
        }

        .header p {
            font-size: 14px;
            margin: 0;
        }

        .nav {
            background-color: #198dcb;
            padding: 10px;
         
            position: fixed;
            top: 100px;
            width: 100%;
            z-index: 1000;
        }

        .nav a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
            font-size: 16px;
        }

        .nav a:hover {
            color: #EEA200;
        }

        .form-container {
            background: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
            margin-top: 200px;
            margin-bottom: 100px;
            text-align: center;
        }

        .form-container h1 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        .form-container input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            transition: border-color 0.3s ease;
        }

        .form-container input:focus {
            border-color: #6a11cb;
            outline: none;
        }

        .form-container button {
            width: 100%;
            padding: 12px;
            background: #6a11cb;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .form-container button:hover {
            background: #2575fc;
        }

        .form-container p {
            margin-top: 15px;
            font-size: 14px;
            color: #666;
        }

        .form-container a {
            color: #6a11cb;
            text-decoration: none;
        }

        .form-container a:hover {
            text-decoration: underline;
        }

        .footer {
            background-color: #198dcb;
            color: white;
            text-align: center;
            padding: 15px;
            position: fixed;
            bottom: 0;
            width: 100%;
            box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
        }

        .footer p {
            margin: 0;
            font-size: 16px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .form-container {
                padding: 20px;
                margin-top: 180px;
            }

            .form-container h1 {
                font-size: 22px;
            }

            .form-container input {
                padding: 10px;
                font-size: 13px;
            }

            .form-container button {
                padding: 10px;
                font-size: 14px;
            }
        }

        @media (max-width: 480px) {
            .head {
                height: 80px;
                padding: 0 10px;
            }

            .head img {
                height: 50px;
                width: 50px;
            }

            .header {
                font-size: 18px;
            }

            .header p {
                font-size: 12px;
            }

            .form-container {
                margin-top: 160px;
            }

            .form-container h1 {
                font-size: 20px;
            }

            .form-container input {
                padding: 8px;
                font-size: 12px;
            }

            .form-container button {
                padding: 8px;
                font-size: 13px;
            }

            .footer {
                height: 60px;
                padding: 15px;
            }

            .footer p {
                font-size: 14px;
            }
        }
.input-group {
    position: relative;
    margin-bottom: 15px;
}

.input-group i {
    position: absolute;
    left: 10px;
    top: 50%;
    transform: translateY(-50%);
    color: #6a11cb; 
    font-size: 16px;
}

.input-group input {
    width: 100%;
    padding: 12px 12px 12px 40px; /* Add padding for the icon */
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 14px;
    transition: border-color 0.3s ease;
}

/* Input Field Focus Effect */
.input-group input:focus {
    border-color: #6a11cb; /* Highlight border on focus */
    outline: none;
}

/* Button Styling */
button {
    width: 100%;
    padding: 12px;
    background: #6a11cb; /* Button background color */
    color: white; /* Button text color */
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: background 0.3s ease;
}

/* Button Hover Effect */
button:hover {
    background: #2575fc; /* Change background on hover */
}

.container{
            background-color: #fff;
            width: 450px;
            padding: 1.5rem;
            margin: 50px auto;
            border-radius: 10px;
            box-shadow: 0 25px 30px rgba(0, 0, 1, 0.9);
        }
        .signuphead{
            position: relative;
        }
        .signupimg{
            height:50px; 
            width:50px; 
            position:absolute; 
            left:25.3%; 
            top:-6%;
        }
        .signinhead{
            position: relative;
        }
        .signinimg{
            height:50px; 
            width:50px; 
            position:absolute; 
            left:25.3%; 
            top:-6%;
        }
        .title {
            color: white;
            position: absolute;
            left: 8%;
            top: 15px;
            font-size:23px;

        }

        .title p {
            position: absolute;
            top: 85%;
        }
                
        form{
            margin: 0 2rem;
        }
        .Form-Title{
            font-size: 1.5rem;
            font-weight: bold;
            text-align: center;
            padding: 1.3rem;
            margin-bottom: 0.4rem;
        }
        .h1{
            font-size: 2.5rem;
            font-weight: bold;
            text-align: center;
            color:maroon ;
            
            margin-bottom: 0.2rem;
        }
        .p{
            font-size: 1rem;
            font-weight: bold;
            text-align: center;
            color:rgb(19, 70, 147) ;
            
            margin-bottom: 0.2rem;
        }
        .links{
            display: flex;
            justify-content: space-around;
            padding: 0 4rem;
            margin-top: 0.9rem;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="head">
        <img src="esss.png">
        <div class="header">
            <h1>EduSite for Smart School</h1>
            <p>(Smart School for Smart Society)</p>
        </div>
    </div>

    <div class="nav">
        <a href="index.php">Home</a>
        <a href="find-school.html">Find School</a>
        <a href="admin_login.php">Admin</a>
        <a href="enquiry_page.php">School Enquiries</a>
        <a href="about-us.html">About Us</a>
    </div>
    <div class="container" id="signUp" >
    <div class="signinhead">
            <h1 class="h1"><img src="Essslogo (2).png" class="signinimg">ESSS</h1>
            <p class="p">(Smart School for Smart Society)</p>
            <h1 class="Form-Title">Admin Login</h1>
            <?php
            // Display error message if credentials are invalid
            if (isset($_GET["error"]) && $_GET["error"] === "invalid_credentials") {
                echo "<p style='color: red;'>Invalid username or password. Please try again.</p>";
            }
            ?>
        </div>
        <form method="POST">
    <div class="input-group">
        <i class="fas fa-user"></i>
        <input type="text" name="username" placeholder="Username" required>
    </div>
    <div class="input-group">
        <i class="fas fa-lock"></i>
        <input type="password" name="password" placeholder="Password" required>
    </div>
    <button type="submit">Login</button>
</form>

</div>
    <div class="footer">
        <p>This site is designed, hosted, developed, and maintained by EduSite For Smart School (ESSS)</p>
    </div>
</body>

</html>