<?php
class CategoryModel extends DB
{


    public function GetCategory()
    {
        $sql = "SELECT * FROM categories";
        $arr = [];
        foreach ($this->conn->query($sql) as $row) {
            array_push($arr, $row);
        }
        return $arr;
    }

    public function GetCategoryById($id)
    {
        $sql = "SELECT * FROM categories WHERE id = $id";
        return $this->conn->query($sql);
    }

    public function GetCategoryStaff()
    {
        $sql = "SELECT dm.id,dm.name,nv.full_name FROM categories dm JOIN staffs nv ON dm.id_staff = nv.id";
        $arr = [];
        foreach ($this->conn->query($sql) as $row) {
            array_push($arr, $row);
        }
        return $arr;
    }

    public function AddCategory($name, $id_staff)
    {
        $sql = "INSERT INTO categories(`name`, `id_staff`) VALUES ('$name','$id_staff')";
        if ($this->conn->query($sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function DeleteCategory($id)
    {
        $sql = "DELETE FROM categories WHERE id = $id";
        if ($this->conn->query($sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function UpdateCategory($id, $name, $id_staff)
    {
        $sql = "UPDATE `categories` SET `name`='$name',`id_staff`='$id_staff' WHERE id = $id";
        if ($this->conn->query($sql)) {
            return true;
        } else {
            return false;
        }
    }
}
