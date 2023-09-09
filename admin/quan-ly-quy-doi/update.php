    <?php 
        require '../../models/getModel.php';
        $id_quy_doi = $_POST['id_quy_doi'];
        $quydoi__Get_By_Id = $quydoi->quydoi__Get_By_Id($id_quy_doi);
    ?>

    <form class="row form" action="quan-ly-quy-doi/action.php?req=update" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_quy_doi" value="<?=$quydoi__Get_By_Id->id_quy_doi?>">
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
                        <label for="">Nhóm công việc<span class="color-crimson">(*)</span></label>
                        <select name="id_nhom_cong_viec" class="form-control">
                            <?php foreach($nhomcongviec->nhomcongviec__Get_All() as $item):?>
                            <option value="<?=$item->id_nhom_cong_viec?>"
                                <?=$item->id_nhom_cong_viec == $quydoi__Get_By_Id->id_nhom_cong_viec ? "selected" : ""?>>
                                <?=$item->ten_nhom_cong_viec?></option>
                            <?php endforeach?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Mã công việc <span class="color-crimson">(*)</span></label>
                        <input type="text" id="ma_cong_viec" name="ma_cong_viec" class="form-control" required
                            value="<?=$quydoi__Get_By_Id->ma_cong_viec?>" placeholder="Nhập mã công việc">
                    </div>
                    <div class="form-group">
                        <label for="">Tên công việc <span class="color-crimson">(*)</span></label>
                        <input type="text" id="ten_cong_viec" name="ten_cong_viec" class="form-control" required
                            value="<?=$quydoi__Get_By_Id->ten_cong_viec?>" placeholder="Nhập tên công việc">
                    </div>
                    <div class="form-group">
                        <label for="">Quy đổi số tiết <span class="color-crimson">(*)</span></label>
                        <input type="number" min="0" max="400" step="any" id="quy_doi_so_tiet" name="quy_doi_so_tiet"
                            value="<?=$quydoi__Get_By_Id->quy_doi_so_tiet?>" class="form-control" required
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
                    <input type="submit" value="Cập nhật" class="btn btn-danger float-right">
                </div>
            </div>
            <!-- /.card -->
        </div>
    </form>