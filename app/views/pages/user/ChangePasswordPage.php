<!-- ============================ COMPONENT LOGIN   ================================= -->
<div class="card mx-auto" style="max-width: 380px; margin-top:100px;">
    <div class="card-body">
        <center>
            <h4 class="card-title mb-4">Đổi mật khẩu</h4>
        </center>
        <form action="./Auth/ChangePassword" method="POST" id="change_pass">

            <div class="form-group">
                <label for="username" class="form-label">Tài khoản(tên đăng nhập)</label>
                <input name="username" class="form-control" placeholder="Username" readonly type="text" value="<?= $_SESSION['user']['username'] ?>">
            </div> <!-- form-group// -->

            <div class="form-group">
                <label for="pass_old" class="form-label">Mật khẩu cũ</label>
                <input name="pass_old" class="form-control" placeholder="Password" type="password" required>
            </div> <!-- form-group// -->

            <div class="form-group">
                <label for="pass_new" class="form-label">Mật khẩu mới</label>
                <input name="pass_new" class="form-control" placeholder="Password" type="password" id="pass_new" required>
            </div> <!-- form-group// -->

            <div class="form-group">
                <label for="pass_new2" class="form-label">Xác nhân mật khẩu mới</label>
                <input name="pass_new2" class="form-control" placeholder="Password" type="password" required>
            </div> <!-- form-group// -->
            <div class="form-group">
                <i class="text-danger text-center"><?php echo isset($data['status']) ? $data['status'] : '' ?></i>
            </div>

            <div class="form-group">
                <button type="submit" name="btn_change" class="btn btn-primary btn-block"> Đổi mật khẩu </button>
            </div> <!-- form-group// -->
        </form>

    </div> <!-- card-body.// -->
</div> <!-- card .// -->
<!-- ============================ COMPONENT LOGIN  END.// ================================= -->