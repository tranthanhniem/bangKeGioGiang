<?php

    require "../../models/getModel.php";
    require('../../assets/vendor/PHPOffice/PHPExcel.php');

    $href = $_SERVER["HTTP_REFERER"];
    if(strlen(strpos($href, "&status")) > 0){
        $href = explode("&status", $href)[0];
    }
    if (isset($_GET["req"])){
        switch($_GET["req"]){
            case "add":
                
                $ma_giang_vien = $_POST["ma_giang_vien"];
                $ten_giang_vien = $_POST["ten_giang_vien"];
                $gioi_tinh = $_POST["gioi_tinh"];
                $ngay_sinh = $_POST["ngay_sinh"];
                $email = $_POST["email"];
                $so_dien_thoai_1 = $_POST["so_dien_thoai_1"];
                $so_dien_thoai_2 = $_POST["so_dien_thoai_2"];
                $dia_chi_lien_lac = $_POST["dia_chi_lien_lac"];
                $dia_chi_thuong_tru = $_POST["dia_chi_thuong_tru"];
                $id_trinh_do = $_POST["id_trinh_do"];
                $id_khoa = $_POST["id_khoa"];
                
                $status = $giangvien->giangvien__Add($ma_giang_vien, $ten_giang_vien, $gioi_tinh, $ngay_sinh, $email, $so_dien_thoai_1, $so_dien_thoai_2, $dia_chi_lien_lac, $dia_chi_thuong_tru, $id_trinh_do, $id_khoa);
                if($status !=0 ){
                    header("location: $href&status=success");
                }else{
                    header("location: $href&status=failed");
                }
                
                break;
            case "update":

                $id_giang_vien = $_POST["id_giang_vien"];
                $ma_giang_vien = $_POST["ma_giang_vien"];
                $ten_giang_vien = $_POST["ten_giang_vien"];
                $gioi_tinh = $_POST["gioi_tinh"];
                $ngay_sinh = $_POST["ngay_sinh"];
                $email = $_POST["email"];
                $so_dien_thoai_1 = $_POST["so_dien_thoai_1"];
                $so_dien_thoai_2 = $_POST["so_dien_thoai_2"];
                $dia_chi_lien_lac = $_POST["dia_chi_lien_lac"];
                $dia_chi_thuong_tru = $_POST["dia_chi_thuong_tru"];
                $id_trinh_do = $_POST["id_trinh_do"];
                $id_khoa = $_POST["id_khoa"];

                $status = $giangvien->giangvien__Update($id_giang_vien, $ma_giang_vien, $ten_giang_vien, $gioi_tinh, $ngay_sinh, $email, $so_dien_thoai_1, $so_dien_thoai_2, $dia_chi_lien_lac, $dia_chi_thuong_tru, $id_trinh_do, $id_khoa);
                if($status !=0 ){
                    header("location: $href&status=success");
                }else{
                    header("location: $href&status=failed");
                }
                
                break;

            case "delete":

                $id_giang_vien = $_GET["id_giang_vien"];

                $status = $giangvien->giangvien__Delete($id_giang_vien);
                if($status !=0 ){
                    header("location: $href&status=success");
                }else{
                    header("location: $href&status=failed");
                }
                
                break;

            case 'import':
                $status = 0;
                
                $file = $_FILES["file"]["tmp_name"];
                if(isset($file)){
                    $objReader = PHPExcel_IOFactory::createReaderForFile($file);
                     $objReader->setLoadSheetsOnly();
                     $objExcel = $objReader->load($file);
                     $sheetData = $objExcel->getActiveSheet()->toArray(null, true, true,true);
                     $highestRow = $objExcel->setActiveSheetIndex()->getHighestRow();


                    for($row = 3; $row<=$highestRow; $row++){
                        $ma_giang_vien = $sheetData[$row]['B'];
                        $ten_giang_vien = $sheetData[$row]['C'];
                        $gioi_tinh = $sheetData[$row]['D'];
                        $ngay_sinh = $sheetData[$row]['E'];
                        $email = $sheetData[$row]['F'];
                        $so_dien_thoai_1 = $sheetData[$row]['G'];
                        $so_dien_thoai_2 = $sheetData[$row]['H'];
                        $dia_chi_lien_lac = $sheetData[$row]['I'];
                        $dia_chi_thuong_tru = $sheetData[$row]['J'];
                        $id_trinh_do = $sheetData[$row]['K'];
                        $id_khoa = $sheetData[$row]['L'];
                        
                        $status = $giangvien->giangvien__Add($ma_giang_vien, $ten_giang_vien, $gioi_tinh, $ngay_sinh, $email, $so_dien_thoai_1, $so_dien_thoai_2, $dia_chi_lien_lac, $dia_chi_thuong_tru, $id_trinh_do, $id_khoa);
        
                    }
                }
                if($status !=0 ){
                    header("location: $href&status=success");
                }else{
                    header("location: $href&status=failed");
                }
                break;
        }
    }

?>