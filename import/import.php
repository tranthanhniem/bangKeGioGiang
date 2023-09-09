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

class import extends Database {

    public function import__Get_All() {
        $obj = $this->connect->prepare("SELECT * FROM import");
        $obj->setFetchMode(PDO::FETCH_OBJ);
        $obj->execute();
        return $obj->fetchAll();
    }
    
    public function import__Add($id, $note) {
        $obj = $this->connect->prepare("INSERT INTO import(id, note) VALUES (?,?)");
        $obj->execute(array($id, $note));
        return $obj->rowCount();
    }

}
?>