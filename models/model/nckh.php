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

class nckh extends Database {

    public function nckh__Get_All() {
        $obj = $this->connect->prepare("SELECT * FROM nckh");
        $obj->setFetchMode(PDO::FETCH_OBJ);
        $obj->execute();
        return $obj->fetchAll();
    }
    
    public function nckh__Add($id_index, $id_giang_vien, $noi_dung, $the_loai, $so_tiet_quy_chuan) {
        $obj = $this->connect->prepare("INSERT INTO nckh (id_index, id_giang_vien, noi_dung, the_loai, so_tiet_quy_chuan) VALUES (?,?,?,?,?)");
        $obj->execute(array($id_index, $id_giang_vien, $noi_dung, $the_loai, $so_tiet_quy_chuan));
        return $obj->rowCount();
    }

    public function nckh__Update($id_nckh, $id_index, $id_giang_vien, $noi_dung, $the_loai, $so_tiet_quy_chuan) {
        $obj = $this->connect->prepare("UPDATE nckh SET id_index=?, id_giang_vien=?,  noi_dung=?, the_loai=?, so_tiet_quy_chuan=? WHERE id_nckh=?");
        $obj->execute(array($id_index, $id_giang_vien, $noi_dung, $the_loai, $so_tiet_quy_chuan, $id_nckh));
        return $obj->rowCount();
    }
    

    public function nckh__Delete($id_nckh) {
        $obj = $this->connect->prepare("DELETE FROM nckh WHERE id_nckh = ?");
        $obj->execute(array($id_nckh));
        return $obj->rowCount();
    }

  
    public function nckh__Get_By_Id($id_nckh) {
        $obj = $this->connect->prepare("SELECT * FROM nckh WHERE id_nckh = ?");
        $obj->setFetchMode(PDO::FETCH_OBJ);
        $obj->execute(array($id_nckh));
        return $obj->fetch();
    }
    public function nckh__Get_By_Id_Index_And_Id_Giang_Vien_Sum($id_index, $id_giang_vien) {
        $getTk = $this->connect->prepare("SELECT SUM(so_tiet_quy_chuan) AS sum_kq  FROM nckh WHERE id_index =? AND id_giang_vien=?");
        $getTk->setFetchMode(PDO::FETCH_OBJ);
        $getTk->execute(array($id_index, $id_giang_vien));
        return $getTk->fetch();
    }

    public function nckh__Get_By_Id_Index_And_Id_Giang_Vien($id_index, $id_giang_vien) {
        $getTk = $this->connect->prepare("SELECT *  FROM nckh WHERE id_index =? AND id_giang_vien=?");
        $getTk->setFetchMode(PDO::FETCH_OBJ);
        $getTk->execute(array($id_index, $id_giang_vien));
        return $getTk->fetchAll();
    }
}
?>