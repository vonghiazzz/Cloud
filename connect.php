<?php
    class connect{
        public $server;
        public $user;
        public $password;
        public $dbname;

        public function __construct()
        {
            $this->server ="xlf3ljx3beaucz9x.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
            $this->user ="g96ziuwqlvhgyz3x";
            $this->password ="vjbzog61ylzj83zb";
            $this->dbname = "k1yw3v00olo34gbu";
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
    $conn = mysqli_connect('xlf3ljx3beaucz9x.cbetxkdyhwsb.us-east-1.rds.amazonaws.com','g96ziuwqlvhgyz3x','vjbzog61ylzj83zb','k1yw3v00olo34gbu') or die("can not connect database" .mysqli_connect_error());
?>
