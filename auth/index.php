<?php
    session_start();
    require '../models/getModel.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KHÓA LUẬN</title>
    <link rel="icon" href="../assets/img/favicon.ico" type="image/gif" sizes="16x16">
    <meta name="description" content="KHÓA LUẬN">
    <!-- CSS Files -->
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../assets/theme/plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="../assets/theme/dist/css/adminlte.min.css">
    <link type="text/css" rel="stylesheet" href="../assets/css/signin.css" />
</head>

<body>
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex align-items-center justify-content-center h-100">
                <div class="col res-hidden">
                    <img src="../assets/img/logo.png" class="img-fluid p-5" alt="login">
                </div>
                <div class="col">
                    <div class="res-show">
                        <img src="../assets/img/logo.png" class="img-fluid p-5" alt="login">
                    </div>
                    <form class="form-signin" action="action.php?req=dang-nhap" method="post">
                        <div class="form-outline mb-4">
                            <div class="form-title">
                                <h1>L<span class="o-img">
                                        <img src="../assets/img/login.png">
                                    </span>GIN PAGE</h1>
                                <span class="text-muted">welcome back...</span>
                            </div>
                        </div>
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="email">Email</label>
                            <input type="text" id="email" name="email" class="form-control form-control-lg">
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="mat_khau">Mật khẩu</label>
                            <input type="password" name="mat_khau" id="mat_khau" class="form-control form-control-lg">
                        </div>

                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Đăng nhập ngay</button>
                    </form>
                </div>
            </div>
        </div>
    </section>


    <!-- Js Files -->
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../assets/theme/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- AdminLTE App -->
    <script src="../assets/theme/dist/js/adminlte.min.js"></script>

    <script src="../assets/vendor/sweetalert2@11.js"></script>

    <?php
       if(isset($_GET['status'])){
        if($_GET['status'] == "error"){
        echo "<script>
        Swal.fire(
            'Đăng nhập không thành công!',
            'Thông tin đăng nhập không đúng hoặc tài khoản bị khóa!',
            'error'
          )</script>";
    }
}
?>
</body>

</html>