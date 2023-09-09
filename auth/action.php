<?php
    session_start();

    require '../models/getModel.php';
    
    if (isset($_GET['req'])){
        switch($_GET['req']){
            case 'dang-nhap':

                
                
                $email = $_POST['email'];
                $mat_khau = $_POST['mat_khau'];
                $status = $taikhoan->taikhoan__Check_Login($email, $mat_khau);
                
                if($status != "0" ){
                    if($phanquyen->phanquyen__Get_By_Id($status->id_phan_quyen)->cap_bac == 1){
                        $_SESSION['admin'] = $status;
                        $_SESSION['super'] = $status;
                        header('location: ../admin/index.php?page=trang-chu');
                        break;
                    }
                    if($phanquyen->phanquyen__Get_By_Id($status->id_phan_quyen)->cap_bac == 2){
                        $_SESSION['admin'] = $status;
                        $_SESSION['manager'] = $status;
                        header('location: ../admin/index.php?page=trang-chu');
                        break;
                    }
                    if($phanquyen->phanquyen__Get_By_Id($status->id_phan_quyen)->cap_bac == 3){
                        $_SESSION['user'] = $status;

                        if($phannhom->phannhom__Get_By_Id($status->id_phan_nhom)->cap_bac == 1){
                            $canbokhoa__Get_By_Id = $canbokhoa->canbokhoa__Get_By_Id($status->id_nguoi_dung);
                            $_SESSION['cb'] = $status;
                        }

                        if($phannhom->phannhom__Get_By_Id($status->id_phan_nhom)->cap_bac == 2){
                            $giangvien__Get_By_Id = $giangvien->giangvien__Get_By_Id($status->id_nguoi_dung);
                            $_SESSION['gv'] = $status;
                            header('location: ../user/index.php?page=trang-chu');
                            break;
                        }
                }

                }else{
                    header('location: ../auth/index.php?status=error');
                }
                
                break;

            case 'doi-mat-khau':
                $id_tai_khoan = $_POST['id_tai_khoan'];
                $mat_khau = $_POST['mat_khau'];
                $status = $taikhoan->taikhoan__Reset($id_tai_khoan, $mat_khau);
                if($status != "0" ){
                    header('location: ../user/index.php?page=quan-ly-tai-khoan&status=success');
                }else{
                    header('location: ../user/index.php?page=quan-ly-tai-khoan&status=failed');
                }
                break; 

            case 'dang-xuat':

                session_destroy();
                header('location: ../auth/index.php');
                break;
            }
        }
?>