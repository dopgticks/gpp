<?php
   require_once "models.php";

   $login = function($request, $dataset){
      $result = UserAcct::get("username", "Phychemma");
      print_r($result);
   };
   $signUp = function($request, $dataset){
      echo "<h1> This is the sign up page </h1>";
   };
?>