<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('location: ../auth/');
    exit();
}
require "../models/getModel.php";

?>


<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="index.php?page=trang-chu" class="brand-link">
        <img src="../assets/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">ADMIN</span>
    </a>

    <div class="sidebar">

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="#" class="d-block"><?= $_SESSION['admin']->email ?></a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="index.php?page=trang-chu" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Trang chủ
                        </p>
                    </a>
                </li>

                <!-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Thống kê
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="index.php?page=quan-ly-thanh-toan" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thanh toán</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?page=quan-ly-sum-nckh" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sum NCKH</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?page=quan-ly-sum-cong-viec" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sum công việc</p>
                            </a>
                        </li>

                    </ul>
                </li> -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Quản lý giờ dạy
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">


                        <!-- <li class="nav-item">
                            <a href="index.php?page=quan-ly-bang-ke" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Bảng kê giờ dạy</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="index.php?page=quan-ly-cong-viec" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Công việc</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="index.php?page=quan-ly-nckh" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>NCKH</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?page=quan-ly-giang-day" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Giảng dạy</p>
                            </a>
                        </li> -->

                        <li class="nav-item">
                            <a href="index.php?page=quan-ly-luong-giang-vien" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thống Kê Lương Giảng Viên</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?page=quan-ly-nhom-giang-day" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Loại giảng dạy</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="index.php?page=quan-ly-nhom-cong-viec" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Nhóm công việc</p>
                            </a>
                        </li>

                        <!-- <li class="nav-item">
                            <a href="index.php?page=quan-ly-bang-tham-chieu" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Bảng tham chiếu</p>
                            </a>
                        </li> -->
                        <li class="nav-item">
                            <a href="index.php?page=quan-ly-quy-doi" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Quy đổi số tiết</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?page=quan-ly-don-gia" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Đơn giá</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?page=quan-ly-index" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Index</p>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-database"></i>
                        <p>
                            Quản lý chung
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="index.php?page=quan-ly-khoa" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Khoa</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="index.php?page=quan-ly-can-bo-khoa" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Cán bộ khoa</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?page=quan-ly-giang-vien" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Giảng viên</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?page=quan-ly-trinh-do" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Trình độ</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?page=quan-ly-phan-nhom" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Phân nhóm</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?page=quan-ly-phan-quyen" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Phân quyền</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?page=quan-ly-tai-khoan" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tài khoản</p>
                            </a>
                        </li>
                    </ul>
                </li>


            </ul>
        </nav>
    </div>
</aside>