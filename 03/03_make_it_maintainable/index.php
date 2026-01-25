<!--One thing that I learned during this lab was that making functions to repeat code and placing them in a separate file keeps the html layout cleaner.
This would be useful in the course project because they will be working with templates that will need to be replicated in an efficient way.

<!--embed my logic into index file to be used inside of html.-->

<?php require 'logic.php'?>


<!DOCTYPE html>
<html>
<head>
    <title>My PHP Page</title>
</head>
<body>

<h1>Welcome</h1>

<ul>
    <!--call my menu function inside body of html and under unordered list tag.-->
    <?php menu() ?>
</ul>


<footer>
    <p>&copy; 2026</p>
</footer>

</body>
</html>
