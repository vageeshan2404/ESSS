<?php
session_start();
    include "database.php";

// Fetch all schools
$query = "SELECT * FROM school_data";
$result = $mysqli->query($query);
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ESSS</title>
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

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th,
        table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background-color: #198dcb;
            color: white;
        }

        table tr:hover {
            background-color: #f1f1f1;
        }

        .btn {
            padding: 8px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-delete {
            background-color: #ff4d4d;
            color: white;
        }

        .btn-delete:hover {
            background-color: #cc0000;
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

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }

            table th,
            table td {
                padding: 8px;
            }

            .btn {
                padding: 6px 10px;
                font-size: 12px;
            }
        }

        @media (max-width: 576px) {
            .header h1 {
                font-size: 20px;
            }

            .nav a {
                font-size: 14px;
            }

            table th,
            table td {
                padding: 6px;
            }

            .btn {
                padding: 5px 8px;
                font-size: 12px;
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
        <a href="homepage.php">Register School</a>
        <a href="school.php">School Details</a>
        <a href="logout.php">Logout</a>
    </div>

<div class="container">
        <h2>School Details</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>School Name</th>
                    <th>District</th>
                    <th>Block</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['school_name'] ?></td>
                    <td><?= $row['district'] ?></td>
                    <td><?= $row['block'] ?></td>
                    
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    
    <div class="footer">
        <p>This site is designed, hosted, developed, and maintained by EduSite For Smart School (ESSS)</p>
    </div>
</body>

</html>