    <?php 
        require '../../models/getModel.php';
        $id_can_bo_khoa = $_POST['id_can_bo_khoa'];
        $canbokhoa__Get_By_Id = $canbokhoa->canbokhoa__Get_By_Id($id_can_bo_khoa);
        $khoa__Get_All = $khoa->khoa__Get_All();
    ?>

    <form class="row form" action="quan-ly-can-bo-khoa/action.php?req=update" method="post"
        enctype="multipart/form-data">
        <input type="hidden" name="id_can_bo_khoa" value="<?=$canbokhoa__Get_By_Id->id_can_bo_khoa?>">
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
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Mã giảng viên <span class="color-crimson">(*)</span></label>
                                <input type="text" id="ma_can_bo_khoa" name="ma_can_bo_khoa" class="form-control"
                                    required value="<?=$canbokhoa__Get_By_Id->ma_can_bo_khoa?>"
                                    placeholder="Nhập mã giảng viên">
                            </div>
                            <div class="form-group">
                                <label for="">Tên giảng viên <span class="color-crimson">(*)</span></label>
                                <input type="text" id="ten_can_bo_khoa" name="ten_can_bo_khoa" class="form-control"
                                    required value="<?=$canbokhoa__Get_By_Id->ten_can_bo_khoa?>"
                                    placeholder="Nhập tên giảng viên">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Giới tính <span class="color-crimson">(*)</span></label>
                                <select class="form-control" name="gioi_tinh" required>
                                    <option value="0" <?=$canbokhoa__Get_By_Id->gioi_tinh == 1 ? "selected" : ""?>>Nữ
                                    </option>
                                    <option value="1" <?=$canbokhoa__Get_By_Id->gioi_tinh == 0 ? "selected" : ""?>>Nam
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Ngày sinh <span class="color-crimson">(*)</span></label>
                                <input type="date" id="ngay_sinh" name="ngay_sinh" class="form-control" required
                                    value="<?=$canbokhoa__Get_By_Id->ngay_sinh?>"
                                    min="<?=date('Y-m-d', strtotime('-100 years'))?>"
                                    max="<?=date('Y-m-d', strtotime('-10 years'))?>" placeholder="Nhập ngày sinh">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Email <span class="color-crimson">(*)</span></label>
                                <input type="email" id="email" name="email" class="form-control" required
                                    value="<?=$canbokhoa__Get_By_Id->email?>" placeholder="Nhập email">
                            </div>
                            <div class="form-group">
                                <label for="">Số điện thoại 1 <span class="color-crimson">(*)</span></label>
                                <input type="so_dien_thoai_1" id="so_dien_thoai_1" name="so_dien_thoai_1"
                                    pattern="[0][0-9]{8-9}" class=" form-control" required
                                    value="<?=$canbokhoa__Get_By_Id->so_dien_thoai_1?>"
                                    title="Số điện thoại có 10 hoặc 11 số" placeholder="Nhập số điện thoại 1"
                                    minlength="10" max="11">
                            </div>
                            <div class="form-group">
                                <label for="">Số điện thoại 2 <span class="color-crimson">(*)</span></label>
                                <input type="so_dien_thoai_2" id="so_dien_thoai_2" name="so_dien_thoai_2"
                                    pattern="[0][0-9]{8-9}" class=" form-control" required
                                    value="<?=$canbokhoa__Get_By_Id->so_dien_thoai_2?>"
                                    title="Số điện thoại có 10 hoặc 11 số" placeholder="Nhập số điện thoại 2"
                                    minlength="10" max="11">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Địa chỉ liên lạc <span class="color-crimson">(*)</span></label>
                                <input type="dia_chi_lien_lac" id="dia_chi_lien_lac" name="dia_chi_lien_lac"
                                    class="form-control" required value="<?=$canbokhoa__Get_By_Id->dia_chi_lien_lac?>"
                                    placeholder="Nhập địa chỉ liên lạc">
                            </div>
                            <div class="form-group">
                                <label for="">Địa chỉ thường trú <span class="color-crimson">(*)</span></label>
                                <input type="dia_chi_thuong_tru" id="dia_chi_thuong_tru" name="dia_chi_thuong_tru"
                                    class="form-control" required value="<?=$canbokhoa__Get_By_Id->dia_chi_thuong_tru?>"
                                    placeholder="Nhập địa chỉ thường trú">
                            </div>
                            <div class="form-group">
                                <label for="">Trình độ <span class="color-crimson">(*)</span></label>
                                <select class="form-control" name="id_trinh_do" required>
                                    <option value="<?=$canbokhoa__Get_By_Id->id_trinh_do?>">
                                        <?=$trinhdo->trinhdo__Get_By_Id($canbokhoa__Get_By_Id->id_trinh_do)->ten_trinh_do?>
                                    </option>
                                    <?php foreach($trinhdo__Get_All as $item):?>
                                    <?php if($item->id_trinh_do != $canbokhoa__Get_By_Id->id_trinh_do):?>
                                    <option value="<?=$item->id_trinh_do?>"><?=$item->ten_trinh_do?></option>
                                    <?php endif; ?>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Chọn khoa <span class="color-crimson">(*)</span></label>
                                <select class="form-control" name="id_khoa" required>
                                    <option value="<?=$canbokhoa__Get_By_Id->id_khoa?>">
                                        <?=$khoa->khoa__Get_By_Id($canbokhoa__Get_By_Id->id_khoa)->ten_khoa?>
                                    </option>
                                    <option value="">Chọn khoa</option>
                                    <?php foreach($khoa__Get_All as $item):?>
                                    <?php if($item->id_khoa != $canbokhoa__Get_By_Id->id_khoa):?>
                                    <option value="<?=$item->id_khoa?>"><?=$item->ten_khoa?></option>
                                    <?php endif; ?>
                                    <?php endforeach;?>
                                </select>
                            </div>
                        </div>
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