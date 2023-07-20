<?php
class StaffModel extends DB
{


    public function GetStaff()
    {
        $sql = "SELECT * FROM staffs";
        $arr = [];
        foreach ($this->conn->query($sql) as $row) {
            array_push($arr, $row);
        }
        return $arr;
    }

    public function GetStaffById($id)
    {
        $sql = "SELECT * FROM staffs WHERE id = $id";
        return $this->conn->query($sql);
    }

    public function AddStaff($username, $password, $full_name, $img, $email, $phone, $address, $cmnd, $role)
    {
        $sql = "INSERT INTO `staffs`(`username`, `password`, `full_name`, `img`, `email`, `phone`, `address`, `cmnd`, `role`) 
        VALUES ('$username', '$password', '$full_name', '$img', '$email', '$phone', '$address', '$cmnd',  '$role')";
        if ($this->conn->query($sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function DeleteStaff($id)
    {
        $sql = "DELETE FROM staffs WHERE id = $id";
        if ($this->conn->query($sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function UpdateStaff($id, $username, $password, $full_name, $img, $email, $phone, $address, $cmnd, $role)
    {
        $sql = "UPDATE `staffs` SET `username`='$username',`password`='$password',`full_name`='$full_name',`img`='$img',`email`='$email',`phone`='$phone',`address`='$address',`cmnd`='$cmnd',`role`='$role' WHERE id = $id";
        if ($this->conn->query($sql)) {
            return true;
        } else {
            return false;
        }
    }
}
