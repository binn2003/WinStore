<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header text-center bg-dark text-white text-uppercase">Cập nhật danh mục</div>
            <div class="card-body">
                <form action="Category/UpdateCategory" method="POST" id="update_category">
                    <!-- <div class="row">
                                        <div class="form-group col-sm-6">
                                            <label for="maDanhMuc" class="form-label">Mã danh mục</label>
                                            <input type="text" name="maDanhMuc" class="form-control" value="Auto" disabled>
                                        </div>
                
                                        
                                    </div> -->
                    <div class="mb-3">
                        <label for="CategoryName" class="form-label">Tên danh mục</label>
                        <input type="text" name="CategoryName" class="form-control" value="<?= $data['GetCategoryId']['name'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="idStaff" class="form-label">Nhân Viên</label>
                        <input type="text" name="idStaff" class="form-control" id="idStaff" value="<?= $data['GetCategoryId']['id_staff'] ?>" readonly />
                    </div>

                    <input type="hidden" name="id" value="<?= $data['GetCategoryId']['id'] ?>">
                    <div class="mb-3 text-center">
                        <input type="reset" value="Nhập lại" class="btn btn-danger mr-3">
                        <input type="submit" name="btn_insert" value="Cập nhật" class="btn btn-primary mr-3">
                        <a href="Category"><input type="button" class="btn btn-success" value="Danh sách"></a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>