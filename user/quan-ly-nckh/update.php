    <?php 
        require '../../models/getModel.php';
        $id_nckh = $_POST['id_nckh'];
        $nckh__Get_By_Id = $nckh->nckh__Get_By_Id($id_nckh);
    ?>

    <form class="row form" action="quan-ly-nckh/action.php?req=update" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_nckh" value="<?=$nckh__Get_By_Id->id_nckh?>">
        <input type="hidden" name="id_index" class="form-control" value="<?=$nckh__Get_By_Id->id_index?>" />
        <input type="hidden" name="id_giang_vien" class="form-control" value="<?=$nckh__Get_By_Id->id_giang_vien?>" />
        <div class="col-12">
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">Cập nhật NCKH</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Nội dung</label>
                        <input type="text" name="noi_dung" class="form-control" value="<?=$nckh__Get_By_Id->noi_dung?>"
                            placeholder="Nhập nội dung" />
                    </div>
                    <div class="form-group">
                        <label for="">Thể loại</label>
                        <input type="text" name="the_loai" class="form-control" value="<?=$nckh__Get_By_Id->the_loai?>"
                            placeholder="Nhập hể loại" />
                    </div>
                    <div class="form-group">
                        <label for="">Số giờ quy chuẩn</label>
                        <input type="number" min="0" max="200" name="so_tiet_quy_chuan"
                            value="<?=$nckh__Get_By_Id->so_tiet_quy_chuan?>" class="form-control"
                            placeholder="Nhập số giờ quy chuẩn" />
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <input type="submit" value="Cập nhật" class="btn btn-success float-right">
                </div>

            </div>
            <!-- /.card -->
        </div>
    </form>

    <div class="card-footer">
        <input type="submit" value="Xóa" class="btn btn-danger float-right"
            onclick="return confirm_sweet('quan-ly-nckh/action.php?req=delete&id_nckh=<?=$nckh__Get_By_Id->id_nckh?>')">
    </div>