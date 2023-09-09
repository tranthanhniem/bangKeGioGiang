<?php

$a = "./models/configs/config.php";
$b = "../models/configs/config.php";
$c = "../../models/configs/config.php";
$d = "../../../models/configs/config.php";
$e = "../../../../models/configs/config.php";

if (file_exists($a)) {
    $des = $a;
}
if (file_exists($b)) {
    $des = $b;
}
if (file_exists($c)) {
    $des = $c;
} 
if (file_exists($d)) {
    $des = $d;
} 

if (file_exists($e)) {
    $des = $e;
} 
include_once($des);

class dongia extends Database {

    public function dongia__Get_All() {
        $obj = $this->connect->prepare("SELECT * FROM dongia");
        $obj->setFetchMode(PDO::FETCH_OBJ);
        $obj->execute();
        return $obj->fetchAll();
    }
    
    public function dongia__Add($don_gia, $ghi_chu) {
        $obj = $this->connect->prepare("INSERT INTO dongia(don_gia, ghi_chu) VALUES (?,?)");
        $obj->execute(array($don_gia, $ghi_chu));
        return $obj->rowCount();
    }

    public function dongia__Update($id_don_gia, $don_gia, $ghi_chu) {
        $obj = $this->connect->prepare("UPDATE dongia SET don_gia=?, ghi_chu=? WHERE id_don_gia=?");
        $obj->execute(array($don_gia, $ghi_chu, $id_don_gia));
        return $obj->rowCount();
    }
    

    public function dongia__Delete($id_don_gia) {
        $obj = $this->connect->prepare("DELETE FROM dongia WHERE id_don_gia = ?");
        $obj->execute(array($id_don_gia));
        return $obj->rowCount();
    }

  
    public function dongia__Get_By_Id($id_don_gia) {
        $obj = $this->connect->prepare("SELECT * FROM dongia WHERE id_don_gia = ?");
        $obj->setFetchMode(PDO::FETCH_OBJ);
        $obj->execute(array($id_don_gia));
        return $obj->fetch();
    }
    public function dongia__Get_Last() {
        $obj = $this->connect->prepare("SELECT * FROM dongia ORDER BY id_don_gia DESC LIMIT 1");
        $obj->setFetchMode(PDO::FETCH_OBJ);
        $obj->execute();
        return $obj->fetch();
    }
}
?>