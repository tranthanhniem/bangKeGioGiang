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

class sumcongviec extends Database {

    public function sumcongviec__Get_All() {
        $obj = $this->connect->prepare("SELECT * FROM sumcongviec");
        $obj->setFetchMode(PDO::FETCH_OBJ);
        $obj->execute();
        return $obj->fetchAll();
    }
    
    public function sumcongviec__Add($id_index, $id_giang_vien, $sum_so_tiet) {
        $obj = $this->connect->prepare("INSERT INTO sumcongviec(id_index, id_giang_vien, sum_so_tiet) VALUES (?,?,?)");
        $obj->execute(array($id_index, $id_giang_vien, $sum_so_tiet));
        return $obj->rowCount();
    }

    public function sumcongviec__Update($id_sum_cong_viec, $id_index, $id_giang_vien, $sum_so_tiet) {
        $obj = $this->connect->prepare("UPDATE sumcongviec SET id_index=?, id_giang_vien=?, sum_so_tiet=? WHERE id_sum_cong_viec=?");
        $obj->execute(array($id_index, $id_giang_vien, $sum_so_tiet, $id_sum_cong_viec));
        return $obj->rowCount();
    }
    

    public function sumcongviec__Delete($id_sum_cong_viec) {
        $obj = $this->connect->prepare("DELETE FROM sumcongviec WHERE id_sum_cong_viec = ?");
        $obj->execute(array($id_sum_cong_viec));
        return $obj->rowCount();
    }

  
    public function sumcongviec__Get_By_Id($id_sum_cong_viec) {
        $obj = $this->connect->prepare("SELECT * FROM sumcongviec WHERE id_sum_cong_viec = ?");
        $obj->setFetchMode(PDO::FETCH_OBJ);
        $obj->execute(array($id_sum_cong_viec));
        return $obj->fetch();
    }

}
?>