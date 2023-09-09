 <?php
    // require "../models/getModel.php";
    $taikhoan__Get_All = $taikhoan->taikhoan__Get_All();
    $phannhom__Get_All = $phannhom->phannhom__Get_All();
    $khoa__Get_All = $khoa->khoa__Get_All();
    $taikhoan__Get_All_All = $taikhoan->taikhoan__Get_All();
    $taikhoan__Get_All_Manager = $taikhoan->taikhoan__Get_All_Phan_Nhom(0);
    $taikhoan__Get_All_Can_Bo_Khoa = $taikhoan->taikhoan__Get_All_Phan_Nhom(1);
    $taikhoan__Get_All_Giang_Vien = $taikhoan->taikhoan__Get_All_Phan_Nhom(2);
    if(isset($_GET['view'])){
        $view = $_GET['view'];
        if($view == 'view_All'){
            $taikhoan__Get_All = $taikhoan->taikhoan__Get_All();
        }
        if($view == 'view_Manager'){
            $taikhoan__Get_All = $taikhoan->taikhoan__Get_All_Phan_Nhom(0);
        }
        if($view == 'view_Can_Bo_Khoa'){
            $taikhoan__Get_All = $taikhoan->taikhoan__Get_All_Phan_Nhom(1);
        }
        if($view == 'view_Giang_Vien'){
            $taikhoan__Get_All = $taikhoan->taikhoan__Get_All_Phan_Nhom(2);
        }
   
        
    }
 ?>


 <style>
select#bootstrap-duallistbox-nonselected-list_id_doi_tuong\[\],
select#bootstrap-duallistbox-nonselected-list_,
select#bootstrap-duallistbox-selected-list_id_doi_tuong\[\],
select#bootstrap-duallistbox-selected-list_ {
    display: block;
    width: 100%;
    height: calc(2.25rem + 2px);
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    box-shadow: inset 0 0 0 transparent;
    transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
}

button.btn.moveall.btn-outline-secondary:before {
    content: 'Chưa chọn (Click chọn tất cả)';
}

button.btn.removeall.btn-outline-secondary:before {
    content: 'Đã chọn (Click bỏ chọn tất cả)';
}
 </style>
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                     <h1>Quản lý tài khoản</h1>
                 </div>
                 <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                         <li class="breadcrumb-item"><a href="#">Home</a></li>
                         <li class="breadcrumb-item active">Quản lý tài khoản</li>
                     </ol>
                 </div>
             </div>
         </div><!-- /.container-fluid -->
     </section>

     <section class="content">
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
                         <label for="">Phân nhóm <span class="color-crimson">(*)</span></label>
                         <select class="form-control" name="id_phan_nhom" required onchange="location.href=this.value">
                             <?php if(isset($_GET['id_phan_nhom'])):?>
                             <?php $id_phan_nhom = $_GET['id_phan_nhom'];?>
                             <option value="<?=$id_phan_nhom?>">
                                 <?=$phannhom->phannhom__Get_By_Id($id_phan_nhom)->ten_phan_nhom?>
                             </option>
                             <?php foreach ($phannhom__Get_All as $item):?>
                             <?php if($item->id_phan_nhom != $id_phan_nhom):?>
                             <option value="?page=quan-ly-tai-khoan&id_phan_nhom=<?=$item->id_phan_nhom?>">
                                 <?=$item->ten_phan_nhom?>
                             </option>
                             <?php endif?>
                             <?php endforeach; ?>
                             <?php else:?>
                             <option value="">Chọn Phân nhóm</option>
                             <?php foreach ($phannhom__Get_All as $item):?>
                             <option value="?page=quan-ly-tai-khoan&id_phan_nhom=<?=$item->id_phan_nhom?>">
                                 <?=$item->ten_phan_nhom?>
                             </option>
                             <?php endforeach; ?>
                             <?php endif?>

                         </select>
                     </div>
                 </div>

                 <?php if(isset($_GET['id_phan_nhom'])):?>
                 <?php $id_phan_nhom = $_GET['id_phan_nhom'];?>


                 <!-- ADMIN -->
                 <?php if($phannhom->phannhom__Get_By_Id($id_phan_nhom)->cap_bac == 0):?>
                 <form action="quan-ly-tai-khoan/action.php?req=add_admin" method="post" enctype="multipart/form-data">
                     <input type="hidden" name="id_phan_nhom" value="<?=$id_phan_nhom?>">
                     <input type="hidden" name="id_phan_quyen"
                         value="<?=$phanquyen->phanquyen__Get_By_Cap_Bac(1)->id_phan_quyen?>">
                     <div class="card-body">
                         <div class="form-group">
                             <label for="">Email <span class="color-crimson">(*)</span></label>
                             <input type="email" id="email" name="email" class="form-control" required
                                 placeholder="Nhập email">
                         </div>
                         <div class="form-group">
                             <label for="">Mật khẩu <span class="color-crimson">(*)</span></label>
                             <input type="password" id="mat_khau" name="mat_khau" class="form-control" required
                                 placeholder="Nhập mật khẩu">
                         </div>
                     </div>
                     <div class="card-footer">
                         <input type="submit" value="Thêm mới" class="btn btn-success float-right">
                     </div>
                 </form>
                 <?php endif?>
                 <!-- END ADMIN -->

                 <!-- Can_Bo_Khoa  -->
                 <?php if($phannhom->phannhom__Get_By_Id($id_phan_nhom)->cap_bac == 1):?>
                 <div class="card-body">
                     <div class="form-group">
                         <label for="">Chọn khoa <span class="color-crimson">(*)</span></label>
                         <select class="form-control" name="id_khoa" required onchange="location.href=this.value">
                             <?php if(isset($_GET['id_khoa'])):?>
                             <?php $id_khoa = $_GET['id_khoa'];?>
                             <option value="<?=$id_khoa?>">
                                 <?=$khoa->khoa__Get_By_Id($id_khoa)->ten_khoa?>
                             </option>
                             <?php foreach ($khoa__Get_All as $item):?>
                             <?php if($item->id_khoa != $id_khoa):?>
                             <option
                                 value="?page=quan-ly-tai-khoan&id_phan_nhom=<?=$id_phan_nhom?>&id_khoa=<?=$item->id_khoa?>">
                                 <?=$item->ten_khoa?>
                             </option>
                             <?php endif?>
                             <?php endforeach; ?>
                             <?php else:?>
                             <option value="">Chọn khoa</option>
                             <?php foreach ($khoa__Get_All as $item):?>
                             <option
                                 value="?page=quan-ly-tai-khoan&id_phan_nhom=<?=$id_phan_nhom?>&id_khoa=<?=$item->id_khoa?>">
                                 <?=$item->ten_khoa?>
                             </option>
                             <?php endforeach; ?>
                             <?php endif?>

                         </select>
                     </div>
                 </div>

                 <?php if(isset($_GET['id_khoa'])):?>
                 <?php 
                    $id_khoa = $_GET['id_khoa'];
                    $canbokhoa__Get_All_Not_Exits = $canbokhoa->canbokhoa__Get_All_Not_Exits($id_khoa);

                 ?>

                 <form action="quan-ly-tai-khoan/action.php?req=add_can_bo_khoa" method="post"
                     enctype="multipart/form-data">
                     <input type="hidden" name="id_phan_nhom" value="<?=$id_phan_nhom?>">
                     <input type="hidden" name="id_phan_quyen"
                         value="<?=$phanquyen->phanquyen__Get_By_Cap_Bac(1)->id_phan_quyen?>">
                     <div class="card-body">
                         <div class="form-group">
                             <label for="">Chọn cán bộ khoa <span class="color-crimson">(*)</span></label>
                             <select class="duallistbox" multiple="multiple" name="id_nguoi_dung[]" required>
                                 <?php foreach ($canbokhoa__Get_All_Not_Exits as $item):?>
                                 <option value="<?=$item->id_can_bo_khoa?>">
                                     <?=$item->ten_can_bo_khoa?>
                                 </option>
                                 <?php endforeach; ?>
                             </select>
                         </div>
                     </div>
                     <div class="card-footer">
                         <input type="submit" value="Thêm mới" class="btn btn-success float-right">
                     </div>
                 </form>
                 <?php endif?>
                 <?php endif?>
                 <!--END canbokhoa -->

                 <!-- giang_vien  -->
                 <?php if($phannhom->phannhom__Get_By_Id($id_phan_nhom)->cap_bac == 2):?>
                 <div class="card-body">
                     <div class="form-group">
                         <label for="">Chọn khoa <span class="color-crimson">(*)</span></label>
                         <select class="form-control" name="id_khoa" required onchange="location.href=this.value">
                             <?php if(isset($_GET['id_khoa'])):?>
                             <?php $id_khoa = $_GET['id_khoa'];?>
                             <option value="<?=$id_khoa?>">
                                 <?=$khoa->khoa__Get_By_Id($id_khoa)->ten_khoa?>
                             </option>
                             <?php foreach ($khoa__Get_All as $item):?>
                             <?php if($item->id_khoa != $id_khoa):?>
                             <option
                                 value="?page=quan-ly-tai-khoan&id_phan_nhom=<?=$id_phan_nhom?>&id_khoa=<?=$item->id_khoa?>">
                                 <?=$item->ten_khoa?>
                             </option>
                             <?php endif?>
                             <?php endforeach; ?>
                             <?php else:?>
                             <option value="">Chọn khoa</option>
                             <?php foreach ($khoa__Get_All as $item):?>
                             <option
                                 value="?page=quan-ly-tai-khoan&id_phan_nhom=<?=$id_phan_nhom?>&id_khoa=<?=$item->id_khoa?>">
                                 <?=$item->ten_khoa?>
                             </option>
                             <?php endforeach; ?>
                             <?php endif?>

                         </select>
                     </div>
                 </div>

                 <?php if(isset($_GET['id_khoa'])):?>
                 <?php 
                    $id_khoa = $_GET['id_khoa'];
                    $giangvien__Get_All_Not_Exits = $giangvien->giangvien__Get_All_Not_Exits($id_khoa);

                 ?>

                 <form action="quan-ly-tai-khoan/action.php?req=add_giang_vien" method="post"
                     enctype="multipart/form-data">
                     <input type="hidden" name="id_phan_nhom" value="<?=$id_phan_nhom?>">
                     <input type="hidden" name="id_phan_quyen"
                         value="<?=$phanquyen->phanquyen__Get_By_Cap_Bac(3)->id_phan_quyen?>">
                     <div class="card-body">
                         <div class="form-group">
                             <label for="">Chọn cán bộ khoa <span class="color-crimson">(*)</span></label>
                             <select class="duallistbox" multiple="multiple" name="id_nguoi_dung[]" required>
                                 <?php foreach ($giangvien__Get_All_Not_Exits as $item):?>
                                 <option value="<?=$item->id_giang_vien?>">
                                     <?=$item->ten_giang_vien?>
                                 </option>
                                 <?php endforeach; ?>
                             </select>
                         </div>
                     </div>
                     <div class="card-footer">
                         <input type="submit" value="Thêm mới" class="btn btn-success float-right">
                     </div>
                 </form>
                 <?php endif?>
                 <?php endif?>
                 <!--END giangvien -->

                 <?php endif?>

             </div>
             <!-- /.card -->
         </div>
     </section>

     <section class="content" id="div_update">
     </section>

     <section class="content">
         <div class="card card-primary">
             <div class="card-header">
                 <h3 class="card-title">Danh sách [</h3>
                 <a href="?page=quan-ly-tai-khoan&view=view_All" type="button" class="btn btn-tool">
                     Tất cả <?=count($taikhoan__Get_All_All)?>
                 </a> |
                 <a href="?page=quan-ly-tai-khoan&view=view_Manager" type="button" class="btn btn-tool">
                     Manager <?=count($taikhoan__Get_All_Manager)?>
                 </a> |
                 <a href="?page=quan-ly-tai-khoan&view=view_Can_Bo_Khoa" type="button" class="btn btn-tool">
                     Cán bộ khoa <?=count($taikhoan__Get_All_Giang_Vien)?>
                 </a>|
                 <a href="?page=quan-ly-tai-khoan&view=view_Giang_Vien" type="button" class="btn btn-tool">
                     Cố vấn <?=count($taikhoan__Get_All_Giang_Vien)?>
                 </a>]
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
                             <th>Email</th>
                             <th>Mật khẩu</th>
                             <th>Phân nhóm</th>
                             <th>Phân quyền</th>
                             <th>Trạng thái</th>
                             <th>Đặt lại mật khẩu</th>
                             <th>Thao tác</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php $num = 0;?>
                         <?php foreach($taikhoan__Get_All as $item):?>
                         <tr>
                             <td><?=++$num?></td>
                             <td><?=$item->email?></td>
                             <td><?=$item->mat_khau?></td>
                             <td><?=$phannhom->phannhom__Get_By_Id($item->id_phan_nhom)->ten_phan_nhom?></td>
                             <td><?=$phanquyen->phanquyen__Get_By_Id($item->id_phan_quyen)->ten_phan_quyen?></td>
                             <td
                                 onclick="return confirm_sweet('quan-ly-tai-khoan/action.php?req=active&id_tai_khoan=<?=$item->id_tai_khoan?>&trang_thai=<?=$item->trang_thai?>')">
                                 <?=$item->trang_thai == 1 ? "<button class='btn btn-success'><i class='fas fa-user-check'></i></button>" : "<button class='btn btn-danger'><i class='fas fa-user-slash'></i></button>"?>

                             </td>
                             <td>
                                 <a href="#" type="button" class="btn  btn-danger"
                                     onclick="return confirm_sweet('quan-ly-tai-khoan/action.php?req=reset&id_tai_khoan=<?=$item->id_tai_khoan?>')">
                                     <i class="fas fa-user-cog"></i>
                                 </a>
                             </td>
                             <td>
                                 <a href="#" type="button" class="btn  btn-danger"
                                     onclick="return confirm_sweet('quan-ly-tai-khoan/action.php?req=delete&id_tai_khoan=<?=$item->id_tai_khoan?>')">
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
function update_obj(id_tai_khoan) {
    $.post('quan-ly-tai-khoan/update.php', {
        'id_tai_khoan': id_tai_khoan,
    }, function(data) {
        $(".card.card-success").addClass('collapsed-card');
        $('#div_update').html(data);
    });
}
 </script>