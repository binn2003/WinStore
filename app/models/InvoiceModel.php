<?php
class InvoiceModel extends DB
{
    public function BillInsert($total, $payment, $date_buy, $status, $id_user, $name_user, $address_user, $email_user, $phone_user, $code_bill)
    {
        $sql = "INSERT INTO `bills`(`total`, `payment`, `date_buy`, `status`, `id_user`, `name_user`, `address_user`, `email_user`, `phone_user`, `code_bill`) 
        VALUES ('$total','$payment','$date_buy','$status','$id_user','$name_user','$address_user','$email_user','$phone_user','$code_bill')";
        if (mysqli_query($this->conn, $sql)) {
            $last_id = mysqli_insert_id($this->conn);
            return $last_id;
        }
    }

    public function BillDetailInsert($id_bill, $id_product, $quantity, $name_product, $price_product, $img_product)
    {
        $sql = "INSERT INTO `bill_detail`(`id_bill`, `id_product`, `quantity`, `name_product`, `price_product`, `img_product`) 
        VALUES ('$id_bill','$id_product','$quantity','$name_product','$price_product','$img_product')";
        if ($this->conn->query($sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function BillDetailById($id)
    {
        $sql = "SELECT * FROM bill_detail WHERE id_bill = $id";
        $arr = [];
        foreach ($this->conn->query($sql) as $row) {
            array_push($arr, $row);
        }
        return $arr;
    }

    public function BillById($id)
    {
        $sql = "SELECT * FROM bills WHERE id = $id";
        $arr = [];
        foreach ($this->conn->query($sql) as $row) {
            array_push($arr, $row);
        }
        return $arr;
    }

    public function BillStatistical()
    {
        $sql = "SELECT sp.id, sp.name, COUNT(*) so_luong, MIN(bl.date_comment) cu_nhat, MAX(bl.date_comment) moi_nhat FROM comments bl JOIN products sp ON sp.id = bl.id_product GROUP BY sp.id, sp.name HAVING so_luong > 0;";
        $arr = [];
        foreach ($this->conn->query($sql) as $row) {
            array_push($arr, $row);
        }
        return $arr;
    }

    public function GetBill()
    {
        $sql = "SELECT * FROM bills";
        $arr = [];
        foreach ($this->conn->query($sql) as $row) {
            array_push($arr, $row);
        }
        return $arr;
    }

    public function UpdateBill($status, $id)
    {
        $sql = "UPDATE `bills` SET `status`='$status' WHERE id = $id";
        if ($this->conn->query($sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function BillByIdUser($id)
    {
        $sql = "SELECT * FROM bills WHERE id_user= '$id' ORDER BY date_buy DESC";
        $arr = [];
        foreach ($this->conn->query($sql) as $row) {
            array_push($arr, $row);
        }
        return $arr;
    }
}
