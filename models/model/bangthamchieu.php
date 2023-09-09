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

class bangthamchieu extends Database {

    public function bangthamchieu__Get_All() {
        $obj = $this->connect->prepare("SELECT * FROM bangthamchieu");
        $obj->setFetchMode(PDO::FETCH_OBJ);
        $obj->execute();
        return $obj->fetchAll();
    }
    
    public function bangthamchieu__Add($noi_dung, $sum_giang_day, $sum_nckh, $sum_kq, $key_index, $ghi_chu) {
        $obj = $this->connect->prepare("INSERT INTO bangthamchieu(noi_dung, sum_giang_day, sum_nckh, sum_kq, key_index, ghi_chu) VALUES (?,?,?,?,?,?)");
        $obj->execute(array($noi_dung, $sum_giang_day, $sum_nckh, $sum_kq, $key_index, $ghi_chu));
        return $obj->rowCount();
    }

    public function bangthamchieu__Update($id_bang_tham_chieu, $noi_dung, $sum_giang_day, $sum_nckh, $sum_kq, $key_index, $ghi_chu) {
        $obj = $this->connect->prepare("UPDATE bangthamchieu SET noi_dung=?, sum_giang_day=?, sum_nckh=?, sum_kq=?, key_index=?, ghi_chu=? WHERE id_bang_tham_chieu=?");
        $obj->execute(array($noi_dung, $sum_giang_day, $sum_nckh, $sum_kq, $key_index, $ghi_chu, $id_bang_tham_chieu));
        return $obj->rowCount();
    }
    

    public function bangthamchieu__Delete($id_bang_tham_chieu) {
        $obj = $this->connect->prepare("DELETE FROM bangthamchieu WHERE id_bang_tham_chieu = ?");
        $obj->execute(array($id_bang_tham_chieu));
        return $obj->rowCount();
    }

  
    public function bangthamchieu__Get_By_Id($id_bang_tham_chieu) {
        $obj = $this->connect->prepare("SELECT * FROM bangthamchieu WHERE id_bang_tham_chieu = ?");
        $obj->setFetchMode(PDO::FETCH_OBJ);
        $obj->execute(array($id_bang_tham_chieu));
        return $obj->fetch();
    }

}
?>