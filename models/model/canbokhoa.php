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

class canbokhoa extends Database {

    public function canbokhoa__Get_All($trang_thai = 1) {
        $obj = $this->connect->prepare("SELECT * FROM canbokhoa WHERE trang_thai = ?");
        $obj->setFetchMode(PDO::FETCH_OBJ);
        $obj->execute(array($trang_thai));
        return $obj->fetchAll();
    }
    
    public function canbokhoa__Add($ma_can_bo_khoa, $ten_can_bo_khoa, $gioi_tinh, $ngay_sinh, $email, $so_dien_thoai_1, $so_dien_thoai_2, $dia_chi_lien_lac, $dia_chi_thuong_tru, $id_trinh_do, $id_khoa) {
        $obj = $this->connect->prepare("INSERT INTO canbokhoa(ma_can_bo_khoa, ten_can_bo_khoa, gioi_tinh, ngay_sinh, email, so_dien_thoai_1, so_dien_thoai_2, dia_chi_lien_lac, dia_chi_thuong_tru, id_trinh_do, id_khoa) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
        $obj->execute(array($ma_can_bo_khoa, $ten_can_bo_khoa, $gioi_tinh, $ngay_sinh, $email, $so_dien_thoai_1, $so_dien_thoai_2, $dia_chi_lien_lac, $dia_chi_thuong_tru, $id_trinh_do, $id_khoa));
        return $obj->rowCount();
    }

    public function canbokhoa__Update($id_can_bo_khoa, $ma_can_bo_khoa, $ten_can_bo_khoa, $gioi_tinh, $ngay_sinh, $email, $so_dien_thoai_1, $so_dien_thoai_2, $dia_chi_lien_lac, $dia_chi_thuong_tru, $id_trinh_do, $id_khoa) {
        $obj = $this->connect->prepare("UPDATE canbokhoa SET ma_can_bo_khoa=?, ten_can_bo_khoa=?, gioi_tinh=?, ngay_sinh=?, email=?, so_dien_thoai_1=?, so_dien_thoai_2=?, dia_chi_lien_lac=?, dia_chi_thuong_tru=?, id_trinh_do=?, id_khoa=? WHERE id_can_bo_khoa=?");
        $obj->execute(array($ma_can_bo_khoa, $ten_can_bo_khoa, $gioi_tinh, $ngay_sinh, $email, $so_dien_thoai_1, $so_dien_thoai_2, $dia_chi_lien_lac, $dia_chi_thuong_tru, $id_trinh_do, $id_can_bo_khoa, $id_khoa));
        return $obj->rowCount();
    }
    

    public function canbokhoa__Delete($id_can_bo_khoa) {
        $obj = $this->connect->prepare("DELETE FROM canbokhoa WHERE id_can_bo_khoa = ?");
        $obj->execute(array($id_can_bo_khoa));
        return $obj->rowCount();
    }

  
    public function canbokhoa__Get_By_Id($id_can_bo_khoa) {
        $obj = $this->connect->prepare("SELECT * FROM canbokhoa WHERE id_can_bo_khoa = ?");
        $obj->setFetchMode(PDO::FETCH_OBJ);
        $obj->execute(array($id_can_bo_khoa));
        return $obj->fetch();
    }

    public function canbokhoa__Get_By_Id_Trinh_Do($id_trinh_do) {
        $obj = $this->connect->prepare("SELECT * FROM canbokhoa WHERE id_trinh_do = ?");
        $obj->setFetchMode(PDO::FETCH_OBJ);
        $obj->execute(array($id_trinh_do));
        return $obj->fetchAll();
    }
    public function canbokhoa__Update_Trang_Thai($id_can_bo_khoa, $trang_thai) {
        $obj = $this->connect->prepare("UPDATE canbokhoa SET trang_thai=? WHERE id_can_bo_khoa=?");
        $obj->execute(array($trang_thai, $id_can_bo_khoa));
        return $obj->rowCount();
    }
    public function canbokhoa__Get_By_Id_khoa($id_can_bo_khoa) {
        $obj = $this->connect->prepare("SELECT * FROM canbokhoa, khoa WHERE canbokhoa.id_khoa = khoa.id_khoa AND canbokhoa.id_can_bo_khoa = ?");
        $obj->setFetchMode(PDO::FETCH_OBJ);
        $obj->execute(array($id_can_bo_khoa));
        return $obj->fetchAll();
    }
    public function canbokhoa__Get_All_Not_Exits($id_khoa) {
        $obj = $this->connect->prepare("SELECT * FROM canbokhoa WHERE id_khoa = ? AND id_can_bo_khoa NOT IN (SELECT id_nguoi_dung FROM taikhoan)");
        $obj->setFetchMode(PDO::FETCH_OBJ);
        $obj->execute(array($id_khoa));
        return $obj->fetchAll();
    }
}
?>