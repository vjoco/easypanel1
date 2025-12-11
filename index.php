<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Simple PHP App - AJAX Submission</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
        #ajax-result {
            margin-top: 20px;
            padding: 15px;
            min-height: 50px; /* Gives the div a bit of height */
            border: 1px solid #ddd;
            border-radius: 4px;
            background-color: #f9f9f9;
            text-align: left;
        }
        .success {
            border-color: green;
            color: green;
        }
        .error {
            border-color: red;
            color: red;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>👋 Welcome to my AJAX app!</h1>

        <p>This page demonstrates an **AJAX GET request** to an n8n webhook.</p>

        <form id="ajax-form">
            <label for="your_question">Your Question:</label>
            <input type="text" id="your_question" name="your_question" placeholder="Enter your question here..." required>
            <input type="submit" value="Submit via AJAX">
        </form>
        
        <h3>AJAX Response:</h3>
        <div id="ajax-result">
            <p>Awaiting form submission...</p>
        </div>
        
        <p style="font-size: small; color: #666; margin-top: 20px;">
            **AJAX Action Breakdown:**<br>
            - **Method:** `GET`<br>
            - **Action URL:** `https://vjoco.app.n8n.cloud/webhook-test/dc386d8a-013f-4c67-abce-30fce91da038`<br>
            - **Input Name:** `your_question`
        </p>
    </div>

    <script>
        $(document).ready(function() {
            // Target the form using its ID
            $('#ajax-form').submit(function(e) {
                // Prevent the default form submission (which would cause a page reload)
                e.preventDefault();
                
                // Get the data from the form (automatically handles serialization)
                var formData = $(this).serialize();
                
                // Define the webhook URL
                var webhookUrl = "https://vjoco.app.n8n.cloud/webhook-test/dc386d8a-013f-4c67-abce-30fce91da038";
                
                // Update the result area to show loading state
                $('#ajax-result').html('<p style="color: #007bff;">Sending data... please wait.</p>').removeClass('success error');

                // Perform the AJAX GET request
                $.ajax({
                    type: "GET", // Use the GET method as in the original form
                    url: webhookUrl,
                    data: formData, // Data from the form (e.g., your_question=value)
                    
                    // Function to run if the request succeeds (status code 200-299)
                    success: function(response) {
                        console.log("Success response:", response);
                        // Convert the response to a formatted JSON string for display
                        var responseText = JSON.stringify(response, null, 2);
                        
                        $('#ajax-result').html('**✅ Submission Successful!**<pre>' + responseText + '</pre>')
                                          .addClass('success');
                    },
                    
                    // Function to run if the request fails (e.g., network error, status code 4xx/5xx)
                    error: function(xhr, status, error) {
                        console.error("AJAX Error:", status, error);
                        var errorMessage = "**❌ Submission Failed!**<br>Status: " + status + "<br>Error: " + error + "<br>Response Text: " + xhr.responseText.substring(0, 100) + "...";
                        
                        $('#ajax-result').html(errorMessage)
                                          .addClass('error');
                    }
                });
            });
        });
    </script>

</body>
</html>
