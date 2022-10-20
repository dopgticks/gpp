<?php
  require_once "gticks/base-controllers/core.php";
  require_once "gticks/settings.php";
  // start request object
  $request = new Request();
  

  $where2go = "404";
  // check for appropriate 'app' to further hamdle the request
  foreach ($installedApps as $controller => $appUri) {
      if($appUri == $request->controllerUri){
        $where2go = $controller;
      }
  }
  // return 404 page if no 'app' can handle the request
  if($where2go == "404"){
    echo "<h1> APP NOT FOUND </h1>";
  }
  else{
      // call sub routes
    if(file_exists($where2go."/urls.php")){
      require_once $where2go."/urls.php";
      if(isset($urlpatterns)){
        $finalHandler = function(){ echo "<h1> REQUEST HANDLER NOT FOUND </h1>";};
        foreach ($urlpatterns as $subPath => $viewFunction) {
          # code...
          if(!empty(preg_match($subPath, $request->subroute, $xmatch))){
            $finalHandler = $viewFunction;
            break;
          }
        }
        // run the handler function
        $finalHandler($request, $xmatch);
      }
      else{
        echo "<h1> PATTERN NOT MATCHED </h1>";
      }

    }
    else{
      echo "<h1> APP URL CONFIG NOT FOUND </h1>";
    }
    
  }



  
 
  












 
 
?>