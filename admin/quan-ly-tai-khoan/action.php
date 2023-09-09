<?php

    require "../../models/getModel.php";
    $href = $_SERVER["HTTP_REFERER"];
    if(strlen(strpos($href, '&status')) > 0){
        $href = explode('&status', $href)[0];
    }

    function locDau ($str){
        $unicode = array(
            "a"=>"á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ",
            "d"=>"đ",
            "e"=>"é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ",
            "i"=>"í|ì|ỉ|ĩ|ị",
            "o"=>"ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ",
            "u"=>"ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự",
            "y"=>"ý|ỳ|ỷ|ỹ|ỵ",
            "A"=>"Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ",
            "D"=>"Đ",
            "E"=>"É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ",
            "I"=>"Í|Ì|Ỉ|Ĩ|Ị",
            "O"=>"Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ",
            "U"=>"Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự",
            "Y"=>"Ý|Ỳ|Ỷ|Ỹ|Ỵ",
        );
        foreach($unicode as $nonUnicode=>$uni){
            $str = preg_replace("/($uni)/i", $nonUnicode, $str);
        }
        $str = trim(strtolower(str_replace(" ","",$str)));
     
        return $str;
    }


    if (isset($_GET["req"])){
        switch($_GET["req"]){

            case "add_admin":
                $status  = 0;
              
                $id_phan_quyen = $_POST["id_phan_quyen"];
                $id_phan_nhom = $_POST["id_phan_nhom"];
                $id_nguoi_dung = 0;
                $email = $_POST["email"];
                $mat_khau = $_POST["mat_khau"];
                $ghi_chu = date("Y-m-d H:i:s");

                $status .= $taikhoan->taikhoan__Add($email, $mat_khau, $ghi_chu, $id_phan_quyen, $id_phan_nhom, $item);
                 if($status !=0 ){
                    header("location: $href&status=success");
                }else{
                    header("location: $href&status=failed");
                }
                
                break;
                  
            case "add_giang_vien":
                $status  = 0;
              
                $id_phan_quyen = $_POST["id_phan_quyen"];
                $id_phan_nhom = $_POST["id_phan_nhom"];
                $id_nguoi_dung = $_POST["id_nguoi_dung"];

                foreach($id_nguoi_dung as $item){
                    $giangvien__Get_By_Id = $giangvien->giangvien__Get_By_Id($item);
                    
                    $email = $giangvien__Get_By_Id->email;
                    $mat_khau = locDau($giangvien__Get_By_Id->ten_giang_vien).date("@is");
                    $ghi_chu = date("Y-m-d H:i:s");

                    $status .= $taikhoan->taikhoan__Add($email, $mat_khau, $ghi_chu, $id_phan_quyen, $id_phan_nhom, $item);
                }

                 if($status !=0 ){
                    header("location: $href&status=success");
                }else{
                    header("location: $href&status=failed");
                }
                
                break;
            case "add_can_bo_khoa":
                $status  = 0;
              
                $id_phan_quyen = $_POST["id_phan_quyen"];
                $id_phan_nhom = $_POST["id_phan_nhom"];
                $id_nguoi_dung = $_POST["id_nguoi_dung"];

                foreach($id_nguoi_dung as $item){
                    $canbokhoa__Get_By_Id = $canbokhoa->canbokhoa__Get_By_Id($item);
                    
                    $email = $canbokhoa__Get_By_Id->email;
                    $mat_khau = locDau($canbokhoa__Get_By_Id->ten_can_bo_khoa).date("@is");
                    $ghi_chu = date("Y-m-d H:i:s");

                    $status .= $taikhoan->taikhoan__Add($email, $mat_khau, $ghi_chu, $id_phan_quyen, $id_phan_nhom, $item);
                }

                 if($status !=0 ){
                    header("location: $href&status=success");
                }else{
                    header("location: $href&status=failed");
                }
                
                break;

            
            case "delete":
                $status = 0;
                $id_tai_khoan = $_GET["id_tai_khoan"];
                $status .= $taikhoan->taikhoan__Delete($id_tai_khoan);
            
                 if($status !=0 ){
                    header("location: $href&status=success");
                }else{
                    header("location: $href&status=failed");
                }
            
            break;
              
            case "reset":
                $status = 0;
                $id_tai_khoan = $_GET["id_tai_khoan"];
                $id_giang_vien = $taikhoan->taikhoan__Get_By_Id($id_tai_khoan)->id_nguoi_dung;
                $giangvien__Get_By_Id = $giangvien->giangvien__Get_By_Id($id_giang_vien);
                $mat_khau = locDau($giangvien__Get_By_Id->ten_giang_vien).date("@is");
                $status .= $taikhoan->taikhoan__Reset($id_tai_khoan, $mat_khau);
            
                 if($status !=0 ){
                    header("location: $href&status=success");
                }else{
                    header("location: $href&status=failed");
                }
            break;

            case "active":
                $status = 0;
                $id_tai_khoan = $_GET["id_tai_khoan"];
                $trang_thai = $_GET["trang_thai"] == 1 ? 0 : 1;
                $status .= $taikhoan->taikhoan__Active($id_tai_khoan, $trang_thai);
            
                 if($status !=0 ){
                    header("location: $href&status=success");
                }else{
                    header("location: $href&status=failed");
                }
            break;
        }
    }

?>