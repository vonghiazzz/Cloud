<?php
    class connect{
        public $server;
        public $user;
        public $password;
        public $dbname;

        public function __construct()
        {
            $this->server ="z5zm8hebixwywy9d.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
            $this->user ="cev6kijbcpz2ra4o";
            $this->password ="skgoth8aq5v5kddd";
            $this->dbname = "s5yxpv5bouui5a45";
        }
        //option 1: use mySQLi
        function connectToMySQL(): mysqli{
            $conn_my = new mysqli($this->server,$this->user,$this->password,$this->dbname);
            if($conn_my->connect_error){
                die("failed" .$conn_my->connect_error);
            }else{
                // echo "connect!!";
            }
            return $conn_my;
        }
        //option 2: connect video
        function connectToPDO(): PDO{
            try{
                $conn_pdo = new PDO
                ("mysql:host=$this->server;dbname=$this->dbname",$this->user,$this->password);
                // echo "connect to PDO";
            }catch(PDOException $e){
                die("failed $e");
            }
            return $conn_pdo;
        }
    }
    // //test connect
    $conn = mysqli_connect('z5zm8hebixwywy9d.cbetxkdyhwsb.us-east-1.rds.amazonaws.com','cev6kijbcpz2ra4o','skgoth8aq5v5kddd','s5yxpv5bouui5a45') or die("can not connect database" .mysqli_connect_error());
?>
