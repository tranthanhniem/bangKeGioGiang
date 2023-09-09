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

class congviec extends Database {

    public function congviec__Get_All() {
        $obj = $this->connect->prepare("SELECT * FROM congviec");
        $obj->setFetchMode(PDO::FETCH_OBJ);
        $obj->execute();
        return $obj->fetchAll();
    }
    
    public function congviec__Add($id_index, $id_giang_vien, $id_quy_doi, $ten_cong_viec, $quy_doi_so_tiet, $so_luong, $tong_so_tiet) {
        $obj = $this->connect->prepare("INSERT INTO congviec (id_index, id_giang_vien, id_quy_doi, ten_cong_viec, quy_doi_so_tiet, so_luong, tong_so_tiet) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $obj->execute(array($id_index, $id_giang_vien, $id_quy_doi, $ten_cong_viec, $quy_doi_so_tiet, $so_luong, $tong_so_tiet));
        return $obj->rowCount();
    }

    public function congviec__Update($id_cong_viec, $id_index, $id_giang_vien, $id_quy_doi, $ten_cong_viec, $quy_doi_so_tiet, $so_luong, $tong_so_tiet) {
        $obj = $this->connect->prepare("UPDATE congviec SET  id_index=?, id_giang_vien=?, id_quy_doi=?, ten_cong_viec=?, quy_doi_so_tiet=?, so_luong=?, tong_so_tiet=? WHERE id_cong_viec = ?");
        $obj->execute(array($id_index, $id_giang_vien, $id_quy_doi, $ten_cong_viec, $quy_doi_so_tiet, $so_luong, $tong_so_tiet, $id_cong_viec));
        return $obj->rowCount();
    }
    

    public function congviec__Delete($id_cong_viec) {
        $obj = $this->connect->prepare("DELETE FROM congviec WHERE id_cong_viec = ?");
        $obj->execute(array($id_cong_viec));
        return $obj->rowCount();
    }

  
    public function congviec__Get_By_Id($id_cong_viec) {
        $obj = $this->connect->prepare("SELECT * FROM congviec WHERE id_cong_viec = ?");
        $obj->setFetchMode(PDO::FETCH_OBJ);
        $obj->execute(array($id_cong_viec));
        return $obj->fetch();
    }

    public function congviec__Get_By_Id_Giang_Vien_And_Id_Index_Sum($id_giang_vien, $id_index) {
        $obj = $this->connect->prepare("SELECT sum(tong_so_tiet) AS sum_kq FROM congviec WHERE id_giang_vien=? AND id_index=?");
        $obj->setFetchMode(PDO::FETCH_OBJ);
        $obj->execute(array($id_giang_vien, $id_index));
        return $obj->fetch();
    }
    public function congviec__Get_By_Id_Giang_Vien_And_Id_Index($id_giang_vien, $id_index) {
        $obj = $this->connect->prepare("SELECT * FROM congviec WHERE id_giang_vien=? AND id_index=?");
        $obj->setFetchMode(PDO::FETCH_OBJ);
        $obj->execute(array($id_giang_vien, $id_index));
        return $obj->fetchAll();
    }

    
    public function congviec__Delete_Gv_Index($id_giang_vien, $id_index) {
        $obj = $this->connect->prepare("DELETE FROM congviec WHERE id_giang_vien=? AND id_index = ?");
        $obj->execute(array($id_giang_vien, $id_index));
        return $obj->rowCount();
    }

}
?>