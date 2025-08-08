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
    $school_name = $_POST['sname'];
    $school_contact = $_POST['scontact'];
    $school_email = $_POST['semail'];
    $state = $_POST['inputState'] ?? '';
    $district = $_POST['inputDistrict'] ?? '';
    $udise_code = $_POST['udise'];
    $gender = $_POST['gender'];
    $management = $_POST['smanaged'];
    $block = $_POST['inputBlock'] ?? '';
    $ward = $_POST['sward'];
    $level_of_schooling = $_POST['level'];
    $class_start_from = $_POST['sclass'];
    $pincode = $_POST['spincode'];
    $no_of_students = $_POST['snostudents'];
    $no_of_teachers = $_POST['steachers'];
    $class_rooms = $_POST['sclassrooms'];
    $other_rooms = $_POST['otherrooms'];
    $no_of_toilets = $_POST['stoilets'];
    $internet = $_POST['sinternet'];

    // Handle file upload
    if (isset($_FILES['simage'])) {
        $file_name = $_FILES['simage']['name'];
        $file_tmp = $_FILES['simage']['tmp_name'];
        $file_type = $_FILES['simage']['type'];
        $file_size = $_FILES['simage']['size'];
        $file_error = $_FILES['simage']['error'];

        if ($file_error === 0) {
            $upload_dir = 'uploads/';
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0755, true);
            }
            $file_destination = $upload_dir . basename($file_name);
            move_uploaded_file($file_tmp, $file_destination);
        } else {
            echo "Error uploading file.";
            exit();
        }
    } else {
        echo "No file uploaded.";
        exit();
    }

    $query = "INSERT INTO school_data (school_name, school_contact, school_email, state, district, udise_code, gender, management, block, ward, level_of_schooling, class_start_from, pincode, no_of_students, no_of_teachers, class_rooms, other_rooms, no_of_toilets, internet, school_image) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("ssssssssssssssssssss", $school_name, $school_contact, $school_email, $state, $district, $udise_code, $gender, $management, $block, $ward, $level_of_schooling, $class_start_from, $pincode, $no_of_students, $no_of_teachers, $class_rooms, $other_rooms, $no_of_toilets, $internet, $file_destination);
    $stmt->execute();
    $stmt->close();
    header('Location: index.php');
    exit();
}

$mysqli->close();
?>