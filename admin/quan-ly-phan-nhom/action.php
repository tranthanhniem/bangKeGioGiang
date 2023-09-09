<?php

    require "../../models/getModel.php";
    $href = $_SERVER["HTTP_REFERER"];
    if(strlen(strpos($href, "&status")) > 0){
        $href = explode("&status", $href)[0];
    }
    if (isset($_GET["req"])){
        switch($_GET["req"]){
            case "add":
               $status = 0;
                $ten_phan_nhom = $_POST["ten_phan_nhom"];
                $cap_bac = $phannhom->phannhom__Get_Last()->cap_bac + 1;
                $ghi_chu = $_POST["ghi_chu"];
                echo $status += $phannhom->phannhom__Add($ten_phan_nhom, $cap_bac, $ghi_chu);
                if($status !=0 ){
                    header("location: $href&status=success");
                }else{
                    header("location: $href&status=failed");
                }
                
                break;
            case "update":
                $status = 0;
                $id_phan_nhom = $_POST["id_phan_nhom"];
                $ten_phan_nhom = $_POST["ten_phan_nhom"];
                $cap_bac = $_POST["cap_bac"];
                $ghi_chu = $_POST["ghi_chu"];

                $status += $phannhom->phannhom__Update($id_phan_nhom, $ten_phan_nhom, $cap_bac, $ghi_chu);
                if($status !=0 ){
                    header("location: $href&status=success");
                }else{
                    header("location: $href&status=failed");
                }
                
                break;

            case "delete":
                $status = 0;

                $id_phan_nhom = $_GET["id_phan_nhom"];

                $status += $phannhom->phannhom__Delete($id_phan_nhom);
                if($status !=0 ){
                    header("location: $href&status=success");
                }else{
                    header("location: $href&status=failed");
                }
                
                break;
        }
    }

?>