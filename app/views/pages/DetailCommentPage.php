<div class="container">
    <div class="page-title">

        <h4 class="mt-5 font-weight-bold text-center">Chi tiết bình luận</h4>
    </div>
    <div class="box box-primary">
        <div class="box-body">
            <form action="?btn_delete_all" method="post" class="table-responsive">

                <button type="submit" class="btn btn-danger mb-1" id="deleteAll" onclick="return checkDelete()">
                    Xóa mục đã chọn</button> <i class="ml-5">Sản phẩm: <b><?= $data['DetailComment'][0]['name'] ?></b></i>
                <table width="100%" class="table table-hover table-bordered text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th><input type="checkbox" id="select-all"></th>
                            <th>Đánh giá</th>
                            <th>Nội dung</th>
                            <th>Ngày BL</th>
                            <th>Người BL</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        foreach ($data['DetailComment'] as $row) {
                            extract($row);

                        ?>
                            <tr>
                                <td><input type="checkbox" name="maBinhLuan[]" value="<?= $maBinhLuan ?>"></td>
                                <td><?= $row['star'] ?> sao</td>
                                <td><?= $row['content'] ?></td>
                                <td><?= $row['date_comment'] ?></td>
                                <td><?= $row['full_name'] ?></td>
                                <td class="text-end">
                                    <a href="./Comment/DeleteComment/<?= $row['id'] ?>" class="btn btn-outline-danger btn-rounded" onclick="return checkDelete()"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php
                        }

                        ?>
                    </tbody>

                </table>
                <input type="hidden" name="maSanPham" value="<?= $maSanPham ?>">
                <div class="mt-3" width="100%">
                    <ul class="pagination justify-content-center">
                        <?php for ($i = 1; $i <= $_SESSION['total_page']; $i++) { ?>

                            <li class="page-item <?= $_SESSION['page'] == $i ? 'active' : '' ?>">
                                <a class="page-link" href="?maSanPham=<?= $maSanPham ?>&page=<?= $i ?>"><?= $i ?></a>
                            </li>

                        <?php } ?>

                    </ul>
                </div>
                <a class="btn btn-dark" href="./Comment">Quay lại</a>
            </form>
        </div>
    </div>
</div>