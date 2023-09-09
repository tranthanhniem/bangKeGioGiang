<?php
    // require "../models/getModel.php";
    $sumthanhtoan__Get_All = $sumthanhtoan->sumthanhtoan__Get_All();
    $giangvien__Get_All = $giangvien->giangvien__Get_All();
 ?>


 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                     <h1>Quản lý lương giảng viên</h1>
                 </div>
                 <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                         <li class="breadcrumb-item"><a href="#">Home</a></li>
                         <li class="breadcrumb-item active">Quản lý lương giảng viên</li>
                     </ol>
                 </div>
             </div>
         </div>
     </section>
     <section class="content">
         <div class="card card-primary">
             <div class="card-header">
                 <h3 class="card-title"></h3>
                 <div class="card-tools">
                     <form action="quan-ly-luong-giang-vien/action.php?req=import" method="post" enctype="multipart/form-data"
                         class="input-group">
                         <input type="file" name="file" accept=".xlsx, .xls" class="btn btn-tool m-1" required />
                         <button type="submit" class="input-group-text" for="inputGroupFile01">
                             <i class="fas fa-upload"></i>
                         </button>
                     </form>
                 </div>
             </div>
         </div>
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
                             <th>Tên giảng viên</th>
                             <th>Đợt</th>
                             <th>Đơn giá</th>
                             <th>Số tiết</th>
                             <th>Thành tiền</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php $num = 0;?>
                         <?php foreach($sumthanhtoan__Get_All as $item):?>
                         <tr>
                             <td><?=++$num?></td>
                             <td><?=$giangvien->giangvien__Get_By_Id($item->id_giang_vien)->ten_giang_vien?></td>
                             <td><?=$indexcount->indexcount__Get_By_Id($item->id_index)->ten_index?></td>
                             <td><?=$item->don_gia?></td>
                             <td><?=$item->so_tiet?></td>
                             <td><?=$item->thanh_tien?></td>
                         </tr>
                         <?php endforeach?>
                     </tbody>
                 </table>
             </div>
             <!-- /.card-body -->
         </div>
 </div>
 </section>

 </div>


 <!-- /.content-wrapper -->


 <script>
function update_obj(id_sum_thanh_toan) {
    $.post('quan-ly-luong-giang-vien/update.php', {
        'id_sum_thanh_toan': id_sum_thanh_toan,
    }, function(data) {
        $(".card.card-success").addClass('collapsed-card');
        $('#div_update').html(data);
    });
}
 </script>