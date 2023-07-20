<div class="container">
    <div class="page-title">
        <h4 class="mt-5 font-weight-bold text-center">Danh sách bài viết</h4>
        <?php
        if (isset($MESSAGE) && (strlen($MESSAGE) > 0)) {
            echo '<h5 class="alert alert-warning">' . $MESSAGE . '</h5>';
        }
        ?>
    </div>
    <div class="box box-primary">
        <div class="box-body">
            <form action="?btn_delete_all" method="POST" class="table-responsive">
                <button type="submit" class="btn btn-danger mb-1" id="deleteAll" onclick="return checkDelete()">
                    Xóa mục đã chọn</button>
                <table width="100%" class="table table-hover table-bordered text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th><input type="checkbox" id="select-all"></th>
                            <th>Tiêu đề bài viết</th>
                            <th>Mô tả</th>
                            <th>Hình ảnh</th>
                            <th>Ngày đăng bài</th>
                            <th>Danh mục</th>
                            <th>Trạng thái</th>
                            <th>Lượt xem</th>
                            <th>Người đăng</th>
                            <th><a href="Post/AddPost" class="btn btn-success text-white">Thêm mới
                                    <i class="fas fa-plus-circle"></i></a></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($data['ListPost'] as $row) {
                            $img_path ='public/images/uploads/news/' . $row['img'];
                            if (is_file($img_path)) {
                                $img = "<img src='$img_path' height='100' width='100' class='object-fit-contain'>";
                            } else {
                                $img = "<img src='public/images/products/noimage.png' height='80'>";
                            }
                        ?>
                        <tr>
                            <td><input type="checkbox" name="idBaiViet[]" value="<?= $row['id'] ?>"></td>
                            <td class="mo-ta-bai-viet">
                                <p id="CTmota"><?= $row['title'] ?></p>
                            </td>
                            <td class="mo-ta-bai-viet">
                                <p id="CTmota"><?= $row['describe_short'] ?></p>
                            </td>
                            <td><?= $img ?></td>
                            <td><?= $row['post_date'] ?></td>
                            <td><?= $row['category_post_name'] ?></td>
                            <td><?= ($row['status'] == 1) ? "Ẩn" : "Hiển thị"; ?></td>
                            <td><?= $row['view'] ?></td>
                            <td><?= $row['full_name'] ?></td>
                            <td class="text-end">
                                <a href="./Auth/DetailNews/<?= $row['id'] ?>" target="_blank" class="btn btn-outline-info btn-rounded"><i class="fas fa-eye"></i></a>
                                <a href="Post/ShowUpdate/<?= $row['id'] ?>" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>
                                <a href="Post/DeletePost/<?= $row['id'] ?>" class="btn btn-outline-danger btn-rounded" onclick="return checkDelete()"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php
                        }

                        ?>
                    </tbody>

                </table>

                <div class="mt-3" width="100%">
                    <ul class="pagination justify-content-center">
                        <!-- <?php for ($i = 1; $i <= $_SESSION['total_page']; $i++) { ?>

                        <li class="page-item <?= $_SESSION['page'] == $i ? 'active' : '' ?>">
                            <a class="page-link" href="?btn_list&page=<?= $i ?>"><?= $i ?></a>
                        </li>

                        <?php } ?> -->

                    </ul>
                </div>
            </form>
        </div>
    </div>
</div>