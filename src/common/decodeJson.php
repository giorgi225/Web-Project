<?php 
 // Read the JSON file 
 $json = file_get_contents("../courses/courses.json");
    
 // Decode the JSON file
 $json_data = json_decode($json,true);
?>