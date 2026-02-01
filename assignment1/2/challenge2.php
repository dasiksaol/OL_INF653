<?php

    echo "<pre>";
    $input = 7;
    echo "Input: " , $input , "\n";
    echo "\nOutput: ";

    if ($input % 2 == 0){
        echo $input , " is an even number.";
    }
    else {
        echo $input , " is an odd number.";
    }
    echo "</pre>";
?>