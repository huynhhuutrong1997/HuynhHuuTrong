<?php 
    class Database
    {
        private $hostname='localhost';
        private $username='root';
        private $pass='';
        private $dbname='shopmultisellerv1';
        private $conn = NULL;
        private $result = NULL;

        public function connect(){
            $this->conn = new mysqli($this->hostname, $this->username, $this->pass, $this->dbname);
            if(!$this->conn){
                echo "ô hay, gì thế này !";
                return false;
            }
            else{
                // mysqli_set_charset($this->conn,'utf-8');
                $this->conn->query('set names "utf8"');
            }
            return $this->conn;
        }
//thực hiện câu lệnh truy vấn
        public function execute($sql){
            $this->result=$this->conn->query($sql);
            return $this->result;
        }
        //lấy dữ liệu
        function getData(){
            if ($this->result) {
                $data= mysqli_fetch_array($this->result);
            }
            else{
                $data=0;
            }
            return $data;
        }
        function num_rows(){
            if ($this->result) {
                $num = mysqli_num_rows($this->result);
            }
            else {
                $num=0;
            }
            return $num;
        }
        // lấy toàn bộ dữ liệu
        public function getAllData($sql){
            $this->execute($sql);
            if($this->num_rows()==0){
                $data=array();
            }
            else {
                while ($datas=$this->getData()){
                    $data[]=$datas;
                }
            }
            return $data;

        }
        public function insertLKH($sql){
            $this->execute($sql);
        }
        public function querysql($sql){
            $this->execute($sql);
        }
        public function getAllHistory($sql){
            // $sql="SELECT * FROM $table";
            $this->execute($sql);
            if($this->num_rows()==0){
                $data=null;
            }
            else {
                while ($datas=$this->getData()){
                    $data[]=$datas;
                }
            }
            return $data;

        }
        public function querydb($sql){
            // $sql="SELECT * FROM $table";
            $this->execute($sql);
            if($this->num_rows()==0){
                $data=null;
            }
            else {
                while ($datas=$this->getData()){
                    $data[]=$datas;
                }
            }
            return $data;

        }
    }
?>