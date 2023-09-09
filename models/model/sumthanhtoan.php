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

class sumthanhtoan extends Database {

    public function sumthanhtoan__Get_All() {
        $obj = $this->connect->prepare("SELECT * FROM sumthanhtoan");
        $obj->setFetchMode(PDO::FETCH_OBJ);
        $obj->execute();
        return $obj->fetchAll();
    }
    
    public function sumthanhtoan__Add($id_index, $id_giang_vien, $id_don_gia, $so_tiet, $don_gia, $thanh_tien) {
        $obj = $this->connect->prepare("INSERT INTO sumthanhtoan(id_index, id_giang_vien, id_don_gia, so_tiet, don_gia, thanh_tien) VALUES (?,?,?,?,?,?)");
        $obj->execute(array($id_index, $id_giang_vien, $id_don_gia, $so_tiet, $don_gia, $thanh_tien));
        return $obj->rowCount();
    }

    public function sumthanhtoan__Update($id_sum_thanh_toan, $id_index, $id_giang_vien, $id_don_gia, $so_tiet, $don_gia, $thanh_tien) {
        $obj = $this->connect->prepare("UPDATE sumthanhtoan SET id_index=?, id_giang_vien=?, id_don_gia=?, so_tiet=?, don_gia=?, thanh_tien=? WHERE id_sum_thanh_toan=?");
        $obj->execute(array($id_index, $id_giang_vien, $id_don_gia, $so_tiet, $don_gia, $thanh_tien, $id_sum_thanh_toan));
        return $obj->rowCount();
    }
    

    public function sumthanhtoan__Delete($id_sum_thanh_toan) {
        $obj = $this->connect->prepare("DELETE FROM sumthanhtoan WHERE id_sum_thanh_toan = ?");
        $obj->execute(array($id_sum_thanh_toan));
        return $obj->rowCount();
    }

  
    public function sumthanhtoan__Get_By_Id($id_sum_thanh_toan) {
        $obj = $this->connect->prepare("SELECT * FROM sumthanhtoan WHERE id_sum_thanh_toan = ?");
        $obj->setFetchMode(PDO::FETCH_OBJ);
        $obj->execute(array($id_sum_thanh_toan));
        return $obj->fetch();
    }
    public function sumthanhtoan__Get_By_Index_Giang_Vien($id_index, $id_giang_vien) {
        $obj = $this->connect->prepare("SELECT * FROM sumthanhtoan WHERE id_index =? AND id_giang_vien = ?");
        $obj->setFetchMode(PDO::FETCH_OBJ);
        $obj->execute(array($id_index, $id_giang_vien));
        return $obj->fetchAll();
    }
    public function sumthanhtoan__Delete_Index_Giang_Vien($id_index, $id_giang_vien) {
        $obj = $this->connect->prepare("DELETE FROM sumthanhtoan WHERE id_index = ? AND id_giang_vien = ?");
        $obj->execute(array($id_index, $id_giang_vien));
        return $obj->rowCount();
    }
}
?>