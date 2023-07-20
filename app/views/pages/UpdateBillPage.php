<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header text-center bg-dark text-white text-uppercase">Cập nhật trạng thái đơn hàng</div>
            <div class="card-body">
                <form action="./Bill/UpdateBill" method="POST" enctype="multipart/form-data" id="">
                    <div class="form-group col-sm-4">
                        <label for="status" class="form-label">Trạng thái</label>
                        <select name="status" class="form-control" id="status">
                            <option value="1" <?php if ($data['BillId'][0]['status'] == 1) {
                                                    echo 'selected';
                                                } ?>>Chờ xác nhận</option>
                            <option value="2" <?php if ($data['BillId'][0]['status'] == 2) {
                                                    echo 'selected';
                                                } ?>>Đang giao hàng</option>
                            <option value="3" <?php if ($data['BillId'][0]['status'] == 3) {
                                                    echo 'selected';
                                                } ?>>Đã giao</option>
                            <option value="4" <?php if ($data['BillId'][0]['status'] == 4) {
                                                    echo 'selected';
                                                } ?>>Hủy</option>'

                        </select>
                    </div>
            </div>
        </div>

        <div class="mb-3 text-center">
            <input type="hidden" name="id" value="<?= $data['BillId'][0]['id'] ?>">
            <input type="reset" value="Nhập lại" class="btn btn-danger mr-3">
            <input type="submit" name="btn_update" value="Cập nhật" class="btn btn-primary mr-3">
            <a href="./Bill"><input type="button" class="btn btn-success" value="Danh sách"></a>
        </div>

        </form>
    </div>
</div>
</div>
</div>