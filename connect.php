<?php
    class connect{
        public $server;
        public $user;
        public $password;
        public $dbname;

        public function __construct()
        {
            $this->server ="vkh7buea61avxg07.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
            $this->user ="jaw1cplxdznwevu4";
            $this->password ="w9mvmzzr3m6w2q2v";
            $this->dbname = "zxhowk6gl6iu8f8h";
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
    $conn = mysqli_connect('vkh7buea61avxg07.cbetxkdyhwsb.us-east-1.rds.amazonaws.com','jaw1cplxdznwevu4','w9mvmzzr3m6w2q2v','zxhowk6gl6iu8f8h') or die("can not connect database" .mysqli_connect_error());
?>
