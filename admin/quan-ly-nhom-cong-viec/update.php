    <?php 
        require '../../models/getModel.php';
        $id_nhom_cong_viec = $_POST['id_nhom_cong_viec'];
        $nhomcongviec__Get_By_Id = $nhomcongviec->nhomcongviec__Get_By_Id($id_nhom_cong_viec);
    ?>

    <form class="row form" action="quan-ly-nhom-cong-viec/action.php?req=update" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_nhom_cong_viec" value="<?=$nhomcongviec__Get_By_Id->id_nhom_cong_viec?>">
        <div class="col-12">
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">Cập nhật</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Nhóm công viêc <span class="color-crimson">(*)</span></label>
                        <input type="text" name="ten_nhom_cong_viec" class="form-control" required
                            placeholder="Nhập Nhóm công viêc" value="<?=$nhomcongviec__Get_By_Id->ten_nhom_cong_viec?>">
                    </div>
                    <div class="form-group">
                        <label for="">Ghi chú</label>
                        <textarea id="ghi_chu" name="ghi_chu" class="form-control"
                            placeholder="Nhập ghi chú"><?=$nhomcongviec__Get_By_Id->ghi_chu?></textarea>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <input type="submit" value="Cập nhật" class="btn btn-danger float-right">
                </div>
            </div>
            <!-- /.card -->
        </div>
    </form>