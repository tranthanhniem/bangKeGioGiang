    <?php 
        require '../../models/getModel.php';
        $id_don_gia = $_POST['id_don_gia'];
        $dongia__Get_By_Id = $dongia->dongia__Get_By_Id($id_don_gia);
    ?>

    <form class="row form" action="quan-ly-don-gia/action.php?req=update" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_don_gia" value="<?=$dongia__Get_By_Id->id_don_gia?>">
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
                        <label for="">Đơn giá <span class="color-crimson">(*)</span></label>
                        <input type="number" min="1" max="999999999" name="don_gia" class="form-control" required
                            placeholder="Nhập đơn giá" value="<?=$dongia__Get_By_Id->don_gia?>">
                    </div>
                    <div class="form-group">
                        <label for="">Ghi chú</label>
                        <textarea id="ghi_chu" name="ghi_chu" class="form-control"
                            placeholder="Nhập ghi chú"><?=$dongia__Get_By_Id->ghi_chu?></textarea>
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