    <?php 
        require '../../models/getModel.php';
        $id_cong_viec = $_POST['id_cong_viec'];
        $congviec__Get_By_Id = $congviec->congviec__Get_By_Id($id_cong_viec);
    ?>

    <form class="row form" action="quan-ly-cong-viec/action.php?req=update" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_cong_viec" value="<?=$congviec__Get_By_Id->id_cong_viec?>">
        <input type="hidden" name="id_index" class="form-control" value="<?=$congviec__Get_By_Id->id_index?>" />
        <input type="hidden" name="id_quy_doi" class="form-control" value="<?=$congviec__Get_By_Id->id_quy_doi?>" />
        <input type="hidden" name="id_giang_vien" class="form-control"
            value="<?=$congviec__Get_By_Id->id_giang_vien?>" />
        <div class="col-12">
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">Cập nhật công việc</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="">Công việc</label>
                                <input type="text" name="ten_cong_viec" id="ten_cong_viec" class="form-control"
                                    value="<?=$congviec__Get_By_Id->ten_cong_viec?>" />
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">Số lượng</label>
                                <input type="number" min="0" max="200" required name="so_luong" id="so_luong"
                                    class="form-control hp" value="<?=$congviec__Get_By_Id->so_luong?>" />
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">Quy đổi số tiết</label>
                                <input type="number" min="0" max="200" required name="quy_doi_so_tiet"
                                    id="quy_doi_so_tiet" value="<?=$congviec__Get_By_Id->quy_doi_so_tiet?>"
                                    class="form-control  hp" />
                            </div>
                        </div>
                        <input type="hidden" min="0" max="200" required name="tong_so_tiet" id="tong_so_tiet"
                            class="form-control hp"
                            value="<?=floatval($congviec__Get_By_Id->quy_doi_so_tiet) * floatval($congviec__Get_By_Id->so_luong)?>" />
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
            onclick="return confirm_sweet('quan-ly-cong-viec/action.php?req=delete&id_cong_viec=<?=$congviec__Get_By_Id->id_cong_viec?>')">
    </div>