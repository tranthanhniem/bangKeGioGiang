<?php
    session_start();
    $href = $_SERVER["HTTP_REFERER"];
    if(strlen(strpos($href, "&status")) > 0){
        $href = explode("&status", $href)[0];
    }
    require "../../models/getModel.php";
    
    if (isset($_GET["req"])){
        switch($_GET["req"]){
            case "add":
                $status = 0;

                $id_index = $_POST['id_index'];
                $id_giang_vien = $_POST['id_giang_vien'];
                $id_nhom_giang_day = $_POST['id_nhom_giang_day'];
                $ten_mon_hoc = $_POST['ten_mon_hoc'];
                $ten_lop_hoc = $_POST['ten_lop_hoc'];
                $so_sinh_vien = $_POST['so_sinh_vien'];
                $so_nhom = $_POST['so_nhom'];
                $so_tiet_mon_hoc = $_POST['so_tiet_mon_hoc'];
                $so_tiet_thuc_giang = $_POST['so_tiet_thuc_giang'];
                $he_so_nhom = $_POST['he_so_nhom'];
                $he_so_tin_chi = $_POST['he_so_tin_chi'];
                $so_tiet_quy_chuan = floatval($so_tiet_thuc_giang) + floatval($he_so_nhom) + floatval($he_so_tin_chi);

                $status .= $giangday->giangday__Add($id_index, $id_giang_vien, $id_nhom_giang_day, $ten_mon_hoc, $ten_lop_hoc, $so_sinh_vien, $so_nhom, $so_tiet_mon_hoc, $so_tiet_thuc_giang, $he_so_nhom, $he_so_tin_chi, $so_tiet_quy_chuan);

                if($status != "0" ){
                    header("location: $href&status=success");
                }else{
                    header("location: $href&status=failed");
                }
                break; 

            case "update":
                $status = 0;

                $id_giang_day = $_POST['id_giang_day'];
                $id_index = $_POST['id_index'];
                $id_giang_vien = $_POST['id_giang_vien'];
                $id_nhom_giang_day = $_POST['id_nhom_giang_day'];
                $ten_mon_hoc = $_POST['ten_mon_hoc'];
                $ten_lop_hoc = $_POST['ten_lop_hoc'];
                $so_sinh_vien = $_POST['so_sinh_vien'];
                $so_nhom = $_POST['so_nhom'];
                $so_tiet_mon_hoc = $_POST['so_tiet_mon_hoc'];
                $so_tiet_thuc_giang = $_POST['so_tiet_thuc_giang'];
                $he_so_nhom = $_POST['he_so_nhom'];
                $he_so_tin_chi = $_POST['he_so_tin_chi'];
                $so_tiet_quy_chuan = floatval($so_tiet_thuc_giang) + floatval($he_so_nhom) + floatval($he_so_tin_chi);

                $status .= $giangday->giangday__Update($id_giang_day, $id_index, $id_giang_vien, $id_nhom_giang_day,  $ten_mon_hoc, $ten_lop_hoc, $so_sinh_vien, $so_nhom, $so_tiet_mon_hoc, $so_tiet_thuc_giang, $he_so_nhom, $he_so_tin_chi, $so_tiet_quy_chuan);

                if($status != "0" ){
                    header("location: $href&status=success");
                }else{
                    header("location: $href&status=failed");
                }
                break; 

            case "delete":
                $status = 0;
    
                $id_giang_day = $_GET['id_giang_day'];
                $status .= $giangday->giangday__Delete($id_giang_day);

                if($status != "0" ){
                    header("location: $href&status=success");
                }else{
                    header("location: $href&status=failed");
                }
                break; 
                    
        }
    }
?>