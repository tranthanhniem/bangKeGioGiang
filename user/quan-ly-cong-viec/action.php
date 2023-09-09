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
                $id_quy_doi = $_POST['id_quy_doi'];
                $ten_cong_viec = $_POST['ten_cong_viec'];
                $so_luong = $_POST['so_luong'];
                $quy_doi_so_tiet = $_POST['quy_doi_so_tiet'];
                if($congviec->congviec__Get_By_Id_Giang_Vien_And_Id_Index($id_giang_vien, $id_index) > 0){
                    $congviec->congviec__Delete_Gv_Index($id_giang_vien, $id_index);
                }

                for($i = 0; $i < count($id_quy_doi) ;$i++){
                    $tong_so_tiet = floatval($so_luong[$i] * floatval($quy_doi_so_tiet[$i]));

                    $status .= $congviec->congviec__Add($id_index, $id_giang_vien, $id_quy_doi[$i], $ten_cong_viec[$i], $quy_doi_so_tiet[$i], $so_luong[$i], $tong_so_tiet);
                }


                if($status != "0" ){
                    header("location: $href&status=success");
                }else{
                    header("location: $href&status=failed");
                }
                break; 

            case "update":
                $status = 0;

                $id_cong_viec = $_POST['id_cong_viec'];
                $id_index = $_POST['id_index'];
                $id_giang_vien = $_POST['id_giang_vien'];
                $id_quy_doi = $_POST['id_quy_doi'];
                $ten_cong_viec = $_POST['ten_cong_viec'];
                $so_luong = $_POST['so_luong'];
                $quy_doi_so_tiet = $_POST['quy_doi_so_tiet'];
                $tong_so_tiet = floatval($so_luong) * floatval($quy_doi_so_tiet);
                $status .= $congviec->congviec__Update($id_cong_viec , $id_index, $id_giang_vien, $id_quy_doi, $ten_cong_viec, $quy_doi_so_tiet, $so_luong, $tong_so_tiet);
    

                if($status != "0" ){
                    header("location: $href&status=success");
                }else{
                    header("location: $href&status=failed");
                }
                break; 

            case "delete":
                $status = 0;
    
                $id_cong_viec = $_GET['id_cong_viec'];
                $status .= $congviec->congviec__Delete($id_cong_viec);

                if($status != "0" ){
                    header("location: $href&status=success");
                }else{
                    header("location: $href&status=failed");
                }
                break; 
                    
        }
    }
?>