<div class="container">
    <div class="page-title">
        <h4 class="mt-5 font-weight-bold text-center">Danh sách khách hàng</h4>
    </div>
    <div class="box box-primary">
        <div class="box-body">
            <form action="?btn_delete_all" method="post" class="table-responsive">
                <button type="submit" class="btn btn-danger mb-1" id="deleteAll" onclick="return checkDelete()">
                    Xóa mục đã chọn</button>
                <table width="100%" class="table table-hover table-bordered text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th><input type="checkbox" id="select-all"></th>
                            <th>ID</th>
                            <th>Họ và tên</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Ảnh</th>
                            <th>Trạng thái</th>
                            <th><a href="User/AddUser" class="btn btn-success text-white">Thêm mới
                                    <i class="fas fa-plus-circle"></i></a></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        foreach ($data['ListUser'] as $row) {
                            $img_path ='public/images/uploads/users/' . $row['img'];
                            if (is_file($img_path)) {
                                $img = "<img src='$img_path' height='100' width='100' class='object-fit-contain'>";
                            } else {
                                $img = "<img src='public/images/user.png' height='80'>";
                            }

                        ?>
                            <tr>
                                <td><input type="checkbox" name="idKhachHang[]" value="<?= $row['id'] ?>"></td>
                                <td><?= $row['id'] ?></td>
                                <td><?= $row['full_name'] ?></td>
                                <td><?= $row['email'] ?></td>
                                <td><?= $row['phone'] ?></td>
                                <td><?= $row['address'] ?></td>
                                <td><?= $img ?></td>
                                <td><?= ($row['activated'] == 1) ? "Đã kích hoạt" : "Chưa kích hoạt"; ?></td>
                                <td class="text-end">
                                    <a href="User/ShowUpdate/<?= $row['id'] ?>" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>
                                    <a href="User/DeleteUser/<?= $row['id'] ?>" class="btn btn-outline-danger btn-rounded" onclick="return checkDelete()"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php
                        }

                        ?>
                    </tbody>

                </table>
            </form>
        </div>
    </div>
</div>