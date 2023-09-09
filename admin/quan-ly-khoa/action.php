<?php

    require "../../models/getModel.php";
    $href = $_SERVER["HTTP_REFERER"];
    if(strlen(strpos($href, "&status")) > 0){
        $href = explode("&status", $href)[0];
    }
    if (isset($_GET["req"])){
        switch($_GET["req"]){
            case "add":

                $ten_khoa = $_POST["ten_khoa"];
                $ghi_chu = $_POST["ghi_chu"];

                $status = $khoa->khoa__Add($ten_khoa, $ghi_chu);
                if($status !=0 ){
                    header("location: $href&status=success");
                }else{
                    header("location: $href&status=failed");
                }
                
                break;
            case "update":

                $id_khoa = $_POST["id_khoa"];
                $ten_khoa = $_POST["ten_khoa"];
                $ghi_chu = $_POST["ghi_chu"];

                $status = $khoa->khoa__Update($id_khoa, $ten_khoa, $ghi_chu);
                if($status !=0 ){
                    header("location: $href&status=success");
                }else{
                    header("location: $href&status=failed");
                }
                
                break;

            case "delete":

                $id_khoa = $_GET["id_khoa"];

                $status = $khoa->khoa__Delete($id_khoa);
                if($status !=0 ){
                    header("location: $href&status=success");
                }else{
                    header("location: $href&status=failed");
                }
                
                break;
        }
    }

?>