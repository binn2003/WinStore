<!-- ============================ COMPONENT LOGIN   ================================= -->
<div class="card mx-auto" style="max-width: 380px; margin-top:100px;">
    <div class="card-body">
        <center>
            <h3 class="card-title mb-4">Đăng nhập</h3>
        </center>

        <form action="./Auth/Login" method="POST" id="login_user">
            <!-- <a href="#" class="btn btn-facebook btn-block mb-2"> <i class="fab fa-facebook-f"></i> &nbsp Đăng
                nhập bằng facebook</a>
            <a href="#" class="btn btn-google btn-block mb-4"> <i class="fab fa-google"></i> &nbsp Đăng nhập
                bằng google</a> -->

            <div class="form-group">
                <label for="username" class="form-label">Tài khoản</label>
                <input name="username" class="form-control" placeholder="Username" type="text" value="<?php if (isset($_COOKIE['user'])) {
                                                                                                            echo $_COOKIE['user'];
                                                                                                        } ?>" required>
            </div> <!-- form-group// -->
            <div class="form-group">
                <label for="password" class="form-label">Mật khẩu</label>
                <input name="password" class="form-control" placeholder="Password" type="password" value="<?php if (isset($_COOKIE['pass'])) {
                                                                                                            echo $_COOKIE['pass'];
                                                                                                        } ?>" required>
            </div> <!-- form-group// -->
            <div class="form-group">
                <i class="text-danger text-center"><?php echo isset($data['status']['username']) ? $data['status']['username'] : '' ?></i>
            </div>
            <div class="form-group">
                <a href="./Auth/ForgotPassword" class="float-right">Quên mật khẩu?</a>

                <label class="float-left custom-control custom-checkbox"> <input type="checkbox" class="custom-control-input" name="ghi_nho">
                    <div class="custom-control-label"> Ghi nhớ tài khoản </div>
                </label>
            </div> <!-- form-group form-check .// -->
            <div class="form-group">
                <button type="submit" name="btn_login" class="btn btn-primary btn-block"> Đăng nhập </button>
            </div> <!-- form-group// -->

        </form>

    </div> <!-- card-body.// -->
</div> <!-- card .// -->
<p class="text-center mt-4">Bạn chưa có tài khoản? <a href="./Auth/Register">Đăng ký</a></p>
<br><br>
<!-- ============================ COMPONENT LOGIN  END.// ================================= -->