<div class="container-fluid" style="    width: 85%;">
    <div class="noidung" style="background-color: #fff;margin-top: 30px;">
        <div class="noidung__content">
            <h3 style="color: var(--text-color-red);text-align: center;font-size: 1.7rem;"><i class="fas fa-shipping-fast"></i> Đơn hàng của tôi</h3><br>
            <table width="100%" class="table table-hover table-bordered text-center">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Mã Code</th>
                        <th>Họ và tên</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ</th>
                        <th>Ngày đặt</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($data['BillByIdUser'] as $row) {
                    ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $row['code_bill'] ?></td>
                            <td><?= $row['name_user'] ?></td>
                            <td><?= $row['phone_user'] ?></td>
                            <td><?= $row['address_user'] ?></td>
                            <td><?= $row['date_buy'] ?></td>
                            <td>
                                <span><?= number_format($row['total'], 0, ',', '.') ?></span> <sup>đ</sup>
                            </td>
                            <td class="red"><?php if ($row['status']  == 1) {
                                                echo 'Chờ xác nhận';
                                            } else if ($row['status']  == 2) {
                                                echo '<span style="color: #31cde0">Đang giao hàng</span>';
                                            } else if ($row['status']  == 3) {
                                                echo '<span style="color: lightgreen">Đã giao</span>';
                                            } else if ($row['status']  == 4) {
                                                echo 'Đã hủy';
                                            } ?></td>
                            <td class="text-end">
                                <a href="./Auth/DetailBill/<?= $row['id'] ?>" class="btn btn-outline-info btn-rounded">Chi tiết <b class="fas fa-info-circle"></b></i></a>
                            </td>
                        </tr>
                    <?php
                    }

                    ?>
                </tbody>

            </table>
        </div>
    </div>
</div>