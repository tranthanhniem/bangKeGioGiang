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

class indexcount extends Database {

    public function indexcount__Get_All() {
        $obj = $this->connect->prepare("SELECT * FROM indexcount ORDER BY id_index DESC");
        $obj->setFetchMode(PDO::FETCH_OBJ);
        $obj->execute();
        return $obj->fetchAll();
    }
    
    public function indexcount__Add($ten_index, $ghi_chu) {
        $obj = $this->connect->prepare("INSERT INTO indexcount(ten_index, ghi_chu) VALUES (?,?)");
        $obj->execute(array($ten_index, $ghi_chu));
        return $obj->rowCount();
    }

    public function indexcount__Update($id_index, $ten_index, $ghi_chu) {
        $obj = $this->connect->prepare("UPDATE indexcount SET ten_index=?, ghi_chu=? WHERE id_index=?");
        $obj->execute(array($ten_index, $ghi_chu, $id_index));
        return $obj->rowCount();
    }
    

    public function indexcount__Delete($id_index) {
        $obj = $this->connect->prepare("DELETE FROM indexcount WHERE id_index = ?");
        $obj->execute(array($id_index));
        return $obj->rowCount();
    }

  
    public function indexcount__Get_By_Id($id_index) {
        $obj = $this->connect->prepare("SELECT * FROM indexcount WHERE id_index = ?");
        $obj->setFetchMode(PDO::FETCH_OBJ);
        $obj->execute(array($id_index));
        return $obj->fetch();
    }

}
?>