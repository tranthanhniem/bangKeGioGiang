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

class nhomcongviec extends Database {

    public function nhomcongviec__Get_All() {
        $obj = $this->connect->prepare("SELECT * FROM nhomcongviec");
        $obj->setFetchMode(PDO::FETCH_OBJ);
        $obj->execute();
        return $obj->fetchAll();
    }
    
    public function nhomcongviec__Add($ten_nhom_cong_viec, $ghi_chu) {
        $obj = $this->connect->prepare("INSERT INTO nhomcongviec(ten_nhom_cong_viec, ghi_chu) VALUES (?,?)");
        $obj->execute(array($ten_nhom_cong_viec, $ghi_chu));
        return $obj->rowCount();
    }

    public function nhomcongviec__Update($id_nhom_cong_viec, $ten_nhom_cong_viec, $ghi_chu) {
        $obj = $this->connect->prepare("UPDATE nhomcongviec SET ten_nhom_cong_viec=?, ghi_chu=? WHERE id_nhom_cong_viec=?");
        $obj->execute(array($ten_nhom_cong_viec, $ghi_chu, $id_nhom_cong_viec));
        return $obj->rowCount();
    }
    

    public function nhomcongviec__Delete($id_nhom_cong_viec) {
        $obj = $this->connect->prepare("DELETE FROM nhomcongviec WHERE id_nhom_cong_viec = ?");
        $obj->execute(array($id_nhom_cong_viec));
        return $obj->rowCount();
    }

  
    public function nhomcongviec__Get_By_Id($id_nhom_cong_viec) {
        $obj = $this->connect->prepare("SELECT * FROM nhomcongviec WHERE id_nhom_cong_viec = ?");
        $obj->setFetchMode(PDO::FETCH_OBJ);
        $obj->execute(array($id_nhom_cong_viec));
        return $obj->fetch();
    }

}
?>