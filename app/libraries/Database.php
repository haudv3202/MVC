<?php

class Database {
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;

    private $pdo;
    private $SqlQuery;
    public function __construct(){
        $option = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try {
            $this->pdo = new PDO("mysql:host=". $this->host."; dbname=".$this->dbname,$this->user,$this->pass,$option);
        }
        catch (PDOException $e){
            dd($e->getMessage());
        }
    }
//    Chuẩn bị câu lệnh để truy xuất
    public function setQuery($sql) {
        $this->SqlQuery = $this->pdo->prepare($sql);
    }

// Ràng buộc giá trị
    public function bind($param, $value, $type = null){
        if(is_null($type)){
            switch(true){
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }

        $this->SqlQuery->bindValue($param, $value, $type);
    }

    // Chạy câu lệnh truy vấn
    public function setQueryEx(){
        return $this->SqlQuery->execute();
    }

    // Truy xuất nhiều bản ghi
    public function allRecord(){
        $this->setQueryEx();
        return $this->SqlQuery->fetchAll(PDO::FETCH_OBJ);
    }

    // Truy xuất 1 bản ghi
    public function oneRecord(){
        $this->setQueryEx();
        return $this->SqlQuery->fetch(PDO::FETCH_OBJ);
    }

    // Đếm bản ghi
    public function rowCount(){
        return $this->SqlQuery->rowCount();
    }

//    Trả về id của bản ghi vừa được thêm vào
    public function getLastId() {
        return $this->pdo->lastInsertId();
    }

//    Ngắt kết nối
    public function disconnect() {
        $this->pdo = NULL;
    }

}