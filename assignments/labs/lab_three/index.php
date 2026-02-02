<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Email Form</title>
    <link rel="stylesheet" href="email.css">
</head>
<body>
<!-- Create form for email -->
<form action="process.php" method="post">

    <fieldset id="nameFieldset">
        
        <div>
            <label for="first_name">First Name:</label>
            <input type="text" name="first_name" id="first_name" required>
        </div>
        <div>
            <label for="last_name">Last Name:</label>
            <input type="text" name="last_name" id="last_name" required>
        </div>
        <div>
            <label for="email">Email Address:</label>
            <input type="email" name="email" id="email" required>
        </div>

    </fieldset>


    <fieldset id="messageFieldset">
    
        <label for="message">Message:</label>
        <textarea name="message" id="message" placeholder="Enter your message here." required></textarea>

    </fieldset>
    <div>
        <!-- For submitting all form data.-->
        <button type="submit" id="submitButton">Submit</button>
    </div>

</form>