<div class="container">
    <div class="page-title">
        <h4 class="mt-5 font-weight-bold text-center">Đơn hàng</h4>
    </div>
    <div class="box box-primary">
        <div class="box-body">
            <table width="100%" class="table table-hover table-bordered text-center">
                <thead class="thead-dark">
                    <tr>
                        <th>STT</th>
                        <th>Mã hóa đơn</th>
                        <th>Khách hàng</th>
                        <th>Địa chỉ nhận hàng</th>
                        <th>Số điện thoại</th>
                        <th>Ngày Đặt</th>
                        <th>Trạng Thái</th>
                        <th>Phương thức thanh toán</th>
                        <th>Tổng đơn hàng</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($data['ListBill'] as $item) {
                    ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $item['code_bill'] ?></td>
                            <td><?= $item['name_user'] ?></td>
                            <td><?= $item['address_user'] ?></td>
                            <td><?= $item['phone_user'] ?></td>
                            <td><?= $item['date_buy'] ?></td>
                            <td style="color: #dc3545;"><?php if ($item['status']  == 1) {
                                                            echo 'Chờ xác nhận';
                                                        } else if ($item['status']  == 2) {
                                                            echo '<span style="color: #31cde0">Đang giao hàng</span>';
                                                        } else if ($item['status']  == 3) {
                                                            echo '<span style="color: lightgreen">Đã giao</span>';
                                                        } else if ($item['status']  == 4) {
                                                            echo 'Đã hủy';
                                                        } ?></td>
                            <td><?php if ($item['payment'] == 1) {
                                    echo 'Thanh toán khi nhận hàng';
                                } else if ($item['payment'] == 2) {
                                    echo 'Thanh toán chuyển khoản';
                                } else if ($item['payment'] == 3) {
                                    echo 'Thanh toán ví Momo';
                                } ?></td>
                            <td>
                                <span style="color: #dc3545;"><?= number_format($item['total'], 0, ',', '.') ?></span> <sup style="color: #dc3545;">đ</sup>
                            </td>
                            <td class="text-end">
                                <?php if ($item['status']  != 4) {?>
                                     <a href="./Bill/ShowUpdateBill/<?= $item['id'] ?>" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>
                                <?php }
                                ?>
                               
                            </td>
                            <td class="text-end">
                                <a href="./Bill/DetailBill/<?= $item['id'] ?>" class="btn btn-outline-info btn-rounded">Chi tiết <i class="fas fa-info-circle"></i></i></a>
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