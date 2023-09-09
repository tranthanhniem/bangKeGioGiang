<?php

    require "../../models/getModel.php";
    $href = $_SERVER["HTTP_REFERER"];
    if(strlen(strpos($href, "&status")) > 0){
        $href = explode("&status", $href)[0];
    }
    if (isset($_GET["req"])){
        switch($_GET["req"]){
            case "add":

                $ten_nhom_cong_viec = $_POST["ten_nhom_cong_viec"];
                $ghi_chu = $_POST["ghi_chu"];

                $status = $nhomcongviec->nhomcongviec__Add($ten_nhom_cong_viec, $ghi_chu);
                if($status !=0 ){
                    header("location: $href&status=success");
                }else{
                    header("location: $href&status=failed");
                }
                
                break;
            case "update":

                $id_nhom_cong_viec = $_POST["id_nhom_cong_viec"];
                $ten_nhom_cong_viec = $_POST["ten_nhom_cong_viec"];
                $ghi_chu = $_POST["ghi_chu"];

                $status = $nhomcongviec->nhomcongviec__Update($id_nhom_cong_viec, $ten_nhom_cong_viec, $ghi_chu);
                if($status !=0 ){
                    header("location: $href&status=success");
                }else{
                    header("location: $href&status=failed");
                }
                
                break;

            case "delete":

                $id_nhom_cong_viec = $_GET["id_nhom_cong_viec"];

                $status = $nhomcongviec->nhomcongviec__Delete($id_nhom_cong_viec);
                if($status !=0 ){
                    header("location: $href&status=success");
                }else{
                    header("location: $href&status=failed");
                }
                
                break;
        }
    }

?>