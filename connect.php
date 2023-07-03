<?php
    class connect{
        public $server;
        public $user;
        public $password;
        public $dbname;

        public function __construct()
        {
            $this->server ="ble5mmo2o5v9oouq.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
            $this->user ="l5fihvvl8qrhw5nk";
            $this->password ="vlruyt655hiicqeo";
            $this->dbname = "saxflxlyujv02qq2";
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
    $conn = mysqli_connect('ble5mmo2o5v9oouq.cbetxkdyhwsb.us-east-1.rds.amazonaws.com','l5fihvvl8qrhw5nk','vlruyt655hiicqeo','saxflxlyujv02qq2') or die("can not connect database" .mysqli_connect_error());
?>
