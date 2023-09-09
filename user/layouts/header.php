<!-- header -->
<?php 
    session_start();
    if(!isset($_SESSION['user'])){
        header('location: ../auth/');
        exit();
    }
    require "../models/getModel.php";

?>
<!-- Navbar -->
<nav class="ml-0 main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fas fa-user"></i>
                Tài khoản
                <i class="fas fa-caret-down"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                <a href="?page=quan-ly-tai-khoan" class="dropdown-item">
                    <i class="fas fa-user-cog"></i>
                    Đổi mật khẩu
                </a>
                <div class="dropdown-divider"></div>
                <a href="../auth/action.php?req=dang-xuat" class="dropdown-item">
                    <i class="fas fa-sign-out-alt"></i>
                    Đăng xuất
                </a>
            </div>
        </li>

    </ul>
</nav>