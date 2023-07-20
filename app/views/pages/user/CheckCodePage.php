<div class="card mx-auto" style="max-width: 380px; margin-top:100px;">
    <div class="card-body">
        <center>
            <h4 class="card-title mb-4">Nhập mã xác nhận</h4>
        </center>

        <form action="./Auth/CheckCode" method="POST">

            <div class="form-group">
                <?php if (isset($error)) : ?>
                    <div class="alert alert-danger"><?= $error ?></div>
                <?php else : ?>
                    <div class="alert alert-success">Hãy nhập mã xác nhận mà chúng tôi đã gửi vào email của bạn</div>
                <?php endif ?>
                <!-- <label for="email" class="form-label">Email</label> -->

                <input name="code" class="form-control" id="code" placeholder="Nhập mã xác nhận" type="text">
            </div> <!-- form-group// -->
            <p>
                <i class=" text-danger"><?php echo isset($data['status']) ? $data['status'] : '' ?></i>
            </p>

            <div class="form-group">
                <button type="submit" name="btn_forgot" class="btn btn-primary btn-block">Gửi</button>
            </div> <!-- form-group// -->
            <!-- <a class="btn btn-outline-primary btn-block mb-4" href="<?= $SITE_URL ?>/tai-khoan/dang-nhap.php">Trở về đăng nhập</a> -->
        </form>

    </div> <!-- card-body.// -->
</div> <!-- card .// -->

<!-- <p class="text-center mt-4">Bạn chưa có tài khoản? <a href="<?= $SITE_URL ?>/tai-khoan/dang-ky.php">Đăng ký</a></p> -->
<br><br>