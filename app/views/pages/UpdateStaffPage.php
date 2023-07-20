<?php

$img_path = 'public/images/uploads/users/' . $data['GetStaffId']['img'];
if (is_file($img_path)) {
    $img = "<img src='$img_path' height='80'>";
} else {
    $img = "<img src='public/images/user.png' height='80'>";
}

?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header text-center bg-dark text-white text-uppercase">Cập nhật thông tin nhân viên</div>
            <div class="card-body">
                <form action="Staff/UpdateStaff" method="POST" enctype="multipart/form-data" id="update_staff">
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="full_name" class="form-label">Họ và tên <b style="color: red;">*</b></label>
                            <input type="text" name="full_name" id="full_name" class="form-control" value="<?= $data['GetStaffId']['full_name'] ?>" required>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="email" class="form-label">Email <b style="color: red;">*</b></label>
                            <input type="email" name="email" id="email" class="form-control" value="<?= $data['GetStaffId']['email'] ?>" required>
                        </div>

                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="username" class="form-label">Tên đăng nhập <b style="color: red;">*</b></label>
                            <input type="text" name="username" id="username" class="form-control" value="<?= $data['GetStaffId']['username'] ?>" readonly required>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="password" class="form-label">Mật khẩu <b style="color: red;">*</b></label>
                            <input type="password" name="password" id="password" class="form-control" value="<?= $data['GetStaffId']['password'] ?>" readonly required>
                        </div>
                        <!-- <div class="form-group col-sm-4">
                            <label for="matKhau" class="form-label">Xác nhận mật khẩu <b style="color: red;">*</b></label>
                            <input type="password" name="matKhau2" class="form-control" value="<?= $matKhau ?>" readonly required>
                        </div> -->
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="phone" class="form-label">Số điện thoại <b style="color: red;">*</b></label>
                            <input type="text" name="phone" id="phone" class="form-control" value="<?= $data['GetStaffId']['phone'] ?>" required>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="address" class="form-label">Địa chỉ </label>
                            <input type="text" name="address" id="address" class="form-control" value="<?= $data['GetStaffId']['address'] ?>">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="cmnd" class="form-label">Số CMND/CCCD <b style="color: red;">*</b></label>
                            <input type="text" name="cmnd" id="cmnd" class="form-control" value="<?= $data['GetStaffId']['cmnd'] ?>" required>
                        </div>
                        <div class="form-group col-sm-6">
                            <label>Chức vụ?</label>
                            <div class="form-control">
                                <label class="radio-inline  mr-3">
                                    <input type="radio" value="0" name="role" <?= !$data['GetStaffId']['role'] ? 'checked' : '' ?>> Quản trị
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" value="1" name="role" <?= $data['GetStaffId']['role'] ? 'checked' : '' ?>> Nhân viên
                                </label>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <div class="row align-items-center">
                                <div class="col-sm-6">
                                    <label for="up_img" class="form-label">Hình ảnh </label>
                                    <input type="hidden" name="img" id="img" class="form-control" value="<?= $data['GetStaffId']['img'] ?>">
                                    <input type="file" name="up_img" id="up_img" class="form-control load-img">
                                </div>
                                <div class="col-sm-4">
                                    <?= $img ?> =>
                                </div>
                                <div class="col-sm-4">
                                <img id="blah" src="#" alt="your image" style="display: none;height: 80px;" />
                            </div>
                            </div>

                        </div>

                    </div>
                    <div class="mb-3 text-center mt-3">
                        <input type="hidden" name="idStaff" value="<?= $data['GetStaffId']['id'] ?>">
                        <input type="reset" value="Nhập lại" class="btn btn-danger mr-3">
                        <input type="submit" name="btn_update" value="Cập nhật" class="btn btn-primary mr-3">
                        <a href="Staff"><input type="button" class="btn btn-success" value="Danh sách"></a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<script src="public/js/load-img.js"></script>