<div class="col-lg-12">
    <div class="card">
        <div class="card-header text-center bg-dark text-white text-uppercase">Thêm mới nhân viên</div>
        <div class="card-body">
            <form action="Staff/AddStaff" method="POST" enctype="multipart/form-data" id="add_staff">
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="full_name" class="form-label">Họ và tên <b style="color: red;">*</b></label>
                        <input type="text" name="full_name" id="full_name" class="form-control" required>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="email" class="form-label">Email <b style="color: red;">*</b></label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>

                </div>
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="username" class="form-label">Tên đăng nhập <b style="color: red;">*</b></label>
                        <input type="text" name="username" id="username" class="form-control" required>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="password" class="form-label">Mật khẩu <b style="color: red;">*</b></label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                    <!-- <div class="form-group col-sm-4">
                            <label for="matKhau" class="form-label">Xác nhận mật khẩu <b style="color: red;">*</b></label>
                            <input type="password" name="matKhau2" class="form-control" required>
                        </div> -->
                </div>
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="phone" class="form-label">Số điện thoại <b style="color: red;">*</b></label>
                        <input type="text" name="phone" id="phone" class="form-control" required>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="address" class="form-label">Địa chỉ</label>
                        <input type="text" name="address" id="address" class="form-control">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="cmnd" class="form-label">Số CMND/CCCD <b style="color: red;">*</b></label>
                        <input type="text" name="cmnd" id="cmnd" class="form-control" required>
                    </div>
                    <div class="form-group col-sm-6">
                        <label>Chức vụ?</label>
                        <div class="form-control">
                            <label class="radio-inline  mr-3">
                                <input type="radio" value="0" name="role"> Quản trị
                            </label>
                            <label class="radio-inline">
                                <input type="radio" value="1" name="role" checked> Nhân viên
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-4">
                        <label for="img" class="form-label">Hình ảnh</label>
                        <input type="file" name="img" id="img" class="form-control load-img">
                    </div>
                    <div class="form-group col-sm-2">
                        <img id="blah" src="#" alt="your image" style="display: none;height: 80px;" />
                    </div>
                </div>

                <div class="mb-3 text-center mt-3">
                    <input type="reset" value="Nhập lại" class="btn btn-danger mr-3">
                    <input type="submit" name="btn_insert" value="Thêm mới" class="btn btn-primary mr-3">
                    <a href="Staff"><input type="button" class="btn btn-success" value="Danh sách"></a>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="public/js/load-img.js"></script>