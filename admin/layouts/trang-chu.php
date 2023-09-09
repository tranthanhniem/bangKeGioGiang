<?php
  if(!isset($_SESSION['admin'])){
    header('location: ../auth/');
    exit();
}

    $sumthanhtoan__Get_All = $sumthanhtoan->sumthanhtoan__Get_All();


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->

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
                <form class="form" action="" method="post" enctype="multipart/form-data">
                    <button type="submit" class="btn btn-success">
                        Cập nhật
                    </button>
                </form>
                <br>
                <table id="tablejs" class="table table-bordered table-striped display responsive nowrap" width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Đợt</th>
                            <th>Tên giảng viên</th>
                            <th>Tổng số tiết</th>
                            <th>Đơn giá</th>
                            <th>Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $num = 0;?>
                        <?php foreach($sumthanhtoan__Get_All as $item):?>
                        <tr>
                            <td><?=++$num?></td>
                            <td><?=$indexcount->indexcount__Get_By_Id($item->id_index)->ten_index?></td>

                            <td><?=$giangvien->giangvien__Get_By_Id($item->id_giang_vien)->ten_giang_vien?>
                            </td>
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