<?php
     require_once "views.php"; // functionalities for the app


     $urlpatterns = [
         "/^login\/$/" => $login,
         "/^signup\/$/" => $signUp,
         "/^signup\/verify\/([a-z]+)\/$/" => $sVerifyer
         
     ];
?>