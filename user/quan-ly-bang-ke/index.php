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
    $bangke__Get_By_Index_Gv = $bangke->bangke__Get_By_Index_Gv($id_index, $id_giang_vien);


    $sum_giang_day = $giangday->giangday__Get_By_Id_Index_And_Id_Giang_Vien_Sum($id_index, $id_giang_vien)->sum_kq;
    $sum_nckh = $nckh->nckh__Get_By_Id_Index_And_Id_Giang_Vien_Sum($id_index, $id_giang_vien)->sum_kq;
    $sum_kq = $sum_giang_day  + $sum_nckh;

     
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
                                        <option value="index.php?page=quan-ly-bang-ke&id_index=<?=$item->id_index?>"
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
        </div>
    </section>
    <section class="content">

        <form class="row form" action="quan-ly-bang-ke/action.php?req=add" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_index" class="form-control" value="<?=$id_index?>" />
            <input type="hidden" name="id_giang_vien" class="form-control" value="<?=$id_giang_vien?>" />
            <div class="col-12">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Thêm mới bảng kê</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php $num = 0?>
                        <?php foreach($bangthamchieu->bangthamchieu__Get_All() as $item):?>
                        <br>
                            <?php if($item->key_index == 1):?>
                        <div class="row">
                            <div class="col">
                                <label for="">Nội dung</label>
                                <div class="form-group m-1">
                                    <input type="text" class="form-control" name="noi_dung[]" required
                                        placeholder="noi_dung" readonly value="<?=$item->noi_dung?>" />
                                </div>
                                <label for="">Giảng dạy</label>
                                <div class="form-group m-1">
                                    <input type="number" class="hp form-control" name="sum_giang_day[]" required
                                        placeholder="sum_giang_day" readonly value="<?=$item->sum_giang_day?>"
                                        id="sum_giang_day_1" />

                                </div>
                                <label for="">NCKH</label>

                                <div class="form-group m-1">
                                    <input type="number" class="hp form-control" name="sum_nckh[]" required
                                        placeholder="sum_nckh" readonly value="<?=$item->sum_nckh?>" id="sum_nckh_1" />

                                </div>
                                <label for="">Tổng</label>
                                <div class="form-group m-1">
                                    <input type="number" class="hp form-control" name="sum_kq[]" required
                                        placeholder="sum_kq" readonly
                                        value="<?=$item->sum_giang_day + $item->sum_nckh?>" id="sum_kq_1" />
                                </div>
                            </div>
                        </div>
                        <?php endif?>
                        <br>
                        <?php if($item->key_index == 2):?>
                        <div class="row">
                            <div class="col">
                            <label for="">Nội dung</label>

                                <div class="form-group m-1">
                                    <input type="text" class="form-control" name="noi_dung[]" required
                                        placeholder="noi_dung" readonly value="<?=$item->noi_dung?>" />
                                </div>
                                <label for="">Giảng dạy</label>

                                <div class="form-group m-1">
                                    <input type="number" class="hp form-control" name="sum_giang_day[]" required min="0"
                                        placeholder="sum_giang_day" id="sum_giang_day_2" value="0" />

                                </div>
                                <label for="">NCKH</label>

                                <div class="form-group m-1">
                                    <input type="number" class="hp form-control" name="sum_nckh[]" required min="0"
                                        placeholder="sum_nckh" id="sum_nckh_2" value="0" />

                                </div>
                                <label for="">Tổng</label>

                                <div class="form-group m-1">
                                    <input type="number" class="hp form-control" name="sum_kq[]" required
                                        placeholder="sum_kq" id="sum_kq_2" value="0" />

                                </div>
                            </div>
                        </div>
                        <?php endif?>
                        <br>
                        <?php if($item->key_index == 3):?>
                        <div class="row ">

                            <div class="col ">
                            <label for="">Nội dung</label>

                                <div class="form-group m-1">
                                    <input type="text" class="form-control" name="noi_dung[]" required
                                        placeholder="noi_dung" readonly value="<?=$item->noi_dung?>" />
                                </div>
                                <label for="">Giảng dạy</label>

                                <div class="form-group m-1">
                                    <input type="number" class="hp form-control" name="sum_giang_day[]" required
                                        readonly placeholder="sum_giang_day" value="<?=$item->sum_giang_day?>"
                                        id="sum_giang_day_3" />

                                </div>
                                <label for="">NCKH</label>

                                <div class="form-group m-1">
                                    <input type="number" class="hp form-control" name="sum_nckh[]" required
                                        placeholder="sum_nckh" readonly value="<?=$item->sum_nckh?>" id="sum_nckh_3" />

                                </div>
                                <label for="">Tổng</label>

                                <div class="form-group m-1">
                                    <input type="number" class="hp form-control" name="sum_kq[]" required
                                        placeholder="sum_kq" readonly
                                        value="<?=$item->sum_giang_day + $item->sum_nckh?>" id="sum_kq_3" />

                                </div>
                            </div>
                        </div>
                        <?php endif?>
                        <br>
                        <?php if($item->key_index == 4):?>
                        <div class="row">


                            <div class="col">
                            <label for="">Nội dung</label>

                                <div class="form-group m-1">
                                    <input type="text" class="form-control" name="noi_dung[]" required readonly
                                        placeholder="noi_dung" readonly value="<?=$item->noi_dung?>" />
                                </div>
                                <label for="">Giảng dạy</label>

                                <div class="form-group m-1">
                                    <input type="number" class="hp form-control" name="sum_giang_day[]" required
                                        readonly placeholder="sum_giang_day" value="<?=$sum_giang_day?>"
                                        id="sum_giang_day_4" />

                                </div>
                                <label for="">NCKH</label>

                                <div class="form-group m-1">
                                    <input type="number" class="hp form-control" name="sum_nckh[]" required readonly
                                        placeholder="sum_nckh" value="<?=$sum_nckh?>" id="sum_nckh_4" />

                                </div>
                                <label for="">Tổng</label>

                                <div class="form-group m-1">
                                    <input type="number" class="hp form-control" name="sum_kq[]" required readonly
                                        placeholder="sum_kq" readonly value="<?=$sum_kq?>" id="sum_kq_4" />

                                </div>
                            </div>
                        </div>
                        <?php endif?>

                        <br>
                        <?php if($item->key_index == 5):?>
                        <div class="row">


                            <div class="col">
                            <label for="">Nội dung</label>

                                <div class="form-group m-1">
                                    <input type="text" class="form-control" name="noi_dung[]" required readonly
                                        placeholder="noi_dung" readonly value="<?=$item->noi_dung?>" />
                                </div>
                                <label for="">Giảng dạy</label>

                                <div class="form-group m-1">
                                    <input type="number" class="hp form-control" name="sum_giang_day[]" required
                                        readonly placeholder="sum_giang_day"
                                        value="<?=$sum_giang_day - $item->sum_giang_day?>" id="sum_giang_day_5" />

                                </div>
                                <label for="">NCKH</label>

                                <div class="form-group m-1">
                                    <input type="number" class="hp form-control" name="sum_nckh[]" required readonly
                                        placeholder="sum_nckh" value="<?=$sum_nckh - $item->sum_nckh?>"
                                        id="sum_nckh_5" />

                                </div>
                                <label for="">Tổng</label>

                                <div class="form-group m-1">
                                    <input type="number" class="hp form-control table-success" name="sum_kq[]" required
                                        readonly placeholder="sum_kq" readonly
                                        value="<?=($sum_giang_day - $item->sum_giang_day )+ ($sum_nckh - $item->sum_nckh)?>"
                                        id="sum_kq_5" />
                                </div>
                            </div>
                        </div>
                        <?php endif?>

                        <?php endforeach; ?>
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
                        <?php foreach($bangke__Get_By_Index_Gv as $item):?>
                        <tr>
                            <td><?=++$num?></td>
                            <td><?=$item->noi_dung?></td>
                            <td><?=$item->sum_kq?></td>
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