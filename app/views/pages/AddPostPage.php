<div class="col-lg-12">
    <div class="card">
        <div class="card-header text-center bg-dark text-white text-uppercase">Thêm bài viết mới</div>
        <div class="card-body">
            <form action="Post/AddPost" method="POST" enctype="multipart/form-data" id="add_post">
                <div class="row">

                    <div class="form-group col-sm-12">
                        <label for="title" class="form-label">Tiêu đề bài viết <b style="color: red;">*</b></label>
                        <input type="text" name="title" id="title" class="form-control" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-4">
                        <label for="id_category_post" class="form-label">Danh mục</label>
                        <select name="id_category_post" class="form-control" id="id_category_post">
                            <?php

                            foreach ($data['ListCategoryPost'] as $dmbv) {
                                extract($dmbv);
                                echo '<option value="' . $dmbv['id'] . '">' . $dmbv['name'] . '</option>';
                            }

                            ?>

                        </select>
                    </div>
                    <div class="form-group col-sm-2">
                        <label for="img" class="form-label">Hình ảnh bài viết <b style="color: red;">*</b></label>
                        <input type="file" name="img" id="img" class="form-control load-img">
                    </div>
                    <div class="form-group col-sm-2">
                        <img id="blah" src="#" alt="your image" style="display: none;height: 80px;" />
                    </div>
                    <div class="form-group col-sm-4">
                        <?php
                        $today = date_format(date_create(), 'Y/m/d H:i:s'); ?>
                        <label for="post_date" class="form-label">Ngày đăng bài <b style="color: red;">*</b></label>
                        <input type="datetime" name="post_date" id="post_date" class="form-control" value="<?= $today ?>" readonly>
                    </div>

                </div>
                <div class="row">

                </div>
                <div class="row">

                    <div class="form-group col-sm-4">
                        <label for="view" class="form-label">Số lượt xem</label>
                        <input type="text" name="view" id="view" readonly class="form-control" value="0">
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="id_staff" class="form-label">Người đăng bài</label>
                        <input type="text" name="id_staff" class="form-control" id="id_staff" value="<?= $_SESSION['admin']['name'] ?>" readonly>
                    </div>
                    <div class="form-group col-sm-4">
                        <label>Trạng thái <b style="color: red;">*</b></label>
                        <div class="form-control">
                            <label class="radio-inline  mr-3">
                                <input type="radio" value="1" name="status">Ẩn
                            </label>
                            <label class="radio-inline">
                                <input type="radio" value="0" name="status" checked>Hiển thị
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-12">
                        <label for="describe_short" class="form-label">Mô tả: <b style="color: red;">*</b></label>
                        <textarea id="describe_short" spellcheck="false" name="describe_short" class="form-control form-control-lg mb-3" rows="5" cols="80" required></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-12">
                        <label for="content" class="form-label">Nội dung: </label>
                        <textarea id="content" spellcheck="false" name="content" class="form-control form-control-lg mb-3" rows="10" cols="80" required></textarea>
                        <script>
                            CKEDITOR.replace('content')
                        </script>
                    </div>
                </div>

                <div class="mb-3 text-center">
                    <input type="reset" value="Nhập lại" class="btn btn-danger mr-3">
                    <input type="submit" name="btn_insert" value="Thêm mới" class="btn btn-primary mr-3">
                    <a href="Post"><input type="button" class="btn btn-success" value="Danh sách"></a>
                </div>

            </form>
        </div>
    </div>
</div>
<script src="public/js/load-img.js"></script>