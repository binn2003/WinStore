<?php

$img_path = 'public/images/uploads/users/' . $data['GetUserId']['img'];
if (is_file($img_path)) {
    $img = "<img src='$img_path' height='80'>";
} else {
    $img = "<img src='public/images/user.png' height='80'>";
}

?>

<div class="col-lg-12">
    <div class="card">
        <div class="card-header text-center bg-dark text-white text-uppercase">Cập nhật thông tin khách hàng</div>
        <div class="card-body">
            <form action="User/UpdateUser" method="POST" enctype="multipart/form-data" id="update_user">
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="full_name" class="form-label">Họ và tên</label>
                        <input type="text" name="full_name" id="full_name" class="form-control" value="<?= $data['GetUserId']['full_name'] ?>" required>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="<?= $data['GetUserId']['email'] ?>" required>
                    </div>

                </div>
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="username" class="form-label">Tên đăng nhập</label>
                        <input type="text" name="username" id="username" class="form-control" value="<?= $data['GetUserId']['username'] ?>" readonly required>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="password" class="form-label">Mật khẩu</label>
                        <input type="password" name="password" id="password" class="form-control" value="<?= $data['GetUserId']['password'] ?>" readonly required>
                    </div>
                    <!-- <div class="form-group col-sm-4">
                            <label for="matKhau" class="form-label">Xác nhận mật khẩu</label>
                            <input type="password" name="matKhau2" class="form-control" value="<?= $matKhau ?>" readonly required>
                        </div> -->
                </div>
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="phone" class="form-label">Số điện thoại</label>
                        <input type="text" name="phone" id="phone" class="form-control" value="<?= $data['GetUserId']['phone'] ?>" required>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="address" class="form-label">Địa chỉ</label>
                        <input type="text" name="address" id="address" class="form-control" value="<?= $data['GetUserId']['address'] ?>">
                    </div>


                </div>
                <div class="row">
                    <div class="form-group col-sm-6">
                        <div class="row align-items-center">
                            <div class="col-sm-4">
                                <label for="up_img" class="form-label">Hình ảnh</label>
                                <input type="hidden" name="img" id="img" class="form-control" value="<?= $data['GetUserId']['img'] ?>">
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
                    <div class="form-group col-sm-6">
                        <label>Trạng thái?</label>
                        <div class="form-control">
                            <label class="radio-inline  mr-3">
                                <input type="radio" value="0" name="activated" <?= !$data['GetUserId']['activated'] ? 'checked' : '' ?>>Chưa kích hoạt
                            </label>
                            <label class="radio-inline">
                                <input type="radio" value="1" name="activated" <?= $data['GetUserId']['activated'] ? 'checked' : '' ?>>Kích hoạt
                            </label>
                        </div>
                    </div>
                </div>
                <div class="mb-3 text-center mt-3">
                    <input type="hidden" name="idUser" value="<?= $data['GetUserId']['id'] ?>">
                    <input type="reset" value="Nhập lại" class="btn btn-danger mr-3">
                    <input type="submit" name="btn_update" value="Cập nhật" class="btn btn-primary mr-3">
                    <a href="User"><input type="button" class="btn btn-success" value="Danh sách"></a>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="public/js/load-img.js"></script>