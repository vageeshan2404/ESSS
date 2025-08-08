<?php
session_start();
include("database.php");

if (!isset($_SESSION['student_id'])) {
    header('Location: student_loginpage.php');
    exit();
}

$student_id = $_SESSION['student_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Handle enquiry submission
    if (isset($_POST['school_name'])) {
        $school_name = $_POST['school_name'];
        $school_district = $_POST['school_district'];
        $school_block = $_POST['school_block'];
        $school_address = $_POST['school_address'];
        $enquiry_text = $_POST['enquiry_text'];

        // Handle image upload
        $image_path = null;
        if (isset($_FILES['enquiry_image']) && $_FILES['enquiry_image']['error'] == 0) {
            $target_dir = "uploads/";
            if (!is_dir($target_dir)) {
                mkdir($target_dir, 0777, true);
            }
            $target_file = $target_dir . basename($_FILES['enquiry_image']['name']);
            if (move_uploaded_file($_FILES['enquiry_image']['tmp_name'], $target_file)) {
                $image_path = $target_file;
            }
        }

        // Insert enquiry with student_id
        $query = "INSERT INTO enquiries (school_name, school_district, school_block, school_address, enquiry_text, image_path, student_id) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param("ssssssi", $school_name, $school_district, $school_block, $school_address, $enquiry_text, $image_path, $student_id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "<script>alert('Enquiry submitted successfully!');</script>";
        } else {
            echo "<script>alert('Error submitting enquiry.');</script>";
        }
    }

    // Handle delete enquiry
    if (isset($_POST['delete_enquiry'])) {
        $enquiry_id = $_POST['enquiry_id'];
        $query = "DELETE FROM enquiries WHERE id = ? AND student_id = ?";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param("ii", $enquiry_id, $student_id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "<script>alert('Enquiry deleted successfully!');</script>";
        } else {
            echo "<script>alert('Error deleting enquiry.');</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enquiry Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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

        .form-container {
            background: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 500px;
            margin: 20px auto;
        }

        .form-container h1 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
            text-align: center;
        }

        .form-container input,
        .form-container textarea,
        .form-container .file-upload {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            transition: border-color 0.3s ease;
        }

        .form-container input:focus,
        .form-container textarea:focus {
            border-color: #6a11cb;
            outline: none;
        }

        .form-container .file-upload {
            padding: 10px;
            background: #f9f9f9;
            border: 1px dashed #ddd;
            text-align: center;
            cursor: pointer;
        }

        .form-container .file-upload input[type="file"] {
            display: none;
        }

        .form-container .file-upload label {
            color: #6a11cb;
            cursor: pointer;
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

        .enquiry-container {
            background: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 700px;
            margin: 20px auto;
            margin-bottom:100px;
        }

        .enquiry-container h1 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
            text-align: center;
        }

        .enquiry-item {
            border-bottom: 1px solid #ddd;
            padding: 15px 0;
        }

        .enquiry-item:last-child {
            border-bottom: none;
        }

        .enquiry-item p {
            margin: 5px 0;
        }

        .enquiry-item .status {
            font-weight: bold;
            color: #6a11cb;
        }

        .enquiry-item .actions {
            margin-top: 10px;
        }

        .enquiry-item .actions button {
            padding: 5px 10px;
            background: #6a11cb;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .enquiry-item .actions button:hover {
            background: #2575fc;
        }

        .enquiry-item img {
            width: 400px; /* Fixed width */
            height: 400px; /* Fixed height */
            object-fit: cover; /* Ensures the image fits within the dimensions */
            border-radius: 10px;
            margin-top: 10px;
            display: block;
            margin-left: auto;
            margin-right: auto;
            border: 2px solid #ddd;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
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
            }

            .form-container h1 {
                font-size: 22px;
            }

            .form-container input,
            .form-container textarea,
            .form-container .file-upload {
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
                margin-top: 80px;
                margin-bottom: 80px;
            }

            .form-container h1 {
                font-size: 20px;
            }

            .form-container input,
            .form-container textarea,
            .form-container .file-upload {
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
        <a href="enquiry_form.php">Register Enquiry</a>
        <a href="logout.php">Logout</a>
    </div>

    <div class="form-container">
        <h1>Complaint Form</h1>
        <form method="POST" enctype="multipart/form-data">
            <input type="text" name="school_name" placeholder="School Name" required>
            <input type="text" name="school_district" placeholder="School District" required>
            <input type="text" name="school_block" placeholder="School Block" required>
            <textarea name="school_address" placeholder="School Address" rows="3" required></textarea>
            <textarea name="enquiry_text" placeholder="Your Issue" rows="5" required></textarea>
            <div class="file-upload">
                <label for="enquiry_image">Upload Image</label>
                <input type="file" name="enquiry_image" id="enquiry_image">
            </div>
            <button type="submit">Submit Issue</button>
        </form>
    </div>
<br><br>
<hr>
    <div class="enquiry-container">
        <h1>Registered Issue</h1>
        <?php
        // Fetch enquiries for the logged-in student
        $query = "SELECT * FROM enquiries WHERE student_id = ? ORDER BY created_at DESC";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param("i", $student_id);
        $stmt->execute();
        $enquiries = $stmt->get_result();

        while ($enquiry = $enquiries->fetch_assoc()) {
            echo "<div class='enquiry-item'>
                    <p><strong>School Name:</strong> {$enquiry['school_name']}</p>
                    <p><strong>District:</strong> {$enquiry['school_district']}</p>
                    <p><strong>Block:</strong> {$enquiry['school_block']}</p>
                    <p><strong>Address:</strong> {$enquiry['school_address']}</p>
                    <p><strong>Issue:</strong> {$enquiry['enquiry_text']}</p>
                    <p class='status'><strong>Status:</strong> {$enquiry['status']}</p>";
            if ($enquiry['image_path']) {
                echo "<img src='{$enquiry['image_path']}' alt='Enquiry Image'>";
            }
            echo "<div class='actions'>
                    <form method='POST' style='display:inline;'>
                        <input type='hidden' name='enquiry_id' value='{$enquiry['id']}'>
                        <button type='submit' name='delete_enquiry'>Delete</button>
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

