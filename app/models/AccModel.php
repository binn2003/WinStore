<?php
class AccModel extends DB
{
    public function findDataStaff($where, $data)
    {
        try {
            //code...
            $sql = "SELECT * FROM `staffs` WHERE $where = '$data'";
            $kq =  $this->conn->query($sql);
            return $kq;
        } catch (\Throwable $th) {
            throw $th;
            return false;
        }
    }

    public function findDataUser($where, $data)
    {
        try {
            //code...
            $sql = "SELECT * FROM `users` WHERE $where = '$data'";
            $kq =  $this->conn->query($sql);
            return $kq;
        } catch (\Throwable $th) {
            throw $th;
            return false;
        }
    }

    public function updateDataUser($what, $data, $uid)
    {
        $sql = "UPDATE `users` SET `$what`='$data' WHERE id = $uid";
        $kq =  $this->conn->query($sql);
        if ($kq) return true;
        return false;
    }
}
