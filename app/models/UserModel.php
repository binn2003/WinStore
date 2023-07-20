<?php
class UserModel extends DB
{


    public function GetUser()
    {
        $sql = "SELECT * FROM users";
        $arr = [];
        foreach ($this->conn->query($sql) as $row) {
            array_push($arr, $row);
        }
        return $arr;
    }

    public function GetUserById($id)
    {
        $sql = "SELECT * FROM users WHERE id = $id";
        return $this->conn->query($sql);
    }

    public function AddUser($username, $password, $full_name, $img, $email, $phone, $address, $activated)
    {
        echo $sql = "INSERT INTO `users`(`username`, `password`, `full_name`, `img`, `email`, `phone`, `address`, `activated`) 
        VALUES ('$username', '$password', '$full_name', '$img', '$email', '$phone', '$address', '$activated')";
        if ($this->conn->query($sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function DeleteUser($id)
    {
        $sql = "DELETE FROM users WHERE id = $id";
        if ($this->conn->query($sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function UpdateUser($id, $username, $password, $full_name, $img, $email, $phone, $address, $activated)
    {
        $sql = "UPDATE `users` SET `username`='$username',`password`='$password',`full_name`='$full_name',`img`='$img',`email`='$email',`phone`='$phone',`address`='$address',`activated`='$activated' WHERE id = $id";
        if ($this->conn->query($sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function ResetPassUser($password,$email)
    {
        $sql = "UPDATE `users` SET `password`='$password' WHERE `email`='$email'";
        if ($this->conn->query($sql)) {
            return true;
        } else {
            return false;
        }
    }
}
