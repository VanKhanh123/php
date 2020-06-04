<?php
   // IDEA:
    // lớp xử lý kết nối và truy vấn cơ sở dữ liệu 
    class Db
    {
        protected static $connection;
        public function connect(){
            if(!isset(self::$connection)){
                $config = parse_ini_file("config.ini");
                // kết nối csdl mySql qua mysqli extension 
                self::$connection = new mysqli("localhost",$config["username"],$config["password"], $config["databasename"]);
            }
            // xử lý lỗi nếu ko kết nối được database 
            if(self::$connection==false){
                return false;
            }
            return self::$connection;
        }
        // hàm thực hiện câu lệnh truy vấn 
        public function query_execute($queryString){
            // khoi tao ket noi 
            $connection = $this->connect();
            
            // thực hiện execute truy vấn 
            $result = $connection->query($queryString);
            $connection->close();
            return $result;
        }
        // hàm trả về 1 mảng kết quả 
        public function select_to_array($queryString){
            $rows = array();
            $result = $this->query_execute($queryString);
            if($result==false){
                return false;
            }
            while($item = $result->fetch_assoc()){
                $rows[]=$item;
            }
            return $rows;
        }
    }

?>