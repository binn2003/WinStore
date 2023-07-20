<?php

$img_path = 'public/images/uploads/news/' . $data['GetPostId']['img'];
if (is_file($img_path)) {
    $img = "<img src='$img_path' height='80'>";
} else {
    $img = "<img src='public/images/products/noimage.png' height='80'>";
}

?>
<div class="col-lg-12">
    <div class="card">
        <div class="card-header text-center bg-dark text-white text-uppercase">Sửa bài viết</div>
        <div class="card-body">
            <form action="Post/UpdatePost" method="POST" enctype="multipart/form-data" id="update_post">
                <div class="row">
                    <div class="form-group col-sm-12">
                        <label for="title" class="form-label">Tiêu đề bài viết <b style="color: red;">*</b></label>
                        <input type="text" name="title" id="title" class="form-control" required value="<?= $data['GetPostId']['title'] ?>">
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="id_category_post" class="form-label">Danh mục</label>
                        <select name="id_category_post" class="form-control" id="id_category_post">
                            <?php

                            foreach ($data['ListCategoryPost'] as $dmbv) {
                                extract($dmbv);
                                if ($dmbv['id'] ==  $data['GetPostId']['id_category']) {
                                    $s = "selected";
                                } else {
                                    $s = "";
                                }
                                echo '<option ' . $s . ' value="' . $dmbv['id'] . '">' . $dmbv['name'] . '</option>';
                            }

                            ?>

                        </select>
                    </div>
                    <div class="form-group col-sm-2">
                        <label>Trạng thái <b style="color: red;">*</b></label>
                        <div class="form-control">
                            <label class="radio-inline  mr-3">
                                <input type="radio" value="1" name="status" <?= $data['GetPostId']['status'] ? 'checked' : '' ?>>Ẩn
                            </label>
                            <label class="radio-inline">
                                <input type="radio" value="0" name="status" <?= !$data['GetPostId']['status'] ? 'checked' : '' ?>>Hiển thị
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-sm-4">
                        <div class="row align-items-center">
                            <div class="col-sm-8">
                                <label for="up_img" class="form-label">Hình ảnh </label>
                                <input type="hidden" name="img" id="img" class="form-control" value="<?= $data['GetPostId']['img'] ?>">
                                <input type="file" name="up_img" id="up_img" class="form-control load-img">
                            </div>
                            <div class="col-sm-4">
                                <!-- Ảnh bài viết ban đầu -->
                                <?= $img ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-sm-2">
                            =><img id="blah" src="#" alt="your image" style="display: none;height: 80px;" />
                        </div>
                    
                </div>
                <div class="row">
                    <div class="form-group col-sm-4">
                        <label for="view" class="form-label">Số lượt xem</label>
                        <input type="text" name="view" id="view" readonly class="form-control" value="<?= $data['GetPostId']['view'] ?>">
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="id_staff" class="form-label">Người đăng bài</label>
                        <input type="text" name="id_staff" class="form-control" id="id_staff" value="<?= $data['GetPostId']['id_staff'] ?>" readonly></input>
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="post_date" class="form-label">Ngày đăng bài <b style="color: red;">*</b></label>
                        <input type="datetime" name="post_date" id="post_date" class="form-control" required value="<?= $data['GetPostId']['post_date'] ?>" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-12">
                        <label for="describe_short" class="form-label">Mô tả: <b style="color: red;">*</b></label>
                        <textarea id="describe_short" spellcheck="false" name="describe_short" class="form-control form-control-lg mb-3" rows="5" cols="80" required><?= $data['GetPostId']['describe_short'] ?></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-12">
                        <label for="content" class="form-label">Nội dung: </label>
                        <textarea id="content" spellcheck="false" name="content" class="form-control form-control-lg mb-3" rows="10" cols="80" required><?= $data['GetPostId']['content'] ?></textarea>
                        <script>
                            CKEDITOR.replace('content')
                        </script>
                    </div>
                </div>

                <div class="mb-3 text-center">
                    <input type="hidden" name="idPost" value="<?= $data['GetPostId']['id'] ?>">
                    <input type="reset" value="Nhập lại" class="btn btn-danger mr-3">
                    <input type="submit" name="btn_update" value="Cập nhật" class="btn btn-primary mr-3">
                    <a href="Post"><input type="button" class="btn btn-success" value="Danh sách"></a>
                </div>

            </form>
        </div>
    </div>
</div>
<script src="public/js/load-img.js"></script>