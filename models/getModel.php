<?php
    require "model/canbokhoa.php";
    require "model/congviec.php";
    require "model/dongia.php";
    require "model/giangday.php";
    require "model/giangvien.php";
    require "model/khoa.php";
    require "model/nckh.php";
    require "model/nhomcongviec.php";
    require "model/nhomgiangday.php";
    require "model/phannhom.php";
    require "model/phanquyen.php";
    require "model/sumcongviec.php";
    require "model/sumggnckh.php";
    require "model/bangthamchieu.php";
    require "model/taikhoan.php";
    require "model/bangke.php";
    require "model/trinhdo.php";
    require "model/quydoi.php";
    require "model/sumthanhtoan.php";
    require "model/indexcount.php";

    $indexcount = new indexcount();
    $canbokhoa = new canbokhoa();
    $congviec = new congviec();
    $dongia = new dongia();
    $giangday = new giangday();
    $giangvien = new giangvien();
    $khoa = new khoa();
    $nckh = new nckh();
    $nhomcongviec = new nhomcongviec();
    $nhomgiangday = new nhomgiangday();
    $phannhom = new phannhom();
    $phanquyen = new phanquyen();
    $sumcongviec = new sumcongviec();
    $sumggnckh = new sumggnckh();
    $bangthamchieu = new bangthamchieu();
    $bangke = new bangke();
    $taikhoan = new taikhoan();
    $trinhdo = new trinhdo();
    $quydoi = new quydoi();
    $sumthanhtoan = new sumthanhtoan();

?>