<?php
    /**
     *  since every request controller need the 
     *   knowledge of user identity in some ways
     *  , so start session anyway
     */
    session_start();
    // import configuration settings
    require_once "gticks/settings.php";

    
    class GticksDb{
        public $connected = false;
        public $connector = NULL; 
        public $table = "";
        function __construct(){
            try {
                //code...
                $this->connector = new PDO(DB_ENGINE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
                $this->connector->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->connected = true;
            } catch (\Throwable $th) {
                //log the errors in a log file
                
                if(file_exists(LOG_FILE)){
                    $handle = fopen(LOG_FILE, "a+");
                    fwrite($handle, "unable to connect to db...");
                    fclose($handle);
                }
            }
        }
    }
    class Data{
        // class to dynamically aggregate a set of data items
    }

    


    
?>