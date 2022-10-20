<?php
    //require_once "gticks/base-controllers/core2.php";
    require_once "views.php"; // functionalities for the app


    $urlpatterns = [
        "/^$/" => $homePage,
        "/^404$/" => $fourOfour
    ];

?>