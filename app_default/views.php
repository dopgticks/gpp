<?php
    //require_once dirname("index.php");
    $homePage = function($requestObj){
        require_once "templates/home.html";
        
    };
    $fourOfour = function($requestObj){
        echo "<h1> 404 Not Found";
    };
?>