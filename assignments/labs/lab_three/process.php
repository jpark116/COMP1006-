<?php

require 'index.php';
// Sanatizing user input data. 
// names and message containing no special characters.
$fName = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_SPECIAL_CHARS);
$lName = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_SPECIAL_CHARS);
$message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS);

//email address correct format.
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
//variable for bakery email address
$bakeryEmail = 'bakery@info.com';

//automatic subject for email being sent.
$subject = 'New Message from Customer';

//Putting senders first and last name in the email.
$header = 'From:' . $fName . ' ' . $lName . '';

// Validate all form fields for correct information format and send email returning success messsage, otherwise terminate script returning error message.
// Validate first name.
if($fName == null || $fName == ''){
        echo 'The field for first name is empty.';
        exit;
        }       
        elseif($lName == null || $lName == ''){
            echo 'The field for last name is empty.';
            exit;
            }
            
            elseif($email == null || $email == ''){
                echo 'The field for email is empty.';
                exit;
            }
                
                elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    echo 'The field for email is not a valid email address.';                    
                    exit;
                }
                        elseif($message == null || $message == ''){
                            echo'The field for message is empty.';
                            exit;
                        } 
                            else{
                                echo 'The email has been sent to the bakery.';
                                
                                //sending email to bakery email address if there are no errors.
                                mail($bakeryEmail, $subject, $message, $header);
                                exit;
                            }


?>