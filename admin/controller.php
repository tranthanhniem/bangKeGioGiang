<?php 
    if(isset($_GET["page"])){
        switch($_GET["page"]){

            case "trang-chu":
                require "layouts/trang-chu.php";
                break;
                case "quan-ly-index":
                    require "quan-ly-index/index.php";
                    break;
            case "quan-ly-don-gia":
                require "quan-ly-don-gia/index.php";
                break;
            case "quan-ly-nhom-cong-viec":
                require "quan-ly-nhom-cong-viec/index.php";
                break;

            case "quan-ly-cong-viec":
                require "quan-ly-nhom-viec/index.php";
                break;
            case "quan-ly-quy-doi":
                require "quan-ly-quy-doi/index.php";
                break;
            case "quan-ly-nckh":
                require "quan-ly-nckh/index.php";
                break;

            case "quan-ly-nhom-giang-day":
                require "quan-ly-nhom-giang-day/index.php";
                break;
            case "quan-ly-giang-day":
                require "quan-ly-giang-day/index.php";
                break;
            case "quan-ly-sum-giang-day":
                require "quan-ly-sum-giang-day/index.php";
                break;
            case "quan-ly-sum-cong-viec":
                require "quan-ly-sum-cong-viec/index.php";
                break;
            case "quan-ly-thanh-toan":
                require "quan-ly-thanh-toan/index.php";
                break;


            case "quan-ly-khoa":
                require "quan-ly-khoa/index.php";
                break;
            case "quan-ly-can-bo-khoa":
                require "quan-ly-can-bo-khoa/index.php";
                break;
            case "quan-ly-trinh-do":
                require "quan-ly-trinh-do/index.php";
                break;
            case "quan-ly-phan-nhom":
                require "quan-ly-phan-nhom/index.php";
                break;
            case "quan-ly-phan-quyen":
                require "quan-ly-phan-quyen/index.php";
                break;
            case "quan-ly-tai-khoan":
                require "quan-ly-tai-khoan/index.php";
                break;
            case "quan-ly-giang-vien":
                require "quan-ly-giang-vien/index.php";
                break;
            case "quan-ly-tai-khoan":
                require "quan-ly-tai-khoan/index.php";
                break;
            case "quan-ly-luong-giang-vien":
                require "quan-ly-luong-giang-vien/index.php";
                break;
            case "error":
                require "layouts/error.php";
                break;

            default:
                echo "<script>location.href = 'index.php?page=error'</script>";
                break;
        }
    }else{
            echo "<script>location.href = 'index.php?page=trang-chu'</script>";
        }

?>