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

class giangday extends Database {

    public function giangday__Get_All() {
        $obj = $this->connect->prepare("SELECT * FROM giangday");
        $obj->setFetchMode(PDO::FETCH_OBJ);
        $obj->execute();
        return $obj->fetchAll();
    }
    
    public function giangday__Add($id_index, $id_giang_vien, $id_nhom_giang_day,  $ten_mon_hoc, $ten_lop_hoc, $so_sinh_vien, $so_nhom, $so_tiet_mon_hoc, $so_tiet_thuc_giang, $he_so_nhom, $he_so_tin_chi, $so_tiet_quy_chuan) {
        $obj = $this->connect->prepare("INSERT INTO giangday (id_index, id_giang_vien, id_nhom_giang_day,  ten_mon_hoc, ten_lop_hoc, so_sinh_vien, so_nhom, so_tiet_mon_hoc, so_tiet_thuc_giang, he_so_nhom, he_so_tin_chi, so_tiet_quy_chuan) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $obj->execute(array($id_index, $id_giang_vien, $id_nhom_giang_day,  $ten_mon_hoc, $ten_lop_hoc, $so_sinh_vien, $so_nhom, $so_tiet_mon_hoc, $so_tiet_thuc_giang, $he_so_nhom, $he_so_tin_chi, $so_tiet_quy_chuan));
        return $obj->rowCount();
    }

    public function giangday__Update($id_giang_day, $id_index, $id_giang_vien, $id_nhom_giang_day,  $ten_mon_hoc, $ten_lop_hoc, $so_sinh_vien, $so_nhom, $so_tiet_mon_hoc, $so_tiet_thuc_giang, $he_so_nhom, $he_so_tin_chi, $so_tiet_quy_chuan) {
        $obj = $this->connect->prepare("UPDATE giangday SET id_index=?, id_giang_vien=?, id_nhom_giang_day=?,  ten_mon_hoc=?, ten_lop_hoc=?, so_sinh_vien=?, so_nhom=?, so_tiet_mon_hoc=?, so_tiet_thuc_giang=?, he_so_nhom=?, he_so_tin_chi=?, so_tiet_quy_chuan=? WHERE id_giang_day=?");
        $obj->execute(array($id_index, $id_giang_vien, $id_nhom_giang_day,  $ten_mon_hoc, $ten_lop_hoc, $so_sinh_vien, $so_nhom, $so_tiet_mon_hoc, $so_tiet_thuc_giang, $he_so_nhom, $he_so_tin_chi, $so_tiet_quy_chuan, $id_giang_day));
        return $obj->rowCount();
    }
    

    public function giangday__Delete($id_giang_day) {
        $obj = $this->connect->prepare("DELETE FROM giangday WHERE id_giang_day = ?");
        $obj->execute(array($id_giang_day));
        return $obj->rowCount();
    }

  
    public function giangday__Get_By_Id($id_giang_day) {
        $obj = $this->connect->prepare("SELECT * FROM giangday WHERE id_giang_day = ?");
        $obj->setFetchMode(PDO::FETCH_OBJ);
        $obj->execute(array($id_giang_day));
        return $obj->fetch();
    }
    public function giangday__Get_By_Id_Index_And_Id_Giang_Vien_Sum($id_index, $id_giang_vien) {
        $getTk = $this->connect->prepare("SELECT SUM(so_tiet_quy_chuan) AS sum_kq FROM giangday WHERE id_index =? AND id_giang_vien=?");
        $getTk->setFetchMode(PDO::FETCH_OBJ);
        $getTk->execute(array($id_index, $id_giang_vien));
        return $getTk->fetch();
    }

    public function giangday__Get_By_Id_Index_And_Id_Giang_Vien($id_index, $id_giang_vien) {
        $getTk = $this->connect->prepare("SELECT * FROM giangday WHERE id_index =? AND id_giang_vien=?");
        $getTk->setFetchMode(PDO::FETCH_OBJ);
        $getTk->execute(array($id_index, $id_giang_vien));
        return $getTk->fetchAll();
    }
}
?>