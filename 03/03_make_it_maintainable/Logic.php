<?php
//Create a new file to separate logic and html


//store loop in a function so I can call it where I want on my page.
    function menu(){
        $items = ["Home", "About", "Contact"];
        foreach ($items as $item) {
             echo '<li>'. $item .'</li>'; 
        }

    }
 ?>
