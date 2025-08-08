<?php
session_start();
include("database.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ESSS</title>
    <link rel="icon" href="Essslogo (2).png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <style>



body{
            
            background-color: #c9d6ff;
            background: linear-gradient(to right, #e2e2e2, #c9d6ff );
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
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #f4f4f9;
            color: #333;
        }

        .head {
            width: 100%;
            height: 100px;
            background-color: rgb(242, 236, 236);
            display: flex;
            align-items: center;
            padding-left: 1.9%;
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

        .footer a {
            color: white;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
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
        input{
            color: inherit;
            width: 100%;
            background-color: transparent;
            border: none;
            border-bottom: 1px solid #757575;
            font-size: 15px;
            padding-left: 1.5rem;
            
        }
        .input-group{
            padding: 1% 0;
            position: relative;
        }
        .input-group i{
            position: absolute;
            color: black;
        }
        input:focus{
            background-color: transparent;
            outline: transparent;
            border-bottom: 2px solid hsl(327, 90%, 28%);
        }
        input::placeholder{
            color: transparent;
        }
        label{
            color: #757575;
            position: relative;
            left: 1.2em;
            top: -1.3em;
            cursor: auto;
            transition: 0.3s ease all;
        }
        input:focus~label,input:not(:placeholder-shown)~label{
            top: -3em;
            color: hsl(327, 90%, 28%);
            font-size: 15px;

        }
     
        .btn1{
            font-size: 1.1rem;
            padding: 8px 0;
            border-radius: 5px;
            outline: none;
            border: none;
            width: 100%;
            background: rgb(125,125,235);
            color: white;
            cursor: pointer;
            transition: 0.9s;
        }
        .btn1:hover{
            background: #07001f;

        }
        .or{
            font-size: 1.1rem;
            margin-top: 0.5rem;
            text-align: center;
        }
        .icons{
            text-align: center;
        }
        .icons i{
            color: rgb(235, 125, 125);
            padding: 0.8rem 1.5rem;
            border-radius: 10px;
            font-size: 1.5rem;
            cursor: pointer;
            border: 2px solid #dfe9f5;
            margin: 0 15px;
            transition: 1s;
        }
        .icons i:hover{
            background: #d7d9ce;
            font-size:  1.6rem;
            border: 2px solid rgb(125, 125, 235);
        }
        .links{
            display: flex;
            justify-content: space-around;
            padding: 0 4rem;
            margin-top: 0.9rem;
            font-weight: bold;
        }
        button{
            color: rgb(125, 125, 235);
            border: none;
            background-color: transparent ;
            font-size: 1rem;
            font-weight: bold;
        }
        button:hover{
            text-decoration: underline;
            color: blue;
            cursor: pointer;
        }

     
        .btn{
            position: absolute;
            right: 2%;
            top: 20%;
            font-size: 0.7rem;
            padding: 8px 0;
            border-radius: 5px;
            outline: none;
            border: none;
            width: 80px;
            background: rgb(125,125,235);
            color: white;
            cursor: pointer;
        }
        #sign-up{
            position: absolute;
            right: 8%;
        }
        .btn:hover{
            background: #EEA200;

        }
        img{
            width: 100%;
            height: 230px;
            
        }
        .center-body {
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    padding: 20px;
                    margin: 50px auto;
                    max-width: 1200px;
                    gap: 20px; /* Space between items */
                }

                .stu,
                .tea,
                .sch {
                    background-color: #fff;
                    border-radius: 10px;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                    padding: 20px;
                    text-align: center;
                    flex: 1; /* Equal width for all items */
                    transition: transform 0.3s ease, box-shadow 0.3s ease;
                }

                .stu:hover,
                .tea:hover,
                .sch:hover {
                    transform: translateY(-10px);
                    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
                }

                .stu img,
                .tea img,
                .sch img {
                    width: 100px;
                    height: 100px;
                    margin-bottom: 15px;
                }

                .stu h3,
                .tea h3,
                .sch h3 {
                    font-size: 24px;
                    color: #198dcb;
                    margin-bottom: 10px;
                }

                .stcount,
                .tcount,
                .scount {
                    background-color: #198dcb;
                    color: white;
                    padding: 10px;
                    border-radius: 5px;
                    font-size: 20px;
                    margin-top: 10px;
                }

                /* Responsive Styles */
                @media (max-width: 768px) {
                    .center-body {
                        flex-direction: column;
                        gap: 30px;
                    }

                    .stu,
                    .tea,
                    .sch {
                        width: 80%;
                        margin: 0 auto;
                    }
                }

                @media (max-width: 576px) {
                    .stu,
                    .tea,
                    .sch {
                        width: 100%;
                    }

                    .stu h3,
                    .tea h3,
                    .sch h3 {
                        font-size: 20px;
                    }

                    .stcount,
                    .tcount,
                    .scount {
                        font-size: 18px;
                    }
                }
        .line{
            width: 100%;
            height: 100px;
            background-color: rgb(205, 67, 113) ;
            
            
        }
        .line h1{
            color: white;
            padding-left: 350px;
            padding-top: 25px;
            
        }
        .find-school a:hover{
            color:#EEA200;
        }
      

        .find-school{
            margin-left:42.5%;font-size:25px;margin-top:10px;margin-bottom:10px;
        }
        .tnschool{
            margin-top:10px;margin-bottom:10px;text-align:center;font-size:35px;color:brown;
        }
        .schooldetail{
            width:900px;margin-left:25%;margin-bottom:20px;
        }
        /* General Responsive Styles */
        @media (max-width: 1200px) {
            .head img {
                margin-left: 1%;
            }

            .header {
                left: 6%;
            }

            .line h1 {
                padding-left: 200px;
            }

            .schooldetail {
                width: 80%;
                margin-left: 10%;
            }
        }

        @media (max-width: 992px) {
            .head img {
                margin-left: 0.5%;
            }

            .header {
                left: 5%;
                font-size: 20px;
            }

            .header p {
                font-size: 12px;
            }

            .line h1 {
                padding-left: 150px;
                font-size: 24px;
            }

            .schooldetail {
                width: 90%;
                margin-left: 5%;
            }

            .find-school {
                margin-left: 30%;
            }
        }

        @media (max-width: 768px) {
            .head img {
                height: 50px;
                width: 50px;
                margin-top: 20px;
            }

            .header {
                left: 4%;
                font-size: 18px;
            }

            .header p {
                font-size: 10px;
            }

            .nav {
                height: 40px;
            }

            .list a {
                font-size: 16px;
                margin-right: 15px;
            }

            .btn {
                font-size: 0.6rem;
                width: 70px;
            }

        
            .line h1 {
                padding-left: 100px;
                font-size: 20px;
            }

            .schooldetail {
                width: 95%;
                margin-left: 2.5%;
            }

            .find-school {
                margin-left: 20%;
            }

            .container {
                width: 90%;
                margin: 30px auto;
            }
        }

        @media (max-width: 576px) {
            .head img {
                height: 40px;
                width: 40px;
                margin-top: 25px;
            }

            .header {
                left: 3%;
                font-size: 16px;
            }

            .header p {
                font-size: 8px;
            }

            .nav {
                height: 35px;
            }

            .list a {
                font-size: 14px;
                margin-right: 10px;
            }

            .btn {
                font-size: 0.5rem;
                width: 60px;
            }

            .line h1 {
                padding-left: 50px;
                font-size: 18px;
            }

            .schooldetail {
                width: 100%;
                margin-left: 0;
            }

            .find-school {
                margin-left: 10%;
            }

            .container {
                width: 100%;
                padding: 1rem;
            }

            .Form-Title {
                font-size: 1.2rem;
            }

            .h1 {
                font-size: 2rem;
            }

            .p {
                font-size: 0.9rem;
            }

            input {
                font-size: 14px;
            }

            label {
                font-size: 14px;
            }

            .btn1 {
                font-size: 1rem;
            }

            .icons i {
                padding: 0.6rem 1rem;
                font-size: 1.2rem;
            }

            .links {
                padding: 0 2rem;
            }
        }

        @media (max-width: 400px) {
            .head img {
                height: 30px;
                width: 30px;
                margin-top: 30px;
            }

            .header {
                left: 2%;
                font-size: 14px;
            }

            .header p {
                font-size: 6px;
            }

            .nav {
                height: 30px;
            }

            .list a {
                font-size: 12px;
                margin-right: 5px;
            }

            .btn {
                font-size: 0.4rem;
                width: 50px;
            }

            .student,
            .teacher,
            .School {
                width: 70%;
                left: 0;
                top: 40%;
            }

            .stcount,
            .tcount,
            .scount {
                left: 2%;
                top: 75%;
            }

            .line h1 {
                padding-left: 20px;
                font-size: 16px;
            }

            .schooldetail {
                width: 100%;
                margin-left: 0;
            }

            .find-school {
                margin-left: 5%;
            }

            .container {
                width: 100%;
                padding: 0.5rem;
            }

            .Form-Title {
                font-size: 1rem;
            }

            .h1 {
                font-size: 1.8rem;
            }

            .p {
                font-size: 0.8rem;
            }

            input {
                font-size: 12px;
            }

            label {
                font-size: 12px;
            }

            .btn1 {
                font-size: 0.9rem;
            }

            .icons i {
                padding: 0.5rem 0.8rem;
                font-size: 1rem;
            }

            .links {
                padding: 0 1rem;
            }
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
        <a href="userdashboard.php">Home</a>
        <a href="enquiry_page.php"> School Enquiries</a>
        <a href="enquiry_form.php">Register Enquiry</a>
        <a href="logout.php">Logout</a>
    </div>


<div class="container" id="signUp" style="display: none;">
        <div class="signuphead">
            <h1 class="h1"><img src="Essslogo (2).png" class="signupimg">ESSS</h1>
            <p class="p">(Smart School for Smart Society)</p>
            <h1 class="Form-Title">Student Register Form</h1>
        </div>
        <form method="post" action="student_signup.php">
            <div class="input-group">
                <i class="fas fa-user"></i>
                <input type="text" name="fname" class="fname" placeholder="First Name" required>
                <label for="fname">Student First Name</label>
            </div>
            <div class="input-group">
                <i class="fas fa-user"></i>
                <input type="text" name="lname" class="lname" placeholder="Last Name" required>
                <label for="lname">Student Last Name</label>
            </div>
            <div class="input-group">
                <i class="fas fa-envelope"></i>
                <input type="email" class="email" name="email" placeholder="Enter Email" required>
                <label for="email">Student Email</label>
            </div>
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" class="password" id="password" name="password" placeholder="Enter password" required>
                <label for="password">Password</label>
            </div>
            <input type="submit" class="btn1" value="Sign Up" name="signUp">
        </form>
        <div class="links">
            <p>Already Have Account ?</p>
            <button id="signInButton">Sign In</button>
        </div>
    </div>

    <div class="container" id="signIn" >
        <div class="signinhead">
            <h1 class="h1"><img src="Essslogo (2).png" class="signinimg">ESSS</h1>
            <p class="p">(Smart School for Smart Society)</p>
            <h1 class="Form-Title">Sign in</h1>
        </div>
        <form method="post" action="student_login.php">
            <div class="input-group">
                <i class="fas fa-envelope"></i>
                <input type="email" class="email" name="email" placeholder="Enter Email" required>
                <label for="email">Student Email</label>
            </div>
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" class="password" name="password" placeholder="Enter password" required>
                <label for="password">Password</label>
            </div>
           
            <input type="submit" class="btn1" value="Sign in" name="signIn">
        </form>
        <div class="links">
            <p>Don't Have Account ?</p>
            <button id="signUpButton">Sign Up</button>
        </div>
    </div>
    
    <script>
        const signUpButton = document.getElementById("signUpButton");
        const signInButton = document.getElementById("signInButton");
        const signUpForm = document.getElementById("signUp");
        const signInForm = document.getElementById("signIn");

        signUpButton.addEventListener("click", function () {
            signInForm.style.display = "none";
            signUpForm.style.display = "block";
        });

        signInButton.addEventListener("click", function () {
            signInForm.style.display = "block";
            signUpForm.style.display = "none";
        });
    </script>
   
   <div class="footer">
        <p>This site is designed, hosted, developed, and maintained by EduSite For Smart School (ESSS)</p>
    </div>
</body>

</html>
