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
                $noi_dung = $_POST['noi_dung'];
                $the_loai = $_POST['the_loai'];
                $so_tiet_quy_chuan = $_POST['so_tiet_quy_chuan'];

                $status .= $nckh->nckh__Add($id_index, $id_giang_vien, $noi_dung, $the_loai, $so_tiet_quy_chuan);

                if($status != "0" ){
                    header("location: $href&status=success");
                }else{
                    header("location: $href&status=failed");
                }
                break; 

            case "update":
                $status = 0;

                $id_nckh = $_POST['id_nckh'];
                $id_index = $_POST['id_index'];
                $id_giang_vien = $_POST['id_giang_vien'];
                $noi_dung = $_POST['noi_dung'];
                $the_loai = $_POST['the_loai'];
                $so_tiet_quy_chuan = $_POST['so_tiet_quy_chuan'];
                $status .= $nckh->nckh__Update($id_nckh, $id_index, $id_giang_vien, $noi_dung,  $the_loai, $so_tiet_quy_chuan);

                if($status != "0" ){
                    header("location: $href&status=success");
                }else{
                    header("location: $href&status=failed");
                }
                break; 

            case "delete":
                $status = 0;
    
                $id_nckh = $_GET['id_nckh'];
                $status .= $nckh->nckh__Delete($id_nckh);

                if($status != "0" ){
                    header("location: $href&status=success");
                }else{
                    header("location: $href&status=failed");
                }
                break; 
                    
        }
    }
?>