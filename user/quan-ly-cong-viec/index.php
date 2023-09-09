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
    $congviec__Get_By_Id_Giang_Vien_And_Id_Index = $congviec->congviec__Get_By_Id_Giang_Vien_And_Id_Index($id_giang_vien, $id_index);
     
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
                                        <option value="index.php?page=quan-ly-cong-viec&id_index=<?=$item->id_index?>"
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

                <div class="col-sm-6"></div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
       
        <form class="row form" action="quan-ly-cong-viec/action.php?req=add" method="post"
            enctype="multipart/form-data">
            <input type="hidden" name="id_index" class="form-control" value="<?=$id_index?>" />
            <input type="hidden" name="id_giang_vien" class="form-control" value="<?=$id_giang_vien?>" />
            <div class="col-12">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Thêm mới công tác khác</h3>
                        <div class="card-tools">
                        Tổng: <?=
            $sum_cvk = round($congviec->congviec__Get_By_Id_Giang_Vien_And_Id_Index_Sum($id_giang_vien, $id_index)->sum_kq);

        ?>
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php $num = 0?>
                        <?php foreach($quydoi->quydoi__Get_All() as $item):?>
                        <?php if($num < 1):?>
                        <input type="hidden" name="id_quy_doi[]" id="id_quy_doi" class="form-control"
                            value="<?=$item->id_quy_doi?>" />
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Công việc</label>
                                    <input type="text" name="ten_cong_viec[]" id="ten_cong_viec" class="form-control"
                                        value="<?=$item->ten_cong_viec?>" />
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Số lượng</label>
                                    <input step="any" type="number"  min="0" max="200" required name="so_luong[]" id="so_luong"
                                        class="form-control hp" value="0" />
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Quy đổi số tiết</label>
                                    <input step="any" type="number" min="0" max="200" required name="quy_doi_so_tiet[]"
                                        id="quy_doi_so_tiet" value="<?=$item->quy_doi_so_tiet?>"
                                        class="form-control  hp" />
                                </div>
                            </div>
                            <input type="hidden" min="0" max="200" required name="tong_so_tiet[]" id="tong_so_tiet"
                                class="form-control hp"
                                value="<?=floatval($item->quy_doi_so_tiet) * floatval($item->so_luong)?>" />
                        </div>




                        <?php else:?>
                        <input type="hidden" name="id_quy_doi[]" id="id_quy_doi" class="form-control"
                            value="<?=$item->id_quy_doi?>" />
                        <div class="row">
                            <div class="col">

                                <div class="form-group">
                                    <input type="text" name="ten_cong_viec[]" id="ten_cong_viec" class="form-control"
                                        value="<?=$item->ten_cong_viec?>" />
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <input step="any" type="number" min="0" max="200" required name="so_luong[]" id="so_luong"
                                        class="form-control hp" value="0" />
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <input step="any" type="number" min="0" max="200" required name="quy_doi_so_tiet[]"
                                        id="quy_doi_so_tiet" value="<?=$item->quy_doi_so_tiet?>"
                                        class="form-control  hp" />
                                </div>
                            </div>
                            <input type="hidden" min="0" max="200" required name="tong_so_tiet[]" id="tong_so_tiet"
                                class="form-control hp"
                                value="<?=floatval($item->quy_doi_so_tiet) * floatval($item->so_luong)?>" />
                        </div>
                        <?php endif?>
                        <?php $num ++?>

                        <?php endforeach?>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <input type="submit" value="Thêm" class="btn btn-success float-right">
                </div>
            </div>
        </form>
    </section>
    <section class="content" id="div_update">
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
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="tablejs" class="table table-bordered table-striped display responsive nowrap" width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên công việc</th>
                            <th>Số tiết quy chuẩn</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $num = 0;?>
                        <?php foreach($congviec__Get_By_Id_Giang_Vien_And_Id_Index as $item):?>
                        <tr onclick="update_obj(<?=$item->id_cong_viec?>)">
                            <td><?=++$num?></td>
                            <td><?=$item->ten_cong_viec?></td>
                            <td><?=$item->tong_so_tiet?></td>
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

window.addEventListener('load', function() {
    so_luong = document.querySelectorAll("#so_luong");
    quy_doi_so_tiet = document.querySelectorAll("#quy_doi_so_tiet");
    tong_so_tiet = document.querySelectorAll("#tong_so_tiet");

    $('.hp').change(function() {
        tong_so_tiet[0].value = ((quy_doi_so_tiet[0].value * so_luong[0].value)).toFixed();
    });
});
</script>