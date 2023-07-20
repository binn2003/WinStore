<div class="container">
    <div class="page-title">
        <h4 class="mt-5 font-weight-bold text-center">Danh sách danh mục</h4>
    </div>
    <div class="box box-primary">
        <div class="box-body">
            <form action="?btn_delete_all" method="post" class="table-responsive">
                <button type="submit" class="btn btn-danger mb-1" id="deleteAll" onclick="return checkDelete()">
                    Xóa mục đã chọn</button>
                <table width="100%" class="table table-hover table-bordered text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th><input type="checkbox" id="select-all"></th>
                            <th>Mã danh mục</th>
                            <th>Tên danh mục</th>
                            <th>Nhân viên</th>
                            <th><a href="Category/AddCategory" class="btn btn-success text-white">Thêm mới
                                    <i class="fas fa-plus-circle"></i></a></th>
                        </tr>
                    </thead> 
                    <tbody>
                        <?php
                        foreach ($data['ListCategory'] as $row) {
                        ?>
                            <tr>
                                <td><input type="checkbox" name="maDanhMuc[]" value="<?= $row['id'] ?>">
                                </td>
                                <td>
                                    <?= $row['id'] ?>
                                </td>
                                <td>
                                    <?= $row['name'] ?>
                                </td>
                                <td>
                                    <?= $row['full_name'] ?>
                                </td>
                                <td class="text-end">
                                    <a href="Category/ShowUpdate/<?= $row['id'] ?>" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>
                                    <a href="Category/DeleteCategory/<?= $row['id'] ?>" class="btn btn-outline-danger btn-rounded" onclick="return checkDelete()"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>

                </table>
            </form>
        </div>
    </div>
</div>