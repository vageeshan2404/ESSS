<?php
session_start();
include "database.php";

// Handle chatbot message submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['chatbot_message'])) {
    $user_name = "Student"; // Default name for chatbot enquiries
    $user_email = "chatbot@esss.com"; // Default email for chatbot enquiries
    $message = $_POST['message'];
    $school_id = 1; // Default school ID (you can modify this as needed)

    // Log the received message
    error_log("Received message: " . $message);

    // Insert the user's message into the database
    $query = "INSERT INTO chat_messages (school_id, user_name, user_email, message) VALUES (?, ?, ?, ?)";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("isss", $school_id, $user_name, $user_email, $message);
    $stmt->execute();

    // Log the insertion result
    if ($stmt->affected_rows > 0) {
        error_log("User message saved successfully.");
    } else {
        error_log("Failed to save user message.");
    }

    // Generate a reply from the chatbot
    $reply = generateChatbotReply($message); // Call a function to generate a reply
    error_log("Generated reply: " . $reply);

    // Insert the chatbot's reply into the database
    $query = "INSERT INTO chat_messages (school_id, user_name, user_email, message) VALUES (?, ?, ?, ?)";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("isss", $school_id, 'Chatbot', 'chatbot@esss.com', $reply);
    $stmt->execute();

    // Log the insertion result
    if ($stmt->affected_rows > 0) {
        error_log("Chatbot reply saved successfully.");
    } else {
        error_log("Failed to save chatbot reply.");
    }

    echo json_encode(['status' => 'success']);
    exit;
}

// Function to generate a chatbot reply
function generateChatbotReply($message) {
    // Simple logic to generate a reply based on the user's message
    $message = strtolower($message); // Convert message to lowercase for easier matching

    if (strpos($message, 'hello') !== false || strpos($message, 'hi') !== false) {
        return "Hello! How can I assist you today?";
    } elseif (strpos($message, 'how are you') !== false) {
        return "I'm just a chatbot, but I'm here to help you!";
    } elseif (strpos($message, 'thank you') !== false) {
        return "You're welcome! Let me know if you need further assistance.";
    } else {
        return "Thank you for your message! We will get back to you shortly.";
    }
}

// Fetch chat messages
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['fetch_chat'])) {
    $school_id = 1; // Default school ID (you can modify this as needed)

    $query = "SELECT * FROM chat_messages WHERE school_id = ? ORDER BY created_at ASC";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("i", $school_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $messages = [];
    while ($row = $result->fetch_assoc()) {
        $messages[] = $row;
    }

    echo json_encode($messages);
    exit;
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
  <link rel="stylesheet" href="styles.css">
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
            <p>(Smart School forz Smart Society)</p>
        </div>
    </div>

    <div class="nav">
        <a href="index.php">Home</a>
        <a href="find-school.html">Find School</a>
        <a href="enquiry_page.php">School Enquiry</a>
        <a href="about-us.html">About Us</a>
    </div>

    <div class="enquiry-container">
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
                    <p class='status'><strong>Status:</strong> {$enquiry['status']}</p>";
            if ($enquiry['image_path']) {
                echo "<img src='{$enquiry['image_path']}' alt='Enquiry Image'>";
            }
            echo "</div>";
        }
        ?>
    </div>



    <div class="footer">
        <p>This site is designed, hosted, developed, and maintained by EduSite For Smart School (ESSS)</p>
    </div>
   
</body>

</html>