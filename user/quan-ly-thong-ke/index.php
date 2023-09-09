<?php
    if(!isset($_SESSION['gv'])){
        header('location: ../auth/');
        exit();
    }

    $id_index = 1;
    if(isset($_GET['id_index'])){
        $id_index = $_GET['id_index'];
    }
    
    $id_giang_vien = $_SESSION['gv']->id_nguoi_dung;
    $sumthanhtoan__Get_By_Index_Giang_Vien = $sumthanhtoan->sumthanhtoan__Get_By_Index_Giang_Vien($id_index, $id_giang_vien);


    $sum_giang_day = $giangday->giangday__Get_By_Id_Index_And_Id_Giang_Vien_Sum($id_index, $id_giang_vien)->sum_kq;
    $sum_nckh = $nckh->nckh__Get_By_Id_Index_And_Id_Giang_Vien_Sum($id_index, $id_giang_vien)->sum_kq;
    $sum_kq =floatval( $sum_giang_day)  + floatval($sum_nckh);

    $sum_cvk = $congviec->congviec__Get_By_Id_Giang_Vien_And_Id_Index_Sum($id_giang_vien, $id_index)->sum_kq;
    $sum_nckh =  $nckh->nckh__Get_By_Id_Index_And_Id_Giang_Vien_Sum($id_index, $id_giang_vien)->sum_kq;
    $sum_bk=  isset($bangke->bangke__Get_By_Index_Gv_SUM($id_index, $id_giang_vien)->sum_kq) ? $bangke->bangke__Get_By_Index_Gv_SUM($id_index, $id_giang_vien)->sum_kq : 0;
 
    $so_tiet = floatval($sum_cvk) + floatval($sum_bk); 
    $dongia__Get_Last  = $dongia->dongia__Get_Last();

        $sumthanhtoan->sumthanhtoan__Delete_Index_Giang_Vien($id_index, $id_giang_vien);
        $sumthanhtoan->sumthanhtoan__Add($id_index, $id_giang_vien, $dongia__Get_Last->id_don_gia, $so_tiet, $dongia__Get_Last->don_gia, floatval($dongia__Get_Last->don_gia) * floatval($so_tiet));
?>
<style>
ol.breadcrumb.float-sm-right {
    float: left;
    width: 100%;
}
</style>
<!-- Content Wrapper. Contains page content -->
<div class="ml-0 mr-3 content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <div class="card-tools">
                            <nav class="ml-0 main-header navbar navbar-expand navbar-white navbar-light">
                                <ul class="">
                                    <select name="id_index" onchange="location = this.value"
                                        class="nav-item form-control">
                                        <option value="">Chọn đợt</option>
                                        <?php foreach($indexcount->indexcount__Get_All() as $item): ?>
                                        <option value="index.php?page=quan-ly-thong-ke&id_index=<?=$item->id_index?>"
                                            <?=$item->id_index == $id_index ? "selected" : ""?>><?=$item->ten_index?>
                                        </option>
                                        <?php endforeach?>
                                    </select>


                                    <li class="nav-item ">
                                        <a class="nav-link" href="index.php?page=quan-ly-giang-day">
                                            <i class="fas fa-edit"></i>
                                            Giảng dạy
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link" href="index.php?page=quan-ly-nckh">
                                            <i class="fas fa-edit"></i>
                                            NCKH
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link" href="index.php?page=quan-ly-cong-viec">
                                            <i class="fas fa-edit"></i>
                                            Công tác khác
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link" href="index.php?page=quan-ly-bang-ke">
                                            <i class="fas fa-edit"></i>
                                            Bảng kê
                                        </a>
                                    </li>

                                    <li class="nav-item ">
                                        <a class="nav-link" href="index.php?page=quan-ly-thong-ke">
                                            <i class="fas fa-chart-pie"></i>
                                            Thống kê
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </ol>
                </div>
                <div class="col-sm-6">
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Danh sách</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
                    <a href="" class="btn btn-success">Reset</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="tablejs" class="table table-bordered table-striped display responsive nowrap" width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Đợt</th>
                            <th>Tổng số tiết</th>
                            <th>Đơn giá</th>
                            <th>Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $num = 0;?>
                        <?php foreach($sumthanhtoan__Get_By_Index_Giang_Vien as $item):?>
                        <tr>
                            <td><?=++$num?></td>
                            <td><?=$item->id_index?></td>
                            <td><?=$item->so_tiet?></td>
                            <td><?=$item->don_gia?></td>
                            <td><?=number_format($item->thanh_tien, 0, '', ',')?></td>
                        </tr>
                        <?php endforeach?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </section>
</div>


<script>
function update_obj(id_cong_viec) {
    $.post('quan-ly-cong-viec/update.php', {
        'id_cong_viec': id_cong_viec,
    }, function(data) {
        $(".card.card-success").addClass('collapsed-card');
        $('#div_update').html(data);
    });
}
window.addEventListener("load", function() {

    $('.hp').change(function() {
        $sum_giang_day_3 = document.getElementById('sum_giang_day_3').value =
            parseFloat(document.getElementById('sum_giang_day_1').value) +
            parseFloat(document.getElementById('sum_giang_day_2').value);

        $sum_nckh_3 = document.getElementById('sum_nckh_3').value =
            parseFloat(document.getElementById('sum_nckh_1').value) -
            parseFloat(document.getElementById('sum_nckh_2').value);

        $sum_giang_day_5 = document.getElementById('sum_giang_day_5').value =
            parseFloat(document.getElementById('sum_giang_day_4').value) -
            parseFloat(document.getElementById('sum_giang_day_3').value);

        $sum_nckh_5 = document.getElementById('sum_nckh_5').value =
            parseFloat(document.getElementById('sum_nckh_4').value) -
            parseFloat(document.getElementById('sum_nckh_3').value);


        $sum_kq_2 = document.getElementById('sum_kq_2').value =
            parseFloat(document.getElementById('sum_giang_day_2').value) +
            parseFloat(document.getElementById('sum_nckh_2').value);

        $sum_kq_3 = document.getElementById('sum_kq_3').value =
            parseFloat(document.getElementById('sum_giang_day_3').value) +
            parseFloat(document.getElementById('sum_nckh_3').value);
        $sum_kq_4 = document.getElementById('sum_kq_4').value =
            parseFloat(document.getElementById('sum_giang_day_4').value) +
            parseFloat(document.getElementById('sum_nckh_4').value);
        $sum_kq_5 = document.getElementById('sum_kq_5').value =
            parseFloat(document.getElementById('sum_giang_day_5').value) +
            parseFloat(document.getElementById('sum_nckh_5').value);
    });
});
</script>