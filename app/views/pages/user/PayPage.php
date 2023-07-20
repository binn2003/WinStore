<?php
$totalAll = 0;
if (isset($_SESSION['cart'])) {
?>
    <h5 class="alert-secondary mb-3 pt-3 pb-3 pl-sm-4 shadow-sm text-center text-sm-center text-md-center text-lg-center text-xl-center" style=" margin-bottom: 0rem">Thông tin nhận hàng </h5>
    <div class="row m-1 pb-5 justify-content-center">
        <form action="./Auth/Invoice" method="POST" class="col-7 mr-5" enctype="multipart/form-data" id="form_pay">
            <div class="form-group form">
                <label for="">Họ và tên</label>
                <input type="text" name="name_user" id="" class="form-control rounded-pill" value="<?php if (isset($_SESSION['user'])) {
                                                                                                        echo $_SESSION['user']['name'];
                                                                                                    } else {
                                                                                                    } ?>" required>
            </div>
            <div class="form-group">
                <input type="hidden" name="idUser" id="" class="form-control rounded-pill" value="<?php if (isset($_SESSION['user'])) {
                                                                                                        echo $_SESSION['user']['id'];
                                                                                                    } ?>">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" name="email_user" id="" class="form-control rounded-pill" value="<?php if (isset($_SESSION['user'])) {
                                                                                                        echo $_SESSION['user']['email'];
                                                                                                    } ?>" required>
            </div>
            <div class="form-group">
                <label for="">Số điện thoại</label>
                <input type="text" name="phone_user" id="" class="form-control rounded-pill" value="<?php if (isset($_SESSION['user'])) {
                                                                                                        echo $_SESSION['user']['phone'];
                                                                                                    } ?>" placeholder="" required>
            </div>
            <div class="form-group">
                <label for="">Địa chỉ nhận hàng</label>
                <input type="text" name="address_user" id="" class="form-control rounded-pill" value="<?php if (isset($_SESSION['user'])) {
                                                                                                            echo $_SESSION['user']['address'];
                                                                                                        } ?>" placeholder="" required>
            </div>
            <div class="form-group">
                <label for="">Phương thức thanh toán </label>
                <br>
                <input type="radio" name="payment" id="" value="1" checked> Thanh toán khi nhận hàng
                <input type="radio" name="payment" id="" value="2"> Thanh toán chuyển khoản
                <input type="radio" name="payment" id="" value="3"> Thanh toán ví Momo
            </div>
            <!-- <div class="form-group">
                <label for="">Ghi chú</label>
                <textarea name="ghi_chu" class="form-control" id=""></textarea>
            </div> -->

            <div class="row m-1 col-15" style="border: 2px solid gray;">
                <table class="table table-responsive-md">
                    <thead class="thead text-center">
                        <tr>
                            <th>Mã SP</th>
                            <th>Tên SP</th>
                            <th>Đơn giá</th>
                            <th>Giảm giá</th>
                            <th style="width:6rem">Số lượng</th>
                            <th>Thành tiền</th>
                            <!-- <th>Thao tác</th> -->
                        </tr>
                    </thead>
                    <tbody class="text-center" id="giohang">

                        <?php foreach ($_SESSION['cart'] as $index => $item) : ?>
                            <tr>
                                <td><?= $index ?></td>
                                <td><?= $item['name'] ?></td>
                                <td><span><?= number_format($item['price'], 0, ',', '.') ?></span> <sup>đ</sup> <input type="hidden" class="giaSP_an" name="price" value="<?= $item['price'] ?>"></td>
                                <td><span><?php
                                            if ($item['sale'] > 0) {
                                                echo number_format($giam = $item['sale'] - $item['price'], 0, ',', '.');
                                            } else {
                                                echo number_format($giam = 0, 0, ',', '.');
                                            } ?></span> <sup>đ</sup>
                                    <input type="hidden" class="giamGia_an" name="sale" value="<?= $item['sale'] ?>">
                                </td>
                                <td class="pt-1 m-auto">
                                    <form action="delete_cart.php?act=update_sl" method="post">
                                        <input type="text" class="form-control sl" name="update_sl" onchange="this.form.submit()" value="<?= $item['sl'] ?>" min="1" max="10" disabled>
                                        <input type="hidden" class="form-control" name="idProduct" value="<?= $index ?>">
                                    </form>
                                </td>
                                <td> <span class="thanh_tien_sp"><?= number_format($total = (($item['price'] + $giam) * $item['sl']), 0, ',', '.') ?></span><sup>đ</sup></td>
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
                    </tfoot>
                </table>
            </div>
            <input type="hidden" name="totalAll" value="<?= $totalAll ?>">
            <div class="d-flex justify-content-center mt-3">
                <button type="submit" name="btn_thanh_toan" class="btn btn-success btn-block pt-2 pb-2 rounded-pill">Xác
                    nhận</button>
            </div>
        </form>
    </div>

<?php } else { ?>
    <h5 class="alert-info mb-3 pt-3 pb-3 pl-sm-4 shadow-sm text-center" style="margin-bottom: 0rem"><i class='fas fa-box'></i> Giỏ hàng</h5>
    <div class="row  m-1 pb-5">
        <h6 class="col-12 mt-4 mb-5 text-danger text-center">Không tồn tại sản phẩm nào trong giỏ hàng!! </h6>
        <a class="btn btn-outline-dark col-12" href="./"> Về trang chủ</a>
    </div>
<?php } ?>