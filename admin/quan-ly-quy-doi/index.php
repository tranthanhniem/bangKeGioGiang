 <?php
    // require "../models/getModel.php";
    $quydoi__Get_All = $quydoi->quydoi__Get_All();
 ?>


 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                     <h1>Quản lý công việc</h1>
                 </div>
                 <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                         <li class="breadcrumb-item"><a href="#">Home</a></li>
                         <li class="breadcrumb-item active">Quản lý công việc</li>
                     </ol>
                 </div>
             </div>
         </div><!-- /.container-fluid -->
     </section>

     <section class="content">
         <form class="row form" action="quan-ly-quy-doi/action.php?req=add" method="post" enctype="multipart/form-data">
             <div class="col-12">
                 <div class="card card-success">
                     <div class="card-header">
                         <h3 class="card-title">Thêm mới</h3>
                         <div class="card-tools">
                             <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                 <i class="fas fa-minus"></i>
                             </button>
                         </div>
                     </div>
                     <div class="card-body">
                         <div class="form-group">
                             <label for="">Nhóm công việc<span class="color-crimson">(*)</span></label>
                             <select name="id_nhom_cong_viec" class="form-control">
                                 <option value="">Chọn nhóm</option>
                                 <?php foreach($nhomcongviec->nhomcongviec__Get_All() as $item):?>
                                 <option value="<?=$item->id_nhom_cong_viec?>"><?=$item->ten_nhom_cong_viec?></option>
                                 <?php endforeach?>
                             </select>
                         </div>
                         <div class="form-group">
                             <label for="">Mã công việc <span class="color-crimson">(*)</span></label>
                             <input type="text" id="ma_cong_viec" name="ma_cong_viec" class="form-control" required
                                 placeholder="Nhập mã công việc">
                         </div>
                         <div class="form-group">
                             <label for="">Tên công việc <span class="color-crimson">(*)</span></label>
                             <input type="text" id="ten_cong_viec" name="ten_cong_viec" class="form-control" required
                                 placeholder="Nhập tên công việc">
                         </div>
                         <div class="form-group">
                             <label for="">Quy đổi số tiết <span class="color-crimson">(*)</span></label>
                             <input type="number" min="0" max="400" step="any" id="quy_doi_so_tiet"
                                 name="quy_doi_so_tiet" class="form-control" required
                                 placeholder="Nhập quy đổi số tiết">
                         </div>
                         <div class="form-group">
                             <label for="">Điều kiện </label>
                             <input type="text" id="dieu_kien" name="dieu_kien" class="form-control"
                                 placeholder="Nhập điều kiện">
                         </div>
                     </div>
                     <!-- /.card-body -->
                     <div class="card-footer">
                         <input type="submit" value="Thêm mới" class="btn btn-success float-right">
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
                             <th>Tên nhóm</th>
                             <th>Tên công việc</th>
                             <th>Số tiết quy đổi</th>
                             <th>Thao tác</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php $num = 0;?>
                         <?php foreach($quydoi__Get_All as $item):?>
                         <tr>
                             <td><?=++$num?></td>
                             <td><?=$nhomcongviec->nhomcongviec__Get_By_Id($item->id_nhom_cong_viec)->ten_nhom_cong_viec?>
                             </td>
                             <td><?=$item->ten_cong_viec?></td>
                             <td><?=$item->quy_doi_so_tiet?></td>
                             <td>
                                 <a href="#" type="button" class="btn  btn-warning m-2"
                                     onclick="update_obj(<?=$item->id_quy_doi?>)">
                                     <i class="fas fa-edit"></i>
                                 </a>
                                 <a href="#" type="button" class="btn  btn-danger m-2"
                                     onclick="return confirm_sweet('quan-ly-quy-doi/action.php?req=delete&id_quy_doi=<?=$item->id_quy_doi?>')">
                                     <i class="fas fa-trash"></i>
                                 </a>
                             </td>
                         </tr>
                         <?php endforeach?>
                     </tbody>
                 </table>
             </div>
             <!-- /.card-body -->
         </div>
     </section>

 </div>


 <!-- /.content-wrapper -->


 <script>
function update_obj(id_quy_doi) {
    $.post('quan-ly-quy-doi/update.php', {
        'id_quy_doi': id_quy_doi,
    }, function(data) {
        $(".card.card-success").addClass('collapsed-card');
        $('#div_update').html(data);
    });
}
 </script>