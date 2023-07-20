<div class="card mx-auto" style="max-width: 380px; margin-top:100px;">
    <div class="card-body">
        <center>
            <h4 class="card-title mb-4">Tạo mật khẩu mới</h4>
        </center>
        <form action="./Auth/ResetPassword" method="POST" id="reset_pass">

            <div class="form-group">
                <label for="password" class="form-label">Mật khẩu mới</label>
                <input name="pass_new" class="form-control" placeholder="Nhập mật khẩu mới" type="password" id="pass_new" required>
            </div> <!-- form-group// -->

            <div class="form-group">
                <label for="password" class="form-label">Xác nhận mật khẩu mới</label>
                <input name="pass_new2" class="form-control" placeholder="Xác nhận mật khẩu mới" type="password" required>
            </div> <!-- form-group// -->
            <div class="form-group">
                <i class=" text-danger"><?php echo isset($data['status']) ? $data['status'] : '' ?></i>
            </div>

            <div class="form-group">
                <button type="submit" name="btn_reset" class="btn btn-primary btn-block"> Đổi mật khẩu </button>
            </div> <!-- form-group// -->
        </form>

    </div> <!-- card-body.// -->
</div> <!-- card .// -->
<!-- <p class="text-center mt-4">Bạn đã có tài khoản? <a href="<?= $SITE_URL ?>/tai-khoan/dang-nhap.php">Đăng nhập</a></p>
<p class="text-center mt-4">Bạn chưa có tài khoản? <a href="<?= $SITE_URL ?>/tai-khoan/dang-ky.php">Đăng ký</a></p> -->