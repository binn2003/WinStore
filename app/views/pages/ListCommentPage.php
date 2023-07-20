<div class="container">
    <div class="page-title">
        <h4 class="mt-5 font-weight-bold text-center">Tổng hợp bình luận</h4>
    </div>
    <div class="box box-primary">
        <div class="box-body">
            <table width="100%" class="table table-hover table-bordered text-center">
                <thead class="thead-dark">
                    <tr>
                        <th>ID Hàng hóa</th>
                        <th>Hàng hóa</th>
                        <th>Số bình luận</th>
                        <th>Cũ nhất</th>
                        <th>Mới nhất</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    foreach ($data['ListComment'] as $row) {
                    ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['name'] ?></td>
                            <td><?= $row['so_luong'] ?></td>
                            <td><?= $row['cu_nhat'] ?></td>
                            <td><?= $row['moi_nhat'] ?></td>
                            <td class="text-end">
                                <a href="./Comment/DetailComment/<?= $row['id'] ?>" class="btn btn-outline-info btn-rounded">Chi tiết <i class="fas fa-info-circle"></i></i></a>
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