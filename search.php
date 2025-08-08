<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ESSS - Search Results</title>
    <link rel="icon" href="Essslogo (2).png">
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #c9d6ff;
            background: linear-gradient(to right, #e2e2e2, #c9d6ff);
        }

        .head {
            width: 100%;
            height: 100px;
            background-color: rgb(242, 236, 236);
            display: flex;
            align-items: center;
            padding: 0 20px;
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
        }

        .header p {
            font-size: 14px;
            margin-top: 5px;
        }

        .nav {
            background-color: #198dcb;
            width: 100%;
            height: 45px;
            display: flex;
            align-items: center;
            padding: 0 20px;
        }

        .list {
            display: flex;
            gap: 25px;
        }

        .list a {
            color: white;
            text-decoration: none;
            font-size: 18px;
        }

        .list a:hover {
            color: #EEA200;
            transition: 0.3s;
        }

        .footer {
            width: 100%;
            height: 70px;
            background-color: #198dcb;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
            position: fixed;
            bottom: 0;
        }

        .footer p {
            color: white;
            font-size: 16px;
        }

        .container1 button {
            padding: 8px 16px;
            border: none;
            border-radius: 5px;
            background-color: red;
            color: white;
            cursor: pointer;
            transition: 0.3s;
        }

        .container1 button:hover {
            background-color: skyblue;
        }

        .search-results {
            margin: 40px auto;
            padding: 20px;
            max-width: 700px;
            text-align: center;
        }

        .school-card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            margin: 20px 0;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: left;
        }

        .school-card h2 {
            color: #00698f;
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
            cursor: pointer;
        }

        .school-card img {
            width: 100%;
            max-width: 900px;
            height: auto;
            border-radius: 10px;
            margin-bottom: 20px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        .details-table {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            border-collapse: collapse;
            display: none; /* Hide details by default */
        }

        .details-table td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }

        .details-table td:first-child {
            width: 40%;
            color: #198dcb;
            display: flex;
            align-items: center;
            white-space: nowrap;
        }

        .details-table td:first-child i {
            margin-right: 10px;
            color: #198dcb;
            width: 20px;
            text-align: center;
        }

        .details-table td:last-child {
            width: 60%;
            color: #333;
        }

        .no-results {
            text-align: center;
            font-size: 18px;
            color: #666;
            margin-bottom: 20px;
        }

        .register-prompt {
            text-align: center;
            font-size: 20px;
            color: #333;
            margin: 40px 0;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .school-card {
                padding: 15px;
            }

            .school-card h2 {
                font-size: 22px;
            }

            .details-table td {
                font-size: 16px;
            }

            .school-card img {
                max-width: 500px;
            }
        }

        @media (max-width: 576px) {
            .school-card {
                padding: 10px;
            }

            .school-card h2 {
                font-size: 20px;
            }

            .details-table td {
                font-size: 14px;
            }

            .school-card img {
                max-width: 400px;
            }
        }
        #img{
            width:300%;
            margin-left:40%;
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
        <div class="list">
            <a href="index.php">Home</a>
            <a href="find-school.html">Find School</a>
            <a href="about-us.html">About Us</a>
        </div>
    </div>

    <?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "login";

    $mysqli = new mysqli($host, $user, $pass, $db);

    if ($mysqli->connect_error) {
        echo 'Failed to connect to database: ' . $mysqli->connect_error;
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $district = $_POST['inputDistrict'] ?? '';
        $block = $_POST['inputBlock'] ?? '';
        $schoolType = $_POST['smanaged'] ?? '';

        // Build the query based on selected filters
        $query = "SELECT * FROM school_data WHERE district = ? AND block = ?";
        if (!empty($schoolType)) {
            $query .= " AND management = ?";
        }

        $stmt = $mysqli->prepare($query);
        if (!empty($schoolType)) {
            $stmt->bind_param("sss", $district, $block, $schoolType);
        } else {
            $stmt->bind_param("ss", $district, $block);
        }
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo '<div class="search-results">';
            while ($row = $result->fetch_assoc()) {
                echo '<div class="school-card">';
                echo '<h2 onclick="toggleDetails(this)">' . $row['school_name'] . '</h2>';
                echo '<table class="details-table">';
                if (!empty($row['school_image'])) {
                    echo '<tr><td colspan="2"><img id="img" src="' . $row['school_image'] . '" alt="School Image"></td></tr>';
                } else {
                    echo '<tr><td colspan="2"><img src="default-school-image.jpg" alt="Default School Image"></td></tr>';
                }
                echo '<tr><td><i class="fas fa-school"></i>School Name:</td><td>' . $row['school_name'] . '</td></tr>';
                echo '<tr><td><i class="fas fa-phone"></i>School Contact:</td><td>' . $row['school_contact'] . '</td></tr>';
                echo '<tr><td><i class="fas fa-envelope"></i>School Email:</td><td>' . $row['school_email'] . '</td></tr>';
                echo '<tr><td><i class="fas fa-map-marker-alt"></i>Location:</td><td>' . $row['district'] . ', ' . $row['block'] . '</td></tr>';
                echo '<tr><td><i class="fas fa-code"></i>UDISE Code:</td><td>' . $row['udise_code'] . '</td></tr>';
                echo '<tr><td><i class="fas fa-venus-mars"></i>Gender:</td><td>' . $row['gender'] . '</td></tr>';
                echo '<tr><td><i class="fas fa-building"></i>Management:</td><td>' . $row['management'] . '</td></tr>';
                echo '<tr><td><i class="fas fa-school"></i>Level of Schooling:</td><td>' . $row['level_of_schooling'] . '</td></tr>';
                echo '<tr><td><i class="fas fa-chalkboard"></i>Class Start From:</td><td>' . $row['class_start_from'] . '</td></tr>';
                echo '<tr><td><i class="fas fa-map-pin"></i>Pincode:</td><td>' . $row['pincode'] . '</td></tr>';
                echo '<tr><td><i class="fas fa-users"></i>Students:</td><td>' . $row['no_of_students'] . '</td></tr>';
                echo '<tr><td><i class="fas fa-chalkboard-teacher"></i>Teachers:</td><td>' . $row['no_of_teachers'] . '</td></tr>';
                echo '<tr><td><i class="fas fa-door-open"></i>Class Rooms:</td><td>' . $row['class_rooms'] . '</td></tr>';
                echo '<tr><td><i class="fas fa-door-closed"></i>Other Rooms:</td><td>' . $row['other_rooms'] . '</td></tr>';
                echo '<tr><td><i class="fas fa-toilet"></i>Toilets:</td><td>' . $row['no_of_toilets'] . '</td></tr>';
                echo '<tr><td><i class="fas fa-wifi"></i>Internet:</td><td>' . $row['internet'] . '</td></tr>';
                echo '</table>';
                echo '</div>';
            }
            echo '</div>';
        } else {
            echo '<div class="no-results">No results found.</div>';
            echo ' <div class="register-prompt">
        <h2>You can register your school and store the details to display on the webpage.</h2>
    </div>';
        }
    }

    $mysqli->close();
    ?>

   

    <footer>
        <div class="footer">
            <p>This site is designed, hosted, developed, and maintained by<br>EduSite For Smart School (ESSS)</p>
        </div>
    </footer>

    <script>
        // JavaScript for Expand/Collapse Functionality
        function toggleDetails(element) {
            const detailsTable = element.nextElementSibling;
            if (detailsTable.style.display === 'none' || detailsTable.style.display === '') {
                detailsTable.style.display = 'table';
            } else {
                detailsTable.style.display = 'none';
            }
        }
    </script>
</body>

</html>