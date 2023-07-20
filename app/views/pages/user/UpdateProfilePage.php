<div class="container">
    <h5 class="alert-dark my-3 py-3 shadow-sm text-center">Cập nhật tài khoản</h5>
    <div class="row m-1 pb-5">
        <div class="col-lg-6 col-md p-6">
            <img src="./public/images/uploads/users/<?= $data['GetUserId']['img'] ?>" class="img-fluid" alt="" style="max-width: 92%;width: 100%;">
        </div>
        <div class="col-lg-6 col-md">
            <form action="./Auth/UpdateProfile" method="POST" enctype="multipart/form-data" id="update_profile">

                <div class="form-group ">
                    <label for="">Tên đăng nhập</label>
                    <input type="text" name="username" id="" class="form-control" value="<?= $data['GetUserId']['username'] ?>" readonly aria-describedby="helpId">
                </div>
                <div class="form-group form">
                    <label for="">Họ và tên</label>
                    <input type="text" name="full_name" id="" class="form-control" value="<?= $data['GetUserId']['full_name'] ?>" aria-describedby="helpId" required>
                </div>
                <div class="form-group">
                    <label for="">Địa chỉ email</label>
                    <input type="text" name="email" id="" class="form-control" value="<?= $data['GetUserId']['email'] ?>" aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <label for="">Số điện thoại</label>
                    <input type="text" name="phone" id="" class="form-control" value="<?= $data['GetUserId']['phone'] ?>" aria-describedby="helpId" required>
                </div>
                <div class="form-group">
                    <label for="">Địa chỉ</label>
                    <input type="text" name="address" id="" class="form-control" value="<?= $data['GetUserId']['address'] ?>" aria-describedby="helpId" required>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="">Ảnh đại diện</label>
                        <input type="file" name="up_img" id="" class="form-control load-img" aria-describedby="helpId">
                    </div>
                    <div class="form-group col-md-6">
                        <img id="blah" src="#" alt="your image" style="display: none;height: 80px;" />
                    </div>
                </div>

                <div class="form-group pl-2">

                    <i class=" text-danger"><?= (isset($MESSAGE) && (strlen($MESSAGE) > 0)) ? $MESSAGE : "" ?></i>

                </div>
                <input name="idUser" value="<?= $data['GetUserId']['id'] ?>" type="hidden">
                <input name="activated" value="<?= $data['GetUserId']['activated'] ?>" type="hidden">
                <input name="password" value="<?= $data['GetUserId']['password'] ?>" type="hidden">
                <input name="img" value="<?= $data['GetUserId']['img'] ?>" type="hidden">
                <div class="form-group">
                    <button type="submit" name="btn_update" class="btn btn-info btn-block pt-2 pb-2">Cập nhật</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="public/js/load-img.js"></script>