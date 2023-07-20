<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header text-center bg-dark text-white text-uppercase">Thêm danh mục</div>
            <div class="card-body">
                <form action="Category/AddCategory" method="POST" id="add_category">
                    <div class="mb-3">
                        <label for="CategoryName" class="form-label">Tên danh mục</label>
                        <input type="text" name="CategoryName" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="idStaff" class="form-label">Nhân Viên</label>
                        <input type="text" name="idStaff" class="form-control" id="idStaff" value="<?= $_SESSION['admin']['name'] ?>" readonly/>
                    </div>


                    <div class="mb-3 text-center">
                        <input type="reset" value="Nhập lại" class="btn btn-danger mr-3">
                        <input type="submit" id="btn_insert" value="Thêm mới" class="btn btn-primary mr-3">
                        <a href="Category"><input type="button" class="btn btn-success" value="Danh sách"></a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>