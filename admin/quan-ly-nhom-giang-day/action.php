<?php

    require "../../models/getModel.php";
    $href = $_SERVER["HTTP_REFERER"];
    if(strlen(strpos($href, "&status")) > 0){
        $href = explode("&status", $href)[0];
    }
    if (isset($_GET["req"])){
        switch($_GET["req"]){
            case "add":

                $ten_nhom_giang_day = $_POST["ten_nhom_giang_day"];
                $ghi_chu = $_POST["ghi_chu"];

                $status = $nhomgiangday->nhomgiangday__Add($ten_nhom_giang_day, $ghi_chu);
                if($status !=0 ){
                    header("location: $href&status=success");
                }else{
                    header("location: $href&status=failed");
                }
                
                break;
            case "update":

                $id_nhom_giang_day = $_POST["id_nhom_giang_day"];
                $ten_nhom_giang_day = $_POST["ten_nhom_giang_day"];
                $ghi_chu = $_POST["ghi_chu"];

                $status = $nhomgiangday->nhomgiangday__Update($id_nhom_giang_day, $ten_nhom_giang_day, $ghi_chu);
                if($status !=0 ){
                    header("location: $href&status=success");
                }else{
                    header("location: $href&status=failed");
                }
                
                break;

            case "delete":

                $id_nhom_giang_day = $_GET["id_nhom_giang_day"];

                $status = $nhomgiangday->nhomgiangday__Delete($id_nhom_giang_day);
                if($status !=0 ){
                    header("location: $href&status=success");
                }else{
                    header("location: $href&status=failed");
                }
                
                break;
        }
    }

?>