<?php
    // get base db code
    require_once "gticks/base-models/models.php";


    // model to CRUD user accounts
    class UserAcct  extends GticksDb{
        public $username;
        public $email;
        public $pswd_hash;
        
        
        /**
         * check whether the object is already saved or not. If saved 
         * just the columns changed
         */
        public $isSaved = false;
        /**
             * as par the user table schema, the username, password and email 
             * are required...other columns set to null by default 
             * or at best, the object won't be saved...ok?
             */
        function __construct(
            $username = NULL,
            $password = NULL ,
            $email = NULL,

        ){
            $this->username = $username;
            $this->pswd_hash = password_hash($password, PASSWORD_DEFAULT);
            $this->email = $email;

            // start the database connectivity engine...
            parent::__construct();
        }
        
        // to save new object of this class to database...
        public function save(){
            if($this->connected){
               if(!($this->isSaved)){
                    try {
                        //code...
                        $userInsertStatement = ($this->connector)->prepare("
                            INSERT INTO acct (username, pswd_hash, email) 
                            VALUES(:usn, :ph, :eml) 
                        ");
                        $userInsertStatement->bindValue(":usn", $this->username);
                        $userInsertStatement->bindValue(":ph", $this->pswd_hash);
                        $userInsertStatement->bindValue(":eml", $this->email);
                        $userInsertStatement->execute();
                        $this->isSaved = true;
                        return 1;
                    } catch (\Throwable $th) {
                        //throw $th;
                        $this->isSaved = false;
                        return -1;
                    }
               }
            }
        }

        public static function get($col, $value, $scope = "*"){
            $db = new GticksDb();
            if($db->connected){
                try {
                    //code...
                    $getStatement = ($db->connector)->query("SELECT $scope FROM acct WHERE $col = '$value' ");
                    $result = $getStatement->fetch(PDO::FETCH_OBJ);
                    return $result;
                } catch (\Throwable $th) {
                    //throw $th;
                    return null;
                }
            }
            else{
                return null;
            }
        }

        public static function find($data, $col="username", $start="0", $amt="3"){
            $db = new GticksDb();
            if($db->connected){
                try {
                    //code...
                    $results = array();
                    $ct = 0;
                    $selectStatement = ($db->connector)->query("SELECT * FROM user WHERE $col LIKE '%$data%'  LIMIT $start, $amt");
                    while ($row = $selectStatement->fetch(PDO::FETCH_OBJ)) {
                        # code...
                        $results[$ct] = $row;
                        $ct = $ct + 1;
                    }
                    return $results;
                   
                } catch (\Throwable $th) {
                    //throw $th;
                    return null;
                }
            }
          
        }
        public static function upauthor($col, $old_value, $new_value){
            $db = new GticksDb();
            if($db->connected){
                try {
                    //code...
                    $count = ($upauthorStatement = ($db->connector)->exec("UPauthor  user  SET $col = '$new_value' WHERE $col = '$old_value'  "));
                    return $count;
                } catch (\Throwable $th) {
                    //throw $th;
                    return null;
                }
            }
            else{
                return null;
            }
        }

        public static function delete($col, $value){
            $db = new GticksDb();
            if($db->connected){
                try {
                    //code...
                    $count = ($deleteStatement = ($db->connector)->exec("DELETE FROM user WHERE $col = '$value' "));
                    return $count;
                } catch (\Throwable $th) {
                    //throw $th;
                    return null;
                }
            }
            else{
                return null;
            }
        }
        // helper functions...end
        
    }

?>