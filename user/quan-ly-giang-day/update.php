    <?php 
        require '../../models/getModel.php';
        $id_giang_day = $_POST['id_giang_day'];
        $giangday__Get_By_Id = $giangday->giangday__Get_By_Id($id_giang_day);
    ?>

    <form class="row form" action="quan-ly-giang-day/action.php?req=update" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_giang_day" value="<?=$giangday__Get_By_Id->id_giang_day?>">
        <input type="hidden" name="id_index" class="form-control" value="<?=$giangday__Get_By_Id->id_index?>" />
        <input type="hidden" name="id_giang_vien" class="form-control"
            value="<?=$giangday__Get_By_Id->id_giang_vien?>" />
        <div class="col-12">
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">Cập nhật giảng dạy</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Nhóm giảng dạy<span class="color-crimson">(*)</span></label>
                        <select name="id_nhom_giang_day" class="form-control">
                            <option value="">Chọn nhóm</option>
                            <?php foreach($nhomgiangday->nhomgiangday__Get_All() as $item):?>
                            <option value="<?=$item->id_nhom_giang_day?>"
                                <?=$item->id_nhom_giang_day == $giangday__Get_By_Id->id_nhom_giang_day ? "selected" : ""?>>
                                <?=$item->ten_nhom_giang_day?></option>
                            <?php endforeach?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Tên môn học</label>
                        <input type="text" name="ten_mon_hoc" class="form-control"
                            value="<?=$giangday__Get_By_Id->ten_mon_hoc?>" placeholder="Nhập môn học" />
                    </div>
                    <div class="form-group">
                        <label for="">Tên lớp học</label>
                        <input type="text" name="ten_lop_hoc" class="form-control"
                            value="<?=$giangday__Get_By_Id->ten_lop_hoc?>" placeholder="Nhập lớp học" />
                    </div>
                    <div class="form-group">
                        <label for="">Số sinh viên</label>
                        <input type="number" min="0" max="200" name="so_sinh_vien" class="form-control"
                            value="<?=$giangday__Get_By_Id->so_sinh_vien?>" placeholder="Nhập số sinh viên" />
                    </div>
                    <div class="form-group">
                        <label for="">Số nhóm</label>
                        <input type="number" min="0" max="200" name="so_nhom" class="form-control"
                            value="<?=$giangday__Get_By_Id->so_nhom?>" placeholder="Nhập số nhóm" />
                    </div>
                    <div class="form-group">
                        <label for="">Số tiết môn học</label>
                        <input type="number" min="0" max="200" name="so_tiet_mon_hoc" class="form-control"
                            value="<?=$giangday__Get_By_Id->so_tiet_mon_hoc?>" placeholder="Nhập số tiết môn học" />
                    </div>
                    <div class="form-group">
                        <label for="">Số tiết thực giảng</label>
                        <input type="number" min="0" max="200" name="so_tiet_thuc_giang" class="form-control"
                            value="<?=$giangday__Get_By_Id->so_tiet_thuc_giang?>"
                            placeholder="Nhập số tiết thực giảng" />
                    </div>
                    <div class="form-group">
                        <label for="">Hệ số nhóm</label>
                        <input type="number" min="0" max="200" name="he_so_nhom" class="form-control"
                            value="<?=$giangday__Get_By_Id->he_so_nhom?>" placeholder="Nhập hệ số nhóm" />
                    </div>
                    <div class="form-group">
                        <label for="">Hệ số tín chỉ</label>
                        <input type="number" min="0" max="200" name="he_so_tin_chi" class="form-control"
                            value="<?=$giangday__Get_By_Id->he_so_tin_chi?>" placeholder="Nhập hệ số tín chỉ" />
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
            onclick="return confirm_sweet('quan-ly-giang-day/action.php?req=delete&id_giang_day=<?=$giangday__Get_By_Id->id_giang_day?>')">
    </div>