<?php

    require "../../models/getModel.php";
    $href = $_SERVER["HTTP_REFERER"];
    if(strlen(strpos($href, "&status")) > 0){
        $href = explode("&status", $href)[0];
    }
    if (isset($_GET["req"])){
        switch($_GET["req"]){
            case "add":

                $ten_phan_quyen = $_POST["ten_phan_quyen"];
                $cap_bac = $_POST["cap_bac"];
                $ghi_chu = $_POST["ghi_chu"];

                $status = $phanquyen->phanquyen__Add($ten_phan_quyen, $cap_bac, $ghi_chu);
                if($status !=0 ){
                    header("location: $href&status=success");
                }else{
                    header("location: $href&status=failed");
                }
                
                break;
            case "update":

                $id_phan_quyen = $_POST["id_phan_quyen"];
                $ten_phan_quyen = $_POST["ten_phan_quyen"];
                $cap_bac = $_POST["cap_bac"];
                $ghi_chu = $_POST["ghi_chu"];

                $status = $phanquyen->phanquyen__Update($id_phan_quyen, $ten_phan_quyen, $cap_bac, $ghi_chu);
                if($status !=0 ){
                    header("location: $href&status=success");
                }else{
                    header("location: $href&status=failed");
                }
                
                break;

            case "delete":

                $id_phan_quyen = $_GET["id_phan_quyen"];

                $status = $phanquyen->phanquyen__Delete($id_phan_quyen);
                if($status !=0 ){
                    header("location: $href&status=success");
                }else{
                    header("location: $href&status=failed");
                }
                
                break;
        }
    }

?>