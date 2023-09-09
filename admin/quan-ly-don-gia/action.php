<?php

    require "../../models/getModel.php";
    $href = $_SERVER["HTTP_REFERER"];
    if(strlen(strpos($href, "&status")) > 0){
        $href = explode("&status", $href)[0];
    }
    if (isset($_GET["req"])){
        switch($_GET["req"]){
            case "add":

                $don_gia = $_POST["don_gia"];
                $ghi_chu = $_POST["ghi_chu"];

                $status = $dongia->dongia__Add($don_gia, $ghi_chu);
                if($status !=0 ){
                    header("location: $href&status=success");
                }else{
                    header("location: $href&status=failed");
                }
                
                break;
            case "update":

                $id_don_gia = $_POST["id_don_gia"];
                $don_gia = $_POST["don_gia"];
                $ghi_chu = $_POST["ghi_chu"];

                $status = $dongia->dongia__Update($id_don_gia, $don_gia, $ghi_chu);
                if($status !=0 ){
                    header("location: $href&status=success");
                }else{
                    header("location: $href&status=failed");
                }
                
                break;

            case "delete":

                $id_don_gia = $_GET["id_don_gia"];

                $status = $dongia->dongia__Delete($id_don_gia);
                if($status !=0 ){
                    header("location: $href&status=success");
                }else{
                    header("location: $href&status=failed");
                }
                
                break;
        }
    }

?>