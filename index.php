<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Simple PHP App</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 50px;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 2px 2px 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
        }
        form {
            margin-top: 20px;
            padding-top: 15px;
            border-top: 1px dashed #eee;
        }
        input[type="text"] {
            padding: 10px;
            width: 70%;
            margin-right: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        input[type="submit"] {
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>👋 Welcome to my app!</h1>

        <?php
        // Optional: Check if a question was submitted and display a message (for user clarity)
        if (isset($_GET['your_question']) && $_GET['your_question'] !== '') {
            $question = htmlspecialchars($_GET['your_question']);
            echo "<p style='color: green; font-weight: bold;'>Thank you! Your question was sent via GET: '{$question}'</p>";
        }
        ?>

        <p>This is a simple PHP page demonstrating a GET request to an n8n webhook.</p>

        <form action="https://vjoco.app.n8n.cloud/webhook-test/dc386d8a-013f-4c67-abce-30fce91da038" method="GET">
            <label for="your_question">Your Question:</label>
            <input type="text" id="your_question" name="your_question" placeholder="Enter your question here..." required>
            <input type="submit" value="Submit to n8n Webhook">
        </form>
        
        <p style="font-size: small; color: #666; margin-top: 20px;">
            **Form Action Breakdown:**<br>
            - **Method:** `GET` (sends data in the URL query string)<br>
            - **Action URL:** `https://vjoco.app.n8n.cloud/webhook-test/dc386d8a-013f-4c67-abce-30fce91da038`<br>
            - **Input Name:** `your_question`
        </p>
    </div>

</body>
</html>
