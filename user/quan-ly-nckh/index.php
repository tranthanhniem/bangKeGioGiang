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
    $nckh__Get_By_Id_Index_And_Id_Giang_Vien = $nckh->nckh__Get_By_Id_Index_And_Id_Giang_Vien($id_index, $id_giang_vien)
     
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
                                        <option value="index.php?page=quan-ly-nckh&id_index=<?=$item->id_index?>"
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
        <form class="row form" action="quan-ly-nckh/action.php?req=add" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_index" class="form-control" value="<?=$id_index?>" />
            <input type="hidden" name="id_giang_vien" class="form-control" value="<?=$id_giang_vien?>" />
            <div class="col-12">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Thêm mới NCKH</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Nội dung</label>
                            <input type="text" name="noi_dung" class="form-control" value=""
                                placeholder="Nhập nội dung" />
                        </div>
                        <div class="form-group">
                            <label for="">Thể loại</label>
                            <input type="text" name="the_loai" class="form-control" placeholder="Nhập hể loại" />
                        </div>
                        <div class="form-group">
                            <label for="">Số giờ quy chuẩn</label>
                            <input type="number" min="0" max="200" name="so_tiet_quy_chuan" class="form-control"
                                placeholder="Nhập số giờ quy chuẩn" />
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <input type="submit" value="Thêm" class="btn btn-success float-right">
                    </div>
                </div>
                <!-- /.card -->
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
                            <th>Nội dung</th>
                            <th>Số tiết quy chuẩn</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $num = 0;?>
                        <?php foreach($nckh__Get_By_Id_Index_And_Id_Giang_Vien as $item):?>
                        <tr onclick="update_obj(<?=$item->id_nckh?>)">
                            <td><?=++$num?></td>
                            <td><?=$item->noi_dung?></td>
                            <td><?=$item->so_tiet_quy_chuan?></td>
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
function update_obj(id_nckh) {
    $.post('quan-ly-nckh/update.php', {
        'id_nckh': id_nckh,
    }, function(data) {
        $(".card.card-success").addClass('collapsed-card');
        $('#div_update').html(data);
    });
}
</script>