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

class quydoi extends Database {

    public function quydoi__Get_All() {
        $obj = $this->connect->prepare("SELECT * FROM quydoi");
        $obj->setFetchMode(PDO::FETCH_OBJ);
        $obj->execute();
        return $obj->fetchAll();
    }
    
    public function quydoi__Add($id_nhom_cong_viec, $ma_cong_viec, $ten_cong_viec, $dieu_kien, $quy_doi_so_tiet) {
        $obj = $this->connect->prepare("INSERT INTO quydoi(id_nhom_cong_viec, ma_cong_viec, ten_cong_viec, dieu_kien, quy_doi_so_tiet) VALUES (?,?,?,?,?)");
        $obj->execute(array($id_nhom_cong_viec, $ma_cong_viec, $ten_cong_viec, $dieu_kien, $quy_doi_so_tiet));
        return $obj->rowCount();
    }

    public function quydoi__Update($id_quy_doi, $id_nhom_cong_viec, $ma_cong_viec, $ten_cong_viec, $dieu_kien, $quy_doi_so_tiet) {
        $obj = $this->connect->prepare("UPDATE quydoi SET id_nhom_cong_viec=?, ma_cong_viec=?, ten_cong_viec=?, dieu_kien=?, quy_doi_so_tiet=? WHERE id_quy_doi=?");
        $obj->execute(array($id_nhom_cong_viec, $ma_cong_viec, $ten_cong_viec, $dieu_kien, $quy_doi_so_tiet, $id_quy_doi));
        return $obj->rowCount();
    }
    

    public function quydoi__Delete($id_quy_doi) {
        $obj = $this->connect->prepare("DELETE FROM quydoi WHERE id_quy_doi = ?");
        $obj->execute(array($id_quy_doi));
        return $obj->rowCount();
    }

  
    public function quydoi__Get_By_Id($id_quy_doi) {
        $obj = $this->connect->prepare("SELECT * FROM quydoi WHERE id_quy_doi = ?");
        $obj->setFetchMode(PDO::FETCH_OBJ);
        $obj->execute(array($id_quy_doi));
        return $obj->fetch();
    }

}
?>