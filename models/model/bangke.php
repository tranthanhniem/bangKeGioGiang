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

class bangke extends Database {

    public function bangke__Get_All() {
        $obj = $this->connect->prepare("SELECT * FROM bangke");
        $obj->setFetchMode(PDO::FETCH_OBJ);
        $obj->execute();
        return $obj->fetchAll();
    }
    
    public function bangke__Add($id_index, $id_giang_vien, $noi_dung, $sum_giang_day, $sum_nckh, $sum_kq) {
        $obj = $this->connect->prepare("INSERT INTO bangke(id_index, id_giang_vien, noi_dung, sum_giang_day, sum_nckh, sum_kq) VALUES (?,?,?,?,?,?)");
        $obj->execute(array($id_index, $id_giang_vien, $noi_dung, $sum_giang_day, $sum_nckh, $sum_kq));
        return $obj->rowCount();
    }

    public function bangke__Update($id_bang_ke, $id_index, $id_giang_vien, $noi_dung, $sum_giang_day, $sum_nckh, $sum_kq) {
        $obj = $this->connect->prepare("UPDATE bangke SET id_index=?, id_giang_vien=?, noi_dung=?, sum_giang_day=?, sum_nckh=?, sum_kq=? WHERE id_bang_ke=?");
        $obj->execute(array($id_index, $id_giang_vien, $noi_dung, $sum_giang_day, $sum_nckh, $sum_kq, $id_bang_ke));
        return $obj->rowCount();
    }
    

    public function bangke__Delete($id_bang_ke) {
        $obj = $this->connect->prepare("DELETE FROM bangke WHERE id_bang_ke = ?");
        $obj->execute(array($id_bang_ke));
        return $obj->rowCount();
    }

  
    public function bangke__Get_By_Id($id_bang_ke) {
        $obj = $this->connect->prepare("SELECT * FROM bangke WHERE id_bang_ke = ?");
        $obj->setFetchMode(PDO::FETCH_OBJ);
        $obj->execute(array($id_bang_ke));
        return $obj->fetch();
    }
  
    public function bangke__Get_By_Index_Gv($id_index, $id_giang_vien) {
        $obj = $this->connect->prepare("SELECT * FROM bangke WHERE id_index = ? AND id_giang_vien=?" );
        $obj->setFetchMode(PDO::FETCH_OBJ);
        $obj->execute(array($id_index, $id_giang_vien));
        return $obj->fetchAll();
    }

    public function bangke__Delete_Index_Gv($id_index, $id_giang_vien) {
        $obj = $this->connect->prepare("DELETE FROM bangke WHERE id_index=? AND id_giang_vien = ?");
        $obj->execute(array($id_index, $id_giang_vien));
        return $obj->rowCount();
    }
    public function bangke__Get_By_Index_Gv_SUM($id_index, $id_giang_vien) {
        $obj = $this->connect->prepare("SELECT * FROM bangke WHERE id_index = ? AND id_giang_vien=? ORDER BY id_bang_ke DESC LIMIT 1" );
        $obj->setFetchMode(PDO::FETCH_OBJ);
        $obj->execute(array($id_index, $id_giang_vien));
        return $obj->fetch();
    }

}
?>