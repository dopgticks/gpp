<?php
       require_once "views.php"; // functionalities for the app


       $urlpatterns = [
           "/^$/" => $postsHome,
           "/^comments\/$/" => $postFinder
       ];
?>