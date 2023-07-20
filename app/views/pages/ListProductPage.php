<div class="container">
    <div class="page-title">
        <h4 class="mt-5 font-weight-bold text-center">Danh sách sản phẩm</h4>
        <?php
        if (isset($MESSAGE) && (strlen($MESSAGE) > 0)) {
            echo '<h5 class="alert alert-warning">' . $MESSAGE . '</h5>';
        }
        ?>
    </div>
    <div class="box box-primary">
        <div class="box-body">
            <form class="pb-3" action="./Product/Search" method="POST">
                <div class="input-group">
                    <input type="text" class="form-control" name="kyw" placeholder="Nhập từ khóa...">
                    <div class="input-group-append">
                        <button class="btn bg-dark" type="submit" name="timkiem"><i class="fa fa-search text-white"></i></button>
                    </div>
                </div>
            </form>
            <h5 class="alert-secondary pt-3 pb-3 pl-sm-4 shadow-sm text-center "><?= $data['title_site'] ?></h5>
            <form action="?btn_delete_all" method="POST" class="table-responsive">
                <button type="submit" class="btn btn-danger mb-1" id="deleteAll" onclick="return checkDelete()">
                    Xóa mục đã chọn</button>
                <table width="100%" class="table table-hover table-bordered text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th><input type="checkbox" id="select-all"></th>
                            <th>Mã SP</th>
                            <th>Tên sản phẩm</th>
                            <th>Ảnh</th>
                            <th>Đơn giá</th>
                            <th>Giá giảm</th>
                            <th>Ngày nhập</th>
                            <th>Đặc biệt?</th>
                            <th>Danh mục</th>
                            <th>Nhân viên</th>
                            <th><a href="Product/AddProduct" class="btn btn-success text-white">Thêm mới
                                    <i class="fas fa-plus-circle"></i></a></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        foreach ($data['ListProduct'] as $row) {
                            $img_path = 'public/images/uploads/products/' . $row['img'];
                            if (is_file($img_path)) {
                                $img = "<img src='$img_path' height='100' width='100' class='object-fit-contain'>";
                            } else {
                                $img = "<img src='public/images/products/noimage.png' height='80'>";
                            }
                            //Tính giảm bn %
                            if ($row['price'] > 0) {
                                $percent_discount = number_format(($row['sale'] - $row['price']) / $row['price'] * 100);
                            }
                        ?>
                            <tr>
                                <td><input type="checkbox" name="maSanPham[]" value="<?= $row['id'] ?>"></td>
                                <td><?= $row['id'] ?></td>
                                <td><?= $row['name'] ?></td>
                                <td><?= $img ?></td>
                                <td><?= number_format($row['price'], 0) ?><sup>đ</sup></td>
                                <td><?php if ($row['sale'] > 0) {
                                        echo number_format($row['sale'], 0);
                                    } else {
                                        echo number_format($row['price'], 0);
                                    }
                                    ?><sup>đ</sup><i class="text-danger"><?php if ($row['sale'] > 0) {
                                                                                echo '(' . $percent_discount . '%)';
                                                                            } else {
                                                                            }
                                                                            ?></i>
                                </td>
                                <td><?= $row['date'] ?></td>
                                <td><?= ($row['special'] == 1) ? "Đặc biệt" : "Không"; ?></td>
                                <td><?= $row['category_name'] ?></td>
                                <td><?= $row['full_name'] ?></td>
                                <td class="text-end">
                                    <a href="./Auth/DetailProduct/<?= $row['id'] ?>" target="_blank" class="btn btn-outline-info btn-rounded"><i class="fas fa-eye"></i></a>
                                    <a href="Product/ShowUpdate/<?= $row['id'] ?>" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>
                                    <a href="Product/DeleteProduct/<?= $row['id'] ?>" class="btn btn-outline-danger btn-rounded" onclick="return checkDelete()"><i class="fas fa-trash"></i></a>
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