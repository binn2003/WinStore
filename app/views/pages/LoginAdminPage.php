<div class="row">
    <div class="col-lg-3 col-md-2"></div>
    <div class="col-lg-6 col-md-8 login-box">
        <div class="col-lg-12 login-user-circle-o">
            <i class='fa fa-user-circle' aria-hidden="true"></i>
        </div>
        <div class="col-lg-12 login-title">
            Đăng Nhập
        </div>

        <div class="col-lg-12 login-form">
            <div class="col-lg-12 login-form">
                <form action="./Admin/Login" method="post" id="login_admin">
                    <div class="form-group">
                        <label for="username" class="form-control-label">Tên đăng nhập</label>
                        <input name="username" id="username" class="form-control" type="text" required>
                    </div>
                    <div class="form-group">
                        <label for="password" class="form-control-label">Mật khẩu</label>
                        <input name="password" class="form-control" type="password" required>
                        <!-- <i class="text-danger text-center"><?= $MESSAGE ?></i> -->
                    </div>
                    <br>
                    <!-- <div class="form-group ml-4">
                        <input class="form-check-input" type="checkbox" name="ghi_nho" />
                        <label class="form-check-label" style="color: #0DB8DE;"> Ghi nhớ tài khoản</label>
                    </div> -->

                    <!-- <div class="row mb-2">
                        <div class="col d-flex justify-content-center mr-5"> -->
                    <!-- Checkbox -->

                    <!-- </div> -->

                    <!-- <div class="col d-flex justify-content-end mr-2"> -->
                    <!-- Simple link -->
                    <!-- <a href="../tai-khoan/quen-mk.php">Quên mật khẩu?</a> -->
                    <!-- </div> -->
                    <!-- </div> -->

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-outline-primary btn-block mb-4"> Đăng nhập </button>
                </form>
            </div>
        </div>
        <div class="col-lg-3 col-md-2"></div>
    </div>
</div>