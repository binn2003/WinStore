<?php
class PostModel extends DB
{


    public function GetPost()
    {
        $sql = "SELECT * FROM posts";
        $arr = [];
        foreach ($this->conn->query($sql) as $row) {
            array_push($arr, $row);
        }
        return $arr;
    }

    public function GetPostStatus()
    {
        $sql = "SELECT * FROM posts WHERE status = 0 ORDER BY post_date DESC";
        $arr = [];
        foreach ($this->conn->query($sql) as $row) {
            array_push($arr, $row);
        }
        return $arr;
    }

    public function GetPostById($id)
    {
        $sql = "SELECT * FROM posts WHERE id = $id";
        return $this->conn->query($sql);
    }

    public function GetPostStaffById($id)
    {
        $sql = "SELECT posts.*,staffs.full_name FROM posts JOIN staffs ON posts.id_staff = staffs.id WHERE posts.id = $id";
        return $this->conn->query($sql);
    }

    public function GetPostByIdCategory($id)
    {
        $sql = "SELECT * FROM posts WHERE id_category_post = $id AND status = 0";
        return $this->conn->query($sql);
    }

    public function GetPostByIdCategoryCount($id)
    {
        $sql = "SELECT COUNT(*) as count FROM posts WHERE id_category_post=$id";
        return $this->conn->query($sql);
    }

    public function GetPostCategoryStaff()
    {
        $sql = "SELECT p.*,dmbv.name as category_post_name,nv.full_name FROM posts p JOIN staffs nv ON p.id_staff = nv.id JOIN categories_post dmbv ON p.id_category_post = dmbv.id";
        $arr = [];
        foreach ($this->conn->query($sql) as $row) {
            array_push($arr, $row);
        }
        return $arr;
    }

    public function AddPost($title, $describe_short, $content, $img, $status, $view, $post_date, $id_category_post, $id_staff)
    {
        $sql = "INSERT INTO `posts`(`title`, `describe_short`, `content`, `img`, `status`, `view`, `post_date`, `id_category_post`, `id_staff`) 
        VALUES ('$title', '$describe_short', '$content', '$img', '$status', '$view', '$post_date', '$id_category_post', '$id_staff')";
        if ($this->conn->query($sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function DeletePost($id)
    {
        $sql = "DELETE FROM posts WHERE id = $id";
        if ($this->conn->query($sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function UpdatePost($id, $title, $describe_short, $content, $img, $status, $view, $post_date, $id_category_post, $id_staff)
    {
        $sql = "UPDATE `posts` SET `title`='$title',`describe_short`='$describe_short',`content`='$content',`img`='$img',`status`='$status',`view`='$view',`post_date`='$post_date',`id_category_post`='$id_category_post',`id_staff`='$id_staff' WHERE id = $id";
        if ($this->conn->query($sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function UpdateViewPost($id)
    {
        $sql = "UPDATE posts SET view = view + 1 WHERE id=$id";
        return $this->conn->query($sql);
    }
}
