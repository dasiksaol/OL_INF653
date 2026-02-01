<?php

    echo "<pre>";
    $input = 2024;
    echo "Input: " , $input;
    
    if (($input % 4 == 0 && $input % 100 != 0) || ($input % 400 == 0)){
        echo "\nOutput: " , $input , " is a leap year.";
    }
    else {
        echo "\nOutput: " , $input , " is a NOT leap year.";
    }

    echo "</pre>";
?>