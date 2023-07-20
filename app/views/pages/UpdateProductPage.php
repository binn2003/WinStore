<?php

$img_path = 'public/images/uploads/products/' . $data['GetProductId']['img'];
if (is_file($img_path)) {
    $img = "<img src='$img_path' height='80'>";
} else {
    $img = "<img src='public/images/products/noimage.png' height='80'>";
}

?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header text-center bg-dark text-white text-uppercase">Cập nhật sản phẩm</div>
            <div class="card-body">
                <form action="Product/UpdateProduct" method="POST" enctype="multipart/form-data" id="update_product">
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label for="id_category" class="form-label">Danh mục</label>
                            <select name="id_category" class="form-control" id="id_category">
                                <?php

                                foreach ($data['ListCategory'] as $dm) {
                                    extract($dm);
                                    if ($dm['id'] == $data['GetProductId']['id_category']) {
                                        $s = "selected";
                                    } else {
                                        $s = "";
                                    }
                                    echo '<option ' . $s . ' value="' . $dm['id'] . '">' . $dm['name'] . '</option>';
                                }

                                ?>

                            </select>
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="productName" class="form-label">Tên sản phẩm</label>
                            <input type="text" name="productName" id="productName" class="form-control" required value="<?= $data['GetProductId']['name'] ?>">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="idProduct" class="form-label">Mã sản phẩm</label>
                            <input type="text" name="idProduct" id="idProduct" readonly class="form-control" value="<?= $data['GetProductId']['id'] ?>">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-4">
                            <div class="row align-items-center">
                                <div class="col-sm-8">
                                    <label for="up_img" class="form-label">Cập nhật ảnh sản phẩm</label>
                                    <input type="hidden" name="img" id="img" class="form-control" value="<?= $data['GetProductId']['img'] ?>">
                                    <input type="file" name="up_img" id="up_img" class="form-control load-img">
                                </div>
                                <div class="col-sm-4">
                                    <!-- Ảnh sản phẩm ban đầu -->
                                    <?= $img ?>
                                    &nbsp;=>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-sm-4">
                            <img id="blah" src="#" alt="your image" style="display: none;height: 80px;" />
                        </div>
                        <div class="form-group col-sm-4">

                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label for="price" class="form-label">Đơn giá (vnđ)</label>
                            <input type="text" name="price" id="price" class="form-control" value="<?= $data['GetProductId']['price'] ?>">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="sale" class="form-label">Giảm giá (vnđ)</label>
                            <input type="text" name="sale" id="sale" class="form-control" required value="<?= $data['GetProductId']['sale'] ?>">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="date" class="form-label">Ngày nhập</label>
                            <input type="datetime" name="date" id="date" class="form-control" required value="<?= $data['GetProductId']['date'] ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label>Hàng đặc biệt?</label>
                            <div class="form-control">
                                <label class="radio-inline  mr-3">
                                    <input type="radio" value="1" name="special" <?= $data['GetProductId']['special'] ? 'checked' : '' ?>> Đặc
                                    biệt
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" value="0" name="special" <?= !$data['GetProductId']['special'] ? 'checked' : '' ?>> Bình thường
                                </label>
                            </div>
                        </div>

                        <div class="form-group col-sm-4">
                            <label for="view" class="form-label">Số lượt xem</label>
                            <input type="text" name="view" id="view" readonly class="form-control" required value="<?= $data['GetProductId']['view'] ?>">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="id_staff" class="form-label">Nhân Viên</label>
                            <input type="text" name="id_staff" id="id_staff" readonly class="form-control" required value="<?= $data['GetProductId']['id_staff'] ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <label for="describe_short" class="form-label">Mô tả ngắn</label>
                            <textarea id="describe_short" spellcheck="false" name="describe_short" class="form-control form-control-lg mb-3" rows="10" cols="80"><?= $data['GetProductId']['describe_short'] ?></textarea>
                            <script>
                                CKEDITOR.replace('describe_short')
                            </script>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <label for="describe" class="form-label">Mô tả sản phẩm</label>
                            <textarea id="txtarea" spellcheck="false" name="describe" class="form-control form-control-lg mb-3" id="textareaExample" rows="3"><?= $data['GetProductId']['describe'] ?></textarea>
                            <script>
                                CKEDITOR.replace('describe')
                            </script>
                        </div>
                    </div>

                    <div class="mb-3 text-center">
                        <input type="reset" value="Nhập lại" class="btn btn-danger mr-3">
                        <input type="submit" name="btn_update" value="Cập nhật" class="btn btn-primary mr-3">
                        <a href="Product"><input type="button" class="btn btn-success" value="Danh sách"></a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<script src="public/js/load-img.js"></script>