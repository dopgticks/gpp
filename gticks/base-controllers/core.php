
<?php
    require_once "core2.php";
    /**
     *  the Request object is created on every http request. It can be modified by 'middleware' codes
     *  
     */

    class Request{
        public $uri = "/";
        public $controllerUri = "";
        public $subroute = "";
        public $method = "GET";
        public $is_authenticated = false;
        public $POST = array();
        public $GET  = array();
        public $FILES = array();
        public $userid = NULL;
        

        function __construct(){
            // for Apache Server 
            if(isset($_SERVER["REQUEST_URI"])){
                $this->uri = $_SERVER["REQUEST_URI"];
            }
            if(isset($_SERVER["REQUEST_METHOD"])){
                $this->method = $_SERVER["REQUEST_METHOD"];
            }
            // authentication check
            if(isset($_SESSION["user"])){
                $this->userid = $_SESSION["user"];
                $this->is_authenticated = true;
            }
            // populate dataset
            $this->POST = $_POST;
            $this->GET = $_GET;
            $this->FILES = $_FILES;
            //split url into components
            $result = urlSplitter($this->uri);
            $this->controllerUri = $result[0];
            $this->subroute = $result[1];

        }
    }






    class Router{
        public static function rootRoute($apps, $url){

        }
    }


    class Response{
        function __construct($data)
        {
            echo $data;
        }
    }
    class JsonResponse{
        function __construct($Object)
        {
            $jsonData = json_encode($Object);
            echo $jsonData;
        }
    }

    function render($request, $template, $dataset){
        /**
         *  putting data to template is not production ready
         */
        $path = "templates/".$template;
        if(file_exists($path)){
            require_once $path;
        }
        else{
            echo "template not found";
        }
    }





?>