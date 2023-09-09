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

class nhomgiangday extends Database {

    public function nhomgiangday__Get_All() {
        $obj = $this->connect->prepare("SELECT * FROM nhomgiangday");
        $obj->setFetchMode(PDO::FETCH_OBJ);
        $obj->execute();
        return $obj->fetchAll();
    }
    
    public function nhomgiangday__Add($ten_nhom_giang_day, $ghi_chu) {
        $obj = $this->connect->prepare("INSERT INTO nhomgiangday(ten_nhom_giang_day, ghi_chu) VALUES (?,?)");
        $obj->execute(array($ten_nhom_giang_day, $ghi_chu));
        return $obj->rowCount();
    }

    public function nhomgiangday__Update($id_nhom_giang_day, $ten_nhom_giang_day, $ghi_chu) {
        $obj = $this->connect->prepare("UPDATE nhomgiangday SET ten_nhom_giang_day=?, ghi_chu=? WHERE id_nhom_giang_day=?");
        $obj->execute(array($ten_nhom_giang_day, $ghi_chu, $id_nhom_giang_day));
        return $obj->rowCount();
    }
    

    public function nhomgiangday__Delete($id_nhom_giang_day) {
        $obj = $this->connect->prepare("DELETE FROM nhomgiangday WHERE id_nhom_giang_day = ?");
        $obj->execute(array($id_nhom_giang_day));
        return $obj->rowCount();
    }

  
    public function nhomgiangday__Get_By_Id($id_nhom_giang_day) {
        $obj = $this->connect->prepare("SELECT * FROM nhomgiangday WHERE id_nhom_giang_day = ?");
        $obj->setFetchMode(PDO::FETCH_OBJ);
        $obj->execute(array($id_nhom_giang_day));
        return $obj->fetch();
    }

}
?>