<?php
$totalAll = 0;

?>
<h5 class="alert-info mb-3 pt-3 pb-3 pl-sm-4 shadow-sm text-center" style="margin-bottom: 0rem"><i class='fas fa-box'></i> Giỏ hàng</h5>

<div class="container">

    <?php
    if (isset($_SESSION['cart'])) {
    ?>
        <div class="row m-1 pb-5">
            <table class="table table-responsive-md">
                <thead class="thead text-center">
                    <tr>
                        <th>Mã SP</th>
                        <th>Tên SP</th>
                        <th>Đơn giá</th>
                        <th>Giảm giá</th>
                        <th style="width:6rem">Số lượng</th>
                        <th>Cập nhật số lượng</th>
                        <th>Thành tiền</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody class="text-center" id="giohang">

                    <?php
                    foreach ($_SESSION['cart'] as $index => $item) : ?>
                        <tr>
                            <td><?= $index ?></td>
                            <td><?= $item['name'] ?></td>
                            <td><span><?= number_format($item['price'], 0, ',', '.') ?></span> <sup>đ</sup> <input type="hidden" class="giaSP_an" name="giaSP" value="<?= $item['price'] ?>"></td>
                            <td><span>
                                    <?php
                                    if ($item['sale'] > 0) {
                                        echo number_format($giam = $item['sale'] - $item['price'], 0, ',', '.');
                                    } else {
                                        echo number_format($giam = 0, 0, ',', '.');
                                    } ?></span> <sup>đ</sup>
                                <input type="hidden" class="giamGia_an" name="giamGia" value="<?= $item['sale'] ?>">
                            </td>
                            <td>
                                <?= $item['sl'] ?>
                            </td>
                            <td>
                                <form action="./Auth/AddCart/<?= $index ?>" method="post">
                                    <input type="number" class="text-center" id="quantity" name="quantity" min="1" max="100" value="1">
                                    <button type="submit"><i class='fa fa-upload'></i></button>
                                </form>
                            </td>
                            <td> <span class="thanh_tien_sp"><?= number_format($total = (($item['price'] + $giam) * $item['sl']), 0, ',', '.') ?></span><sup>đ</sup></td>
                            <td class="pt-1 m-auto">
                                <a onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');" href="./Auth/DeleteCart/<?= $index ?>" class="btn btn-outline-danger"> <i class="fas fa-trash-alt "></i></a>
                            </td>
                        </tr>
                    <?php $totalAll += $total;
                    endforeach ?>
                </tbody>
                <tfoot id="tongdonhang">
                    <tr class="text-center">
                        <th colspan="5">Tổng thành tiền: </th>
                        <td class="  text-danger font-weight-bold"><span id="tong_thanh_tien"><?= number_format($totalAll, 0, ',', '.') ?></span> <sup>đ</sup></td>
                        <td></td>
                    </tr>
                    <tr class="text-right">
                        <th colspan="7">
                            <a href="./Auth/Pay" class="btn btn-success">Thanh toán</a>
                            <a onclick="return confirm('Bạn muốn xóa toàn bộ giỏ hàng?');" href="./Auth/DeleteAllCart" class="btn btn-danger">Xóa tất cả</a>
                        </th>
                    </tr>
                </tfoot>
            </table>
        </div>
    <?php } else { ?>
        <div class="row  m-1 pb-5">
            <h6 class="col-12 mt-4 text-danger text-center">Không tồn tại sản phẩm nào trong giỏ hàng!! </h6>
            <a class="btn btn-outline-dark col-12 mt-5" href="./"> Về trang chủ</a>
        </div>
    <?php } ?>
</div>