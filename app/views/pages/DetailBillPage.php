<div class="container">
    <div class="page-title">

        <h4 class="mt-5 font-weight-bold text-center">Chi tiết đơn hàng</h4>
    </div>
    <div class="box box-primary">
        <div class="box-body">
            <form action="?btn_delete_all" method="post" class="table-responsive">

                <a class="btn btn-dark" href="./Bill">Quay lại</a><i class="ml-5">Mã Code: <b><?=$data['BillId'][0]['code_bill']?></b></i>
                <table width="100%" class="table table-hover table-bordered text-center mt-2">
                    <thead class="thead-dark">
                        <tr>
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
                        foreach ($data['DetailBill'] as $item) {
                            $img_path = 'public/images/uploads/products/' . $item['img_product'];
                            if (is_file($img_path)) {
                                $img = "<img src='$img_path' height='100' width='100' class='object-fit-contain'>";
                            } else {
                                $img = "<img src='public/images/products/noimage.png' height='80'>";
                            }
                        ?>
                            <tr>
                                <td><?= $item['id_product'] ?></td>
                                <td><?= $item['name_product'] ?></td>
                                <td><?= $img ?></td>
                                <td><?= $item['quantity'] ?></td>
                                <td><?= number_format($item['price_product'], 0, ',', '.') ?><sup>đ</sup></td>
                                <td><?= number_format($item['price_product'] * $item['quantity'], 0, ',', '.') ?><sup>đ</sup></td>
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
            </form>
        </div>
    </div>
</div>