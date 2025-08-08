
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
        <a href="enquiry_form.php">Register Issue</a>
        <a href="logout.php">Logout</a>
    </div><!-- Chatbot Container -->
<div id="chatbot-container" style="position: fixed; top: 55%; left: 50%; transform: translate(-50%, -50%); width: 400px; background: white; border: 1px solid #ccc; border-radius: 10px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); z-index: 1000;">
    <!-- Chatbot Header -->
    <div style="background: #198dcb; color: white; padding: 10px; border-top-left-radius: 10px; border-top-right-radius: 10px;">
        <strong>ESSS Assistant</strong>
    </div>
    <!-- Chatbot Messages -->
    <div id="chatbot-messages" style="height: 300px; overflow-y: auto; padding: 10px;">
        <p><strong style="color: green;">ESSS Assistant:</strong> Hi! I'm ESSS Assistance. How can I help you today?</p>
    </div>
    <!-- Chatbot Input -->
    <div style="padding: 10px; border-top: 1px solid #ccc;">
        <input type="text" id="chatbot-input" placeholder="Type your message..." style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px;">
        <button id="send-message" style="margin-top: 5px; padding: 8px 12px; background: #198dcb; color: white; border: none; border-radius: 5px; cursor: pointer;">Send</button>
    </div>
</div>

<!-- JavaScript for Chatbot Interaction -->
<script>
    let conversationState = null; // Declare conversationState globally

    // Function to send a message
    function sendMessage() {
        const input = document.getElementById('chatbot-input').value;
        if (input.trim() !== '') {
            // Display user message
            const userMessage = `<p style="margin-top:6px;margin-bottom:6px;"><strong style="color: blue;">You:</strong> ${input}</p>`;
            document.getElementById('chatbot-messages').innerHTML += userMessage;

            // Clear input
            document.getElementById('chatbot-input').value = '';

            // Simulate chatbot response
            setTimeout(() => {
                const botResponse = `<p><strong style="color: green;">ESSS Assistant:</strong> ${getChatbotResponse(input)}</p>`;
                document.getElementById('chatbot-messages').innerHTML += botResponse;
                // Scroll to bottom
                document.getElementById('chatbot-messages').scrollTop = document.getElementById('chatbot-messages').scrollHeight;
            }, 500);
        }
    }

    // Send message on button click
    document.getElementById('send-message').addEventListener('click', sendMessage);

    // Send message on Enter key press
    document.getElementById('chatbot-input').addEventListener('keypress', function(event) {
        if (event.key === 'Enter') {
            sendMessage();
        }
    });

    // Function to generate chatbot responses
    function getChatbotResponse(input) {
        const lowerInput = input.toLowerCase();

        // Recognize the student's name
        if (lowerInput.includes("i'm") || lowerInput.includes("im") || lowerInput.includes('my name is')) {
            const name = extractName(input);
            return `Hi ${name}, how can I help you?`;
        }

        // Handle conversation state
        if (lowerInput.includes('my school name') ) {
             // Reset state
            const schoolName = extractSchoolName(input); // Extract school name
            return `Okay, your school ${schoolName}. We understand your situation and will help to solve your complaints. Do you have any other complaints?`;
        }


        else if (lowerInput.includes('thanks') || lowerInput.includes('thank you')) {
            return 'You’re welcome! Let me know if you need further assistance.';
        }
        else if (lowerInput.includes('thanks') || lowerInput.includes('thank')|| lowerInput.includes('thank you') && lowerInput.includes('bro')) {
            return 'You’re welcome! Let me know if you need further assistance.';
        }

        if (lowerInput.includes("bro") && lowerInput.includes("no")) {
            return 'Okay bro I’m here to help! If you have any issues, feel free to ask or <a href="enquiry_form.php">register your complaint here</a>.';

        }
        if (lowerInput.includes("bro") && lowerInput.includes("thank")) {
            return 'Okay bro I’m here to help! If you have any issues, feel free to ask or <a href="enquiry_form.php">register your complaint here</a>.';

        }
        if (lowerInput.includes("bro")) {
            return `Hi Bro how can I help you?`;
        }
        if (lowerInput.includes("hi")) {
            return `Hi how can I help you?`;
        }

        if (lowerInput.includes("hello")) {
            return `Hello how can I help you?`;
        }
        if (lowerInput.includes("hey")) {
            return `Hey how can I help you?`;
        }
       
        if (lowerInput.includes("issue") ||lowerInput.includes("complain") ||lowerInput.includes("enquiry")  && lowerInput.includes("school")) {
            return `I'm so sorry to hear that you're having some issues in your school. Can you please tell me more about what's going on? What kind of issue are you facing? Is it related to academics, facilities, or something else?`;
        }
        
        
        // Predefined questions and answers
        if (lowerInput.includes('noisy') && lowerInput.includes('classroom')) {
            return 'I understand that the classroom is noisy. Can you please tell me your school name and district?';
        } else if (lowerInput.includes('toilet') && lowerInput.includes('clean')) {
            return 'I’m sorry to hear that the toilets are not clean. Can you please tell me your school name and district?';
        } else if (lowerInput.includes('classroom') && lowerInput.includes('clean')) {
            return 'I’m sorry to hear that the classroom are not clean.Can you please tell me your school name and district?';
        } else if (lowerInput.includes('light') && lowerInput.includes('corridor')) {
            return 'Please report the issue with the corridor lights to the school maintenance team or <a href="enquiry_form.php">register a complaint here</a>.';
        } else if (lowerInput.includes('bus') && lowerInput.includes('late')) {
            return 'I understand that the school bus is often late. We will look into this issue. You can also <a href="enquiry_form.php">register a complaint here</a>.';
        } else if (lowerInput.includes('library') && lowerInput.includes('lunch')) {
            return 'The library should be open during lunch hours. Please inform the librarian or <a href="enquiry_form.php">register a complaint here</a>.';
        } else if (lowerInput.includes('food') && lowerInput.includes('quality')) {
            return 'I’m sorry to hear that the food quality is not good. Please <a href="enquiry_form.php">register a complaint here</a> so we can address this issue.';
        } else if (lowerInput.includes('teacher') && lowerInput.includes('absent')) {
            return 'If your teacher is frequently absent, please inform the principal or <a href="enquiry_form.php">register a complaint here</a>.';
        } else if (lowerInput.includes('water') && lowerInput.includes('drinking')) {
            return 'I understand that there is an issue with the drinking water. Please <a href="enquiry_form.php">register a complaint here</a> so we can address this issue.';
        } else if (lowerInput.includes('playground') && lowerInput.includes('maintenance')) {
            return 'I’m sorry to hear that the playground is not well-maintained. Please <a href="enquiry_form.php">register a complaint here</a> so we can address this issue.';
        } else if (lowerInput.includes('uniform') && lowerInput.includes('issue')) {
            return 'If you have any issues with the school uniform, please contact the administration or <a href="enquiry_form.php">register a complaint here</a>.';
        } else if (lowerInput.includes('exam') && lowerInput.includes('schedule')) {
            return 'You can check the exam schedule on the school notice board or the official website. If you have further questions, please <a href="enquiry_form.php">register a complaint here</a>.';
        } else if (lowerInput.includes('homework') && lowerInput.includes('too much')) {
            return 'I understand that the homework load is heavy. Please discuss this with your teacher or <a href="enquiry_form.php">register a complaint here</a>.';
        } else if (lowerInput.includes('classroom') && lowerInput.includes('hot')) {
            return 'I’m sorry to hear that the classroom is too hot. Please <a href="enquiry_form.php">register a complaint here</a> so we can address this issue.';
        } else if (lowerInput.includes('classroom') && lowerInput.includes('cold')) {
            return 'I’m sorry to hear that the classroom is too cold. Please <a href="enquiry_form.php">register a complaint here</a> so we can address this issue.';
        } else if (lowerInput.includes('bullying') && lowerInput.includes('school')) {
            return 'Bullying is a serious issue. Please report it to a teacher or the principal immediately. You can also <a href="enquiry_form.php">register a complaint here</a>.';
        } else if (lowerInput.includes('internet') && lowerInput.includes('not working')) {
            return 'I understand that the internet is not working. Please inform the IT department or <a href="enquiry_form.php">register a complaint here</a>.';
        } else if (lowerInput.includes('project') && lowerInput.includes('deadline')) {
            return 'If you need an extension for your project deadline, please discuss it with your teacher or <a href="enquiry_form.php">register a complaint here</a>.';
        } else if (lowerInput.includes('sports') && lowerInput.includes('equipment')) {
            return 'I’m sorry to hear that there is an issue with the sports equipment. Please <a href="enquiry_form.php">register a complaint here</a> so we can address this issue.';
        } else if (lowerInput.includes('transport') && lowerInput.includes('issue')) {
            return 'If you are facing transportation issues, please contact the transport department or <a href="enquiry_form.php">register a complaint here</a>.';
        } else if (lowerInput.includes('fees') && lowerInput.includes('issue')) {
            return 'If you have any issues regarding fees, please contact the accounts department or <a href="enquiry_form.php">register a complaint here</a>.';
        } else if (lowerInput.includes('classroom') && lowerInput.includes('chair')) {
            return 'I’m sorry to hear that there is an issue with the classroom chairs. Please <a href="enquiry_form.php">register a complaint here</a> so we can address this issue.';
        } else if (lowerInput.includes('classroom') && lowerInput.includes('desk')) {
            return 'I’m sorry to hear that there is an issue with the classroom desks. Please <a href="enquiry_form.php">register a complaint here</a> so we can address this issue.';
        } else if (lowerInput.includes('canteen') && lowerInput.includes('food')) {
            return 'I’m sorry to hear that there is an issue with the canteen food. Please <a href="enquiry_form.php">register a complaint here</a> so we can address this issue.';
        } else if (lowerInput.includes('lab') && lowerInput.includes('equipment')) {
            return 'I’m sorry to hear that there is an issue with the lab equipment. Please <a href="enquiry_form.php">register a complaint here</a> so we can address this issue.';
        } else if (lowerInput.includes('library') && lowerInput.includes('books')) {
            return 'If you are facing issues with library books, please inform the librarian or <a href="enquiry_form.php">register a complaint here</a>.';
        } else if (lowerInput.includes('classroom') && lowerInput.includes('fan')) {
            return 'I’m sorry to hear that the classroom fan is not working. Please <a href="enquiry_form.php">register a complaint here</a> so we can address this issue.';
        } else if (lowerInput.includes('classroom') && lowerInput.includes('light')) {
            return 'I’m sorry to hear that the classroom lights are not working. Please <a href="enquiry_form.php">register a complaint here</a> so we can address this issue.';
        } else if (lowerInput.includes('classroom') && lowerInput.includes('window')) {
            return 'I’m sorry to hear that there is an issue with the classroom windows. Please <a href="enquiry_form.php">register a complaint here</a> so we can address this issue.';
        } else if (lowerInput.includes('classroom') && lowerInput.includes('door')) {
            return 'I’m sorry to hear that there is an issue with the classroom door. Please <a href="enquiry_form.php">register a complaint here</a> so we can address this issue.';
        } else if (lowerInput.includes('classroom') && lowerInput.includes('blackboard')) {
            return 'I’m sorry to hear that there is an issue with the classroom blackboard. Please <a href="enquiry_form.php">register a complaint here</a> so we can address this issue.';
        } else if (lowerInput.includes('no') || lowerInput.includes('no other')) {
            return 'You can register your complaint using our form. We will help to solve your problem. Please <a href="enquiry_form.php">register a complaint here</a>.';
        } else {
            return 'I’m here to help! If you have any issues, feel free to ask or <a href="enquiry_form.php">register your complaint here</a>.';
        }
    }
    // Function to extract the student's name
    function extractName(input) {
        const words = input.split(' ');
        const index = words.findIndex(word => word.toLowerCase() === "i'm" || word.toLowerCase() === 'is');
        if (index !== -1 && index + 1 < words.length) {
            return words[index + 1];
        }
        return 'there';
    }

    // Function to extract the school name
    function extractSchoolName(input) {
        const words = input.split(' ');
        const index = words.findIndex(word => word.toLowerCase() === 'school' || word.toLowerCase() === 'name');
        if (index !== -1 && index + 1 < words.length) {
            return words.slice(index + 1).join(' '); // Return the rest of the sentence as the school name
        }
        return input; // If no keyword is found, return the entire input
    }
</script>
<div class="footer">
        <p>This site is designed, hosted, developed, and maintained by EduSite For Smart School (ESSS)</p>
    </div>
</body>

</html>

