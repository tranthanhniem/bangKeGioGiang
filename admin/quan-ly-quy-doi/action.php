<?php

    require "../../models/getModel.php";
    $href = $_SERVER["HTTP_REFERER"];
    if(strlen(strpos($href, "&status")) > 0){
        $href = explode("&status", $href)[0];
    }
    if (isset($_GET["req"])){
        switch($_GET["req"]){
            case "add":

                $id_nhom_cong_viec = $_POST["id_nhom_cong_viec"];
                $ma_cong_viec = $_POST["ma_cong_viec"];
                $ten_cong_viec = $_POST["ten_cong_viec"];
                $dieu_kien = $_POST["dieu_kien"];
                $quy_doi_so_tiet = $_POST["quy_doi_so_tiet"];

                $status = $quydoi->quydoi__Add($id_nhom_cong_viec, $ma_cong_viec, $ten_cong_viec, $dieu_kien, $quy_doi_so_tiet);
                if($status !=0 ){
                    header("location: $href&status=success");
                }else{
                    header("location: $href&status=failed");
                }
                
                break;
            case "update":

                $id_quy_doi = $_POST["id_quy_doi"];
                $id_nhom_cong_viec = $_POST["id_nhom_cong_viec"];
                $ma_cong_viec = $_POST["ma_cong_viec"];
                $ten_cong_viec = $_POST["ten_cong_viec"];
                $dieu_kien = $_POST["dieu_kien"];
                $quy_doi_so_tiet = $_POST["quy_doi_so_tiet"];


                $status = $quydoi->quydoi__Update($id_quy_doi, $id_nhom_cong_viec, $ma_cong_viec, $ten_cong_viec, $dieu_kien, $quy_doi_so_tiet);
                if($status !=0 ){
                    header("location: $href&status=success");
                }else{
                    header("location: $href&status=failed");
                }
                
                break;

            case "delete":

                $id_quy_doi = $_GET["id_quy_doi"];

                $status = $quydoi->quydoi__Delete($id_quy_doi);
                if($status !=0 ){
                    header("location: $href&status=success");
                }else{
                    header("location: $href&status=failed");
                }
                
                break;
        }
    }

?>