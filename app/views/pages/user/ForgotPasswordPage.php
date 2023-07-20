<div class="card mx-auto" style="max-width: 380px; margin-top:100px;">
    <div class="card-body">
        <center>
            <h4 class="card-title mb-4"> Quên mật khẩu <i class="fa fa-key"></i></h4>
        </center>

        <form action="./Auth/ForgotPassword" method="POST" id="forgot_pass">

            <div class="form-group">
                <!-- <label for="email" class="form-label">Email</label> -->
                <input name="email" class="form-control" id="email" placeholder="Nhập Email" type="text" required>
            </div> <!-- form-group// -->
            <div class="form-group">
                <i class=" text-danger"><?php echo isset($data['status']) ? $data['status'] : '' ?></i>
            </div>

            <div class="form-group">
                <button type="submit" name="btn_forgot_pass" class="btn btn-primary btn-block"> Lấy mật khẩu </button>
            </div> <!-- form-group// -->
            <a class="btn btn-outline-primary btn-block mb-4" href="./Auth/Login">Trở về đăng nhập</a>
        </form>

    </div> <!-- card-body.// -->
</div> <!-- card .// -->

<p class="text-center mt-4">Bạn chưa có tài khoản? <a href="./Auth/Register">Đăng ký</a></p>
<br><br>