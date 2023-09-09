 <?php
    // require "../models/getModel.php";
    $indexcount__Get_All = $indexcount->indexcount__Get_All();
 ?>


 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                     <h1>Quản lý index</h1>
                 </div>
                 <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                         <li class="breadcrumb-item"><a href="#">Home</a></li>
                         <li class="breadcrumb-item active">Quản lý index</li>
                     </ol>
                 </div>
             </div>
         </div><!-- /.container-fluid -->
     </section>

     <section class="content">
         <form class="row form" action="quan-ly-index/action.php?req=add" method="post" enctype="multipart/form-data">
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
                             <label for="">Tên đợt <span class="color-crimson">(*)</span></label>
                             <input type="text" id="ten_index" name="ten_index" class="form-control" required
                                 placeholder="Nhập đợt">
                         </div>
                         <div class="form-group">
                             <label for="">Ghi chú</label>
                             <textarea id="ghi_chu" name="ghi_chu" class="form-control"
                                 placeholder="Nhập ghi chú"></textarea>
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
                             <th>Tên đợt</th>
                             <th>Ghi chú</th>
                             <th>Thao tác</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php $num = 0;?>
                         <?php foreach($indexcount__Get_All as $item):?>
                         <tr>
                             <td><?=++$num?></td>
                             <td><?=$item->ten_index?></td>
                             <td><?=$item->ghi_chu?></td>
                             <td>
                                 <a href="#" type="button" class="btn  btn-warning m-2"
                                     onclick="update_obj(<?=$item->id_index?>)">
                                     <i class="fas fa-edit"></i>
                                 </a>
                                 <a href="#" type="button" class="btn  btn-danger m-2"
                                     onclick="return confirm_sweet('quan-ly-index/action.php?req=delete&id_index=<?=$item->id_index?>')">
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
function update_obj(id_index) {
    $.post('quan-ly-index/update.php', {
        'id_index': id_index,
    }, function(data) {
        $(".card.card-success").addClass('collapsed-card');
        $('#div_update').html(data);
    });
}
 </script>