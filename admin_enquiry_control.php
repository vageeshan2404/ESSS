<?php
session_start();
include "database.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_enquiry'])) {
    $enquiry_id = $_POST['enquiry_id'];
    $query = "DELETE FROM enquiries WHERE id = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("i", $enquiry_id);
    $stmt->execute();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_status'])) {
    $enquiry_id = $_POST['enquiry_id'];
    $status = $_POST['status'];
    $query = "UPDATE enquiries SET status = ? WHERE id = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("si", $status, $enquiry_id);
    $stmt->execute();
}
?>
<!DOCTYPE html>
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
            max-width: 500px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .enquiry-item {
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        .enquiry-item p {
            margin: 5px 0;
        }

        .enquiry-item img {
            width: 200px; /* Fixed width */
            height: 200px; /* Fixed height */
            object-fit: cover; /* Ensures the image fits within the dimensions */
            border-radius: 10px;
            margin-top: 10px;
            display: block;
            margin-left: auto;
            margin-right: auto;
            border: 2px solid #ddd;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .status {
            font-weight: bold;
        }

        .status.solved {
            color: green;
        }

        .status.unsolved {
            color: red;
        }

        .actions {
            margin-top: 10px;
        }

        .actions form {
            display: inline-block;
            margin-right: 10px;
        }

        .actions button {
            padding: 8px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        .actions button.delete {
            background-color: #ff4d4d;
            color: white;
        }

        .actions button.delete:hover {
            background-color: #cc0000;
        }

        .actions button.update {
            background-color: #198dcb;
            color: white;
        }

        .actions button.update:hover {
            background-color: #157ab8;
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
            .container {
                padding: 15px;
            }

            .enquiry-item {
                padding: 10px;
            }

            .enquiry-item img {
                width: 100%; /* Full width for smaller screens */
                height: auto; /* Maintain aspect ratio */
            }

            .actions button {
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

            .enquiry-item {
                padding: 8px;
            }

            .enquiry-item img {
                width: 100%; /* Full width for small devices */
                height: auto; /* Maintain aspect ratio */
            }

            .actions button {
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
        <a href="admin_dashboard.php">Home</a>
        <a href="admin_enquiry_control.php">School Enquiry</a>
        <a href="admin_school.php">School Details</a>
        <a href="logout.php">Logout</a>
    </div>

    <div class="container">
        <h1>Enquiries</h1>
        <?php
        $enquiries = $mysqli->query("SELECT * FROM enquiries ORDER BY created_at DESC");
        while ($enquiry = $enquiries->fetch_assoc()) {
            echo "<div class='enquiry-item'>
                    <p><strong>School Name:</strong> {$enquiry['school_name']}</p>
                    <p><strong>District:</strong> {$enquiry['school_district']}</p>
                    <p><strong>Block:</strong> {$enquiry['school_block']}</p>
                    <p><strong>Address:</strong> {$enquiry['school_address']}</p>
                    <p><strong>Enquiry:</strong> {$enquiry['enquiry_text']}</p>
                    <p class='status {$enquiry['status']}'><strong>Status:</strong> {$enquiry['status']}</p>";
            if ($enquiry['image_path']) {
                echo "<img src='{$enquiry['image_path']}' alt='Enquiry Image'>";
            }
            echo "<div class='actions'>
                    <form method='POST' style='display:inline;'>
                        <input type='hidden' name='enquiry_id' value='{$enquiry['id']}'>
                        <button type='submit' name='delete_enquiry' class='delete'>Delete</button>
                    </form>
                    <form method='POST' style='display:inline;'>
                        <input type='hidden' name='enquiry_id' value='{$enquiry['id']}'>
                        <select name='status' onchange='this.form.submit()'>
                            <option value='solved' " . ($enquiry['status'] == 'solved' ? 'selected' : '') . ">Solved</option>
                            <option value='unsolved' " . ($enquiry['status'] == 'unsolved' ? 'selected' : '') . ">Unsolved</option>
                        </select>
                        <input type='hidden' name='update_status'>
                    </form>
                  </div>
                  </div>";
        }
        ?>
    </div>

    <div class="footer">
        <p>This site is designed, hosted, developed, and maintained by EduSite For Smart School (ESSS)</p>
    </div>
</body>

</html>