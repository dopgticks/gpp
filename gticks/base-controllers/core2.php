<?php

    function urlSplitter($uri){
    
        $result = "";
        // let's trim the string...to avoid some of the stories that 'touch' the heart
        $result = trim($uri);
        if(!(($result[strlen($result)-1]) == "/")){
            $result[strlen($result)] = "/";
        }
        $appLevelUri = "";
        $appSubroute = ""; 
        // check whether it's just a slash or not and make empty value the default 
    
       
        preg_match("/^(\/)$/", $result, $rootLevelMatch);
        
        preg_match("/^\/([^\/]+)\/$/", $result, $appLevelMatch);
    
        preg_match("/^\/([^\/]+)\/(.+)$/", $result, $subRouteLevelMatch);
    
        if((!empty($rootLevelMatch)) && (empty($appLevelMatch)) && (empty($subRouteLevelMatch))){
          $appLevelUri = "";
          $subroute = "";
        }
        else if((empty($rootLevelMatch)) && (!empty($appLevelMatch)) && (empty($subRouteLevelMatch))){
          $appLevelUri = $appLevelMatch[1];
          $subroute = "";
        }
        else if((empty($rootLevelMatch)) && (empty($appLevelMatch)) && (!empty($subRouteLevelMatch))){
          
          $appLevelUri = $subRouteLevelMatch[1];
          $subroute = $subRouteLevelMatch[2];
    
        }
        //let's see what's in there...
        return array($appLevelUri, $subroute);
        
      }

      // url path function
      function path($pattern, $viewFunction){
        echo $request->method;
      }






?>