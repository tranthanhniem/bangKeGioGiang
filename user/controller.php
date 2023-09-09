<?php 
    if(isset($_GET["page"])){
        switch($_GET["page"]){

            case "trang-chu":
                require "layouts/trang-chu.php";
                break;
            case "quan-ly-giang-day":
                require "quan-ly-giang-day/index.php";
                break;
            case "quan-ly-bang-ke":
                require "quan-ly-bang-ke/index.php";
                break;
            case "quan-ly-cong-viec":
                require "quan-ly-cong-viec/index.php";
                break;
            case "quan-ly-nckh":
                require "quan-ly-nckh/index.php";
                break;
             case "quan-ly-thong-ke":
                require "quan-ly-thong-ke/index.php";
                break;
            case "quan-ly-tai-khoan":
                require "quan-ly-tai-khoan/index.php";
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