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

class sumggnckh extends Database {

    public function sumggnckh__Get_All() {
        $obj = $this->connect->prepare("SELECT * FROM sumggnckh");
        $obj->setFetchMode(PDO::FETCH_OBJ);
        $obj->execute();
        return $obj->fetchAll();
    }
    
    public function sumggnckh__Add($id_index, $id_giang_vien, $sum_so_tiet) {
        $obj = $this->connect->prepare("INSERT INTO sumggnckh(id_index, id_giang_vien, sum_so_tiet) VALUES (?,?,?)");
        $obj->execute(array($id_index, $id_giang_vien, $sum_so_tiet));
        return $obj->rowCount();
    }

    public function sumggnckh__Update($id_sum_gg_nckh, $id_index, $id_giang_vien, $sum_so_tiet) {
        $obj = $this->connect->prepare("UPDATE sumggnckh SET id_index=?, id_giang_vien=?, sum_so_tiet=? WHERE id_sum_gg_nckh=?");
        $obj->execute(array($id_index, $id_giang_vien, $sum_so_tiet, $id_sum_gg_nckh));
        return $obj->rowCount();
    }
    

    public function sumggnckh__Delete($id_sum_gg_nckh) {
        $obj = $this->connect->prepare("DELETE FROM sumggnckh WHERE id_sum_gg_nckh = ?");
        $obj->execute(array($id_sum_gg_nckh));
        return $obj->rowCount();
    }

  
    public function sumggnckh__Get_By_Id($id_sum_gg_nckh) {
        $obj = $this->connect->prepare("SELECT * FROM sumggnckh WHERE id_sum_gg_nckh = ?");
        $obj->setFetchMode(PDO::FETCH_OBJ);
        $obj->execute(array($id_sum_gg_nckh));
        return $obj->fetch();
    }

}
?>