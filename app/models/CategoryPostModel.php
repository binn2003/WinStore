<?php
class CategoryPostModel extends DB
{
    

    public function GetCategoryPost()
    {
        $sql = "SELECT * FROM categories_post";
        $arr = [];
        foreach ($this->conn->query($sql) as $row) {
            array_push($arr, $row);
        }
        return $arr;
    }

    public function GetCategoryPostById($id)
    {
        $sql = "SELECT * FROM categories_post WHERE id = $id";
        return $this->conn->query($sql);
    }
    
    public function GetCategoryPostStaff()
    {
        $sql = "SELECT dmbv.id,dmbv.name,nv.full_name FROM categories_post dmbv JOIN staffs nv ON dmbv.id_staff = nv.id;";
        $arr = [];
        foreach ($this->conn->query($sql) as $row) {
            array_push($arr, $row);
        }
        return $arr;
    }

    public function AddCategoryPost($name, $id_staff)
    {
        $sql = "INSERT INTO categories_post(`name`, `id_staff`) VALUES ('$name','$id_staff')";
        if ($this->conn->query($sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function DeleteCategoryPost($id)
    {
        $sql = "DELETE FROM categories_post WHERE id = $id";
        if ($this->conn->query($sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function UpdateCategoryPost($id, $name, $id_staff)
    {
        $sql = "UPDATE `categories_post` SET `name`='$name',`id_staff`='$id_staff' WHERE id = $id";
        if ($this->conn->query($sql)) {
            return true;
        } else {
            return false;
        }
    }

    
}