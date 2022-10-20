<?php
        /**
     *  The file MUST be private and 'encription-centric'  as it contains all that makes the 
     *  App to work anyway... 
     *  It contains the variables, constants and values fundatmental to the App
     */

    define("DB_NAME", "gnkdb");
    define("DB_ENGINE", "mysql");
    define("DB_HOST", "localhost");
    define("DB_USER", "root");
    define("DB_PASS", "");
    define("LOG_FILE", "log.txt");

    // installed apps[sub-project codes]
    $installedApps = [
        "app_default" => "",
        "app_auth" => "auth",
        "app_notifications" => "notifications",
        "app_userposts" => "posts",
      ];
?>