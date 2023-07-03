<?php
    class connect{
        public $server;
        public $user;
        public $password;
        public $dbname;

        public function __construct()
        {
            $this->server ="ble5mmo2o5v9oouq.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
            $this->user ="kth7qzy8deejmp7n";
            $this->password ="e2tj51b1pobbqv41";
            $this->dbname = "mqxxywyl7w7l3tyb";
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
    $conn = mysqli_connect('ble5mmo2o5v9oouq.cbetxkdyhwsb.us-east-1.rds.amazonaws.com','kth7qzy8deejmp7n','e2tj51b1pobbqv41','mqxxywyl7w7l3tyb') or die("can not connect database" .mysqli_connect_error());
?>
