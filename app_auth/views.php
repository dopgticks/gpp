<?php
   require_once "gticks/base-controllers/core.php";
   require_once "models.php";

   $login = function($request, $dataset){
      $result = UserAcct::get("username", "Phychemma");
      return new Response("Hello World in Response class");
   };
   $signUp = function($request, $dataset){
      if($request->method == "GET"){
         return render($request, "signup.html", array(
            "data1" => "Daniel"
         ));
      }
      else{
         // register a user
         $dataset = $request->POST;
         $username = "";
         if(isset($dataset["password"])){
            $username = htmlentities($dataset["username"], ENT_QUOTES);
         }
         $email = "";
         if(isset($dataset["email"])){
            $email = htmlentities($dataset["email"], ENT_QUOTES);
         }
         $password = "";
         if(isset($dataset["password"])){
            $password = htmlentities($dataset["password"], ENT_QUOTES);
         }
         
         $newUser = new UserAcct($username, $email, $password);
         $state = $newUser->save();
         if($state == 1){
            echo json_encode(array("registered" => "true"));
         }
         else{
            echo json_encode(array("registered" => "false"));
         }
      }
      
   };

   $sVerifyer = function($request, $dataset){
      //data only in http POST request is processed
      if($request->method == "POST"){
         if(isset($dataset[1])){
            try {
               //code...
               $val = $dataset[1];
            switch ($val) {
               case 'username':
                  # code...
                  $result = UserAcct::get("username", $request->POST["username"]);
                  if($result){
                     echo 1;
                  }
                  else{
                     echo 0;
                  }
                  break;
               case 'email':
                  $result = UserAcct::get("email", $request->POST["email"]);
                  if($result){
                     echo 1;
                  }
                  else{
                     echo 0;
                  }
                  break;
               default:
                  # code...
                  break;
            }
            } catch (\Throwable $th) {
               //throw $th;
               echo -1;
            }
         }
      }
      else{
         echo "<h1>Error: use htttp POST method</h1>";
      }
   };
?>