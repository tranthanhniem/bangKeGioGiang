    <?php 
        require '../../models/getModel.php';
        $id_index = $_POST['id_index'];
        $indexcount__Get_By_Id = $indexcount->indexcount__Get_By_Id($id_index);
    ?>

    <form class="row form" action="quan-ly-index/action.php?req=update" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_index" value="<?=$indexcount__Get_By_Id->id_index?>">
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
                        <label for="">Tên đợt <span class="color-crimson">(*)</span></label>
                        <input type="text" name="ten_index" class="form-control" required placeholder="Nhập tên đợt"
                            value="<?=$indexcount__Get_By_Id->ten_index?>">
                    </div>
                    <div class="form-group">
                        <label for="">Ghi chú</label>
                        <textarea id="ghi_chu" name="ghi_chu" class="form-control"
                            placeholder="Nhập ghi chú"><?=$indexcount__Get_By_Id->ghi_chu?></textarea>
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