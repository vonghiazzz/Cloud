<?php
    class connect{
        public $server;
        public $user;
        public $password;
        public $dbname;

        public function __construct()
        {
            $this->server ="co28d739i4m2sb7j.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
            $this->user ="pciadufp1ynar5hz";
            $this->password ="q584ffpwxp7gor0b";
            $this->dbname = "cr286orjpy0k0i81";
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
    $conn = mysqli_connect('co28d739i4m2sb7j.cbetxkdyhwsb.us-east-1.rds.amazonaws.com','pciadufp1ynar5hz','q584ffpwxp7gor0b','cr286orjpy0k0i81') or die("can not connect database" .mysqli_connect_error());
?>
