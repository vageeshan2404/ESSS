<?php
    include "database.php";

    if (isset($_POST["signUp"])) {
        $firstname=$_POST["fname"];
        $lastname=$_POST["lname"];
        $email=$_POST["email"];
        $password=$_POST["password"];
        $password=md5($password);

        $checkEmail="SELECT * From users where email='$email'";
        $result=$mysqli->query($checkEmail);
        if ($result->num_rows>0) {
            echo "Email Address Already Exists !";
        }
        else {
            $insertQuery="INSERT INTO users(firstname,lastname,email,password)
                        VALUES('$firstname','$lastname','$email','$password')";
                    if ($mysqli->query($insertQuery)==TRUE) {
                        header("location: index.php");
                    }
                    else{
                        echo"Error:".conn->error;
                    }
        }
    }
    if (isset($_POST["signIn"])) {
        $email=$_POST["email"];
        $password=$_POST["password"];
        $password=md5($password);

        $sql="SELECT * FROM users WHERE email='$email' and password='$password'";
        $result=$mysqli->query($sql);
        if ($result->num_rows>0) {
            session_start();
            $row=$result->fetch_assoc();
          $_SESSION['email']=$row['email'];
    header("Location: homepage.php");
    exit();
   }
   else{
    echo "Not Found, Incorrect Email or Password";
   }
    }

?>