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

//making sure first name is not empty.
if($fName == null || $fName == ''){
        echo 'The field for first name is empty.';
        exit;
        }       
        //making sure last name is not empty.
        elseif($lName == null || $lName == ''){
            echo 'The field for last name is empty.';
            exit;
            }
            //making sure email address is not empty.
            elseif($email == null || $email == ''){
                echo 'The field for email is empty.';
                exit;
            }
                //making sure email address is proper format before sending.
                elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    echo 'The field for email is not a valid email address.';                    
                    exit;
                }
                        //making sure message is not empty.
                        elseif($message == null || $message == ''){
                            echo'The field for message is empty.';
                            exit;
                        } 
                            else{

                                echo 'Information successfully submitted. Email will be sent to info@bakery.com';
                                
                                //sending email to bakery email address if there are no errors.
                                mail($bakeryEmail, $subject, $message, $header);
                                exit;
                            }


?>