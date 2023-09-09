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

                $noi_dung_raw = $_POST['noi_dung'];
                $sum_giang_day_raw = $_POST['sum_giang_day'];
                $sum_nckh_raw = $_POST['sum_nckh'];
                $sum_kq_raw = $_POST['sum_kq'];
                for($i = 0; $i< count($noi_dung_raw) ; $i++){
                    $noi_dung = $noi_dung_raw[$i];
                    $sum_giang_day = $sum_giang_day_raw[$i];
                    $sum_nckh = $sum_nckh_raw[$i];
                    $tong = $sum_kq_raw[$i];
                    $status .= $bangke->bangke__Add($id_index, $id_giang_vien, $noi_dung, $sum_giang_day, $sum_nckh, $sum_kq);
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
                $tong_so_tiet = floatval($_POST['quy_doi_so_tiet']) + floatval($so_luong);
                $status .= $bangke->bangke__Update($id_cong_viec , $id_index, $id_giang_vien, $id_quy_doi, $ten_cong_viec, $quy_doi_so_tiet, $so_luong, $tong_so_tiet);
    

                if($status != "0" ){
                    header("location: $href&status=success");
                }else{
                    header("location: $href&status=failed");
                }
                break; 

            case "delete":
                $status = 0;
    
                $id_cong_viec = $_GET['id_cong_viec'];
                $status .= $bangke->bangke__Delete($id_cong_viec);

                if($status != "0" ){
                    header("location: $href&status=success");
                }else{
                    header("location: $href&status=failed");
                }
                break; 
                    
        }
    }
?>