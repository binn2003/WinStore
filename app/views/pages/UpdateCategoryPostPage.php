<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header text-center bg-dark text-white text-uppercase">Cập nhật danh mục bài viết</div>
            <div class="card-body">
                <form action="CategoryPost/UpdateCategoryPost" method="POST" id="update_category_post">
                    <!-- <div class="row">
                                        <div class="form-group col-sm-6">
                                            <label for="maDanhMuc" class="form-label">Mã danh mục</label>
                                            <input type="text" name="maDanhMuc" class="form-control" value="Auto" disabled>
                                        </div>
                
                                        
                                    </div> -->
                    <div class="mb-3">
                        <label for="CategoryPostName" class="form-label">Tên danh mục</label>
                        <input type="text" name="CategoryPostName" class="form-control" value="<?= $data['GetCategoryPostId']['name'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="idStaff" class="form-label">Nhân Viên</label>
                        <input type="text" name="idStaff" class="form-control" id="idStaff" value="<?= $data['GetCategoryPostId']['id_staff'] ?>" readonly />
                    </div>

                    <input type="hidden" name="id" value="<?= $data['GetCategoryPostId']['id'] ?>">
                    <div class="mb-3 text-center">
                        <input type="reset" value="Nhập lại" class="btn btn-danger mr-3">
                        <input type="submit" name="btn_insert" value="Cập nhật" class="btn btn-primary mr-3">
                        <a href="CategoryPost"><input type="button" class="btn btn-success" value="Danh sách"></a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>