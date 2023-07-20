<div class="container-fluid" style="    width: 85%;margin-top: 30px;">
    <div class="noidung" style="background-color: #fff;">
        <div class="noidung__content">
            <div class="content__header">
                <a href="./Auth/ListBill" class="btn btn-outline-info" style="position: absolute;"><i class="fa fa-reply"></i></a>
                <h3 style="color: var(--text-color-red);text-align: center;font-size: 1.7rem;">Thông tin nhận hàng</h3>
                <table style="width: 100%;margin-top: 30px;">
                    <tr>
                        <td></td>
                        <td>Mã Code: </td>
                        <td><?= $data['BillId'][0]['code_bill'] ?></td>
                        <td>Họ và tên:</td>
                        <td><?= $data['BillId'][0]['name_user'] ?></td>
                    </tr>

                    <tr>
                        <td></td>
                        <td>Trạng thái:</td>
                        <td class="red"><?php if ($data['BillId'][0]['status']  == 1) {
                                            echo 'Chờ xác nhận';
                                        } else if ($data['BillId'][0]['status']  == 2) {
                                            echo '<span style="color: #31cde0">Đang giao hàng</span>';
                                        } else if ($data['BillId'][0]['status']  == 3) {
                                            echo '<span style="color: lightgreen">Đã giao</span>';
                                        } else if ($data['BillId'][0]['status']  == 4){
                                            echo 'Đã hủy';
                                        }  ?></td>
                        <td>Số điện thoại:</td>
                        <td><?= $data['BillId'][0]['phone_user'] ?></td>
                    </tr>

                    <tr>
                        <td></td>
                        <td>Phương thức thanh toán:</td>
                        <td><?php if ($data['BillId'][0]['payment'] == 1) {
                                echo 'Thanh toán khi nhận hàng';
                            } else if ($data['BillId'][0]['payment'] == 2) {
                                echo 'Thanh toán chuyển khoản';
                            } else if ($data['BillId'][0]['payment'] == 3) {
                                echo 'Thanh toán ví Momo';
                            } ?></td>
                        <td>Email:</td>
                        <td><?= $data['BillId'][0]['email_user'] ?></td>
                    </tr>

                    <tr>
                        <td></td>
                        <td>Ngày mua hàng:</td>
                        <td><?= $data['BillId'][0]['date_buy'] ?></td>
                        <td>Địa chỉ:</td>
                        <td><?= $data['BillId'][0]['address_user'] ?></td>
                    </tr>
                </table>



            </div>
            <h3 style="color: var(--text-color-red);text-align: center;font-size: 1.7rem;">Chi tiết đơn hàng</h3>
            <table width="100%" style="text-align: center;margin-top: 30px;">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Mã sản phẩm</th>
                        <th>Sản phẩm</th>
                        <th>Hình</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i=1;
                    foreach ($data['DetailBill'] as $row) {
                        $img_path = 'public/images/uploads/products/' . $row['img_product'];
                            if (is_file($img_path)) {
                                $img = "<img src='$img_path' height='100' width='100' class='object-fit-contain'>";
                            } else {
                                $img = "<img src='public/images/products/noimage.png' height='80'>";
                            }
                    ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $row['id_product'] ?></td>
                            <td><?= $row['name_product'] ?></td>
                            <td><?= $img ?></td>
                            <td><?= $row['quantity'] ?></td>
                            <td><?= number_format($row['price_product'], 0, ',', '.') ?><sup>đ</sup></td>
                            <td><?= number_format($row['price_product'] * $row['quantity'], 0, ',', '.') ?><sup>đ</sup></td>
                        </tr>
                    <?php
                    }

                    ?>
                </tbody>
                <tfoot>
                    <tr class="text-center">
                        <th colspan="5">Tổng thành tiền: </th>
                        <td class="  text-danger font-weight-bold"><span id="tong_thanh_tien"><?= number_format($data['BillId'][0]['total'], 0, ',', '.') ?></span> <sup>đ</sup></td>
                    </tr>
                </tfoot>
            </table>

        </div>
    </div>
</div>