<div class="col-lg-12">
    <div class="card">
        <div class="card-header text-center bg-dark text-white text-uppercase">Thêm sản phẩm mới</div>
        <div class="card-body">
            <form action="Product/AddProduct" method="POST" enctype="multipart/form-data" id="add_product">
                <div class="row">

                    <div class="form-group col-sm-4">
                        <label for="productName" class="form-label">Tên sản phẩm <b style="color: red;">*</b></label>
                        <input type="text" name="productName" id="productName" class="form-control" required>
                    </div>
                    <!-- <div class="form-group col-sm-4">
                            <label for="maSanPham" class="form-label">Mã sản phẩm</label>
                            <input type="text" name="maSanPham" id="maSanPham" disabled class="form-control" value="auto number">
                        </div> -->
                    <div class="form-group col-sm-4">
                        <label for="id_category" class="form-label">Danh mục</label>
                        <select name="id_category" class="form-control" id="id_category">
                            <?php

                            foreach ($data['ListCategory'] as $dm) {
                                extract($dm);
                                echo '<option value="' . $dm['id'] . '">' . $dm['name'] . '</option>';
                            }

                            ?>

                        </select>
                    </div>
                    <div class="form-group col-sm-2">
                        <label for="img" class="form-label">Ảnh sản phẩm <b style="color: red;">*</b></label>
                        <input type="file" name="img" id="img" class="form-control load-img">
                    </div>
                    <div class="form-group col-sm-2">
                        <img id="blah" src="#" alt="your image" style="display: none;height: 80px;" />
                    </div>
                </div>
                <div class="row">
                    <!-- <div class="form-group col-sm-4">
                            <label for="hinh" class="form-label">Ảnh sản phẩm</label>
                            <input type="file" name="hinh" id="hinh" class="form-control">
                        </div> -->
                    <div class="form-group col-sm-4">
                        <label for="price" class="form-label">Đơn giá (vnđ) <b style="color: red;">*</b></label>
                        <input type="number" name="price" id="price" class="form-control" required>
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="sale" class="form-label">Giảm giá (vnđ)</label>
                        <input type="number" name="sale" id="sale" value="" class="form-control" placeholder="Nhập giá mà bạn muốn giảm">
                    </div>
                    <div class="form-group col-sm-4">
                        <label>Hàng đặc biệt?</label>
                        <div class="form-control">
                            <label class="radio-inline  mr-3">
                                <input type="radio" value="1" name="special">Đặc biệt
                            </label>
                            <label class="radio-inline">
                                <input type="radio" value="0" name="special" checked>Bình thường
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">

                </div>
                <div class="row">
                    <!-- <div class="form-group col-sm-4">
                            <label>Hàng đặc biệt?</label>
                            <div class="form-control">
                                <label class="radio-inline  mr-3">
                                    <input type="radio" value="1" name="dacBiet">Đặc biệt
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" value="0" name="dacBiet" checked>Bình thường
                                </label>
                            </div>
                        </div> -->

                    <div class="form-group col-sm-4">
                        <label for="view" class="form-label">Số lượt xem</label>
                        <input type="text" name="view" id="view" readonly class="form-control" value="0">
                    </div>
                    <div class="form-group col-sm-4">
                        <?php
                        $today = date_format(date_create(), 'Y/m/d H:i:s'); ?>
                        <label for="date" class="form-label">Ngày nhập</label>
                        <input type="datetime" name="date" id="date" class="form-control" value="<?= $today ?>" readonly>
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="id_staff" class="form-label">Nhân Viên</label>
                        <input type="text" name="id_staff" class="form-control" id="id_staff" value="<?= $_SESSION['admin']['name'] ?>" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-12">
                        <label for="describe_short" class="form-label">Mô tả ngắn</label>
                        <textarea id="describe_short" spellcheck="false" name="describe_short" class="form-control form-control-lg mb-3" rows="10" cols="80" required></textarea>
                        <script>
                            CKEDITOR.replace('describe_short')
                        </script>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-12">
                        <label for="describe" class="form-label">Nội dung sản phẩm</label>
                        <textarea id="describe" spellcheck="false" name="describe" class="form-control form-control-lg mb-3" rows="10" cols="80"></textarea>
                        <script>
                            CKEDITOR.replace('describe')
                        </script>
                    </div>
                </div>

                <div class="mb-3 text-center">
                    <input type="reset" value="Nhập lại" class="btn btn-danger mr-3">
                    <input type="submit" name="btn_insert" value="Thêm mới" class="btn btn-primary mr-3">
                    <a href="Product"><input type="button" class="btn btn-success" value="Danh sách"></a>
                </div>

            </form>
        </div>
    </div>
</div>
<script src="public/js/load-img.js"></script>