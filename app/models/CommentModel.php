<?php
class CommentModel extends DB
{

    public function GetComment()
    {
        $sql = "SELECT * FROM comments";
        $arr = [];
        foreach ($this->conn->query($sql) as $row) {
            array_push($arr, $row);
        }
        return $arr;
    }

    public function GetCommentById($id)
    {
        $sql = "SELECT * FROM comments WHERE id = $id";
        return $this->conn->query($sql);
    }

    public function AddComment($content, $id_product, $id_user, $date_comment, $star)
    {
        $sql = "INSERT INTO `comments`(`content`, `id_product`, `id_user`, `date_comment`, `star`) VALUES ('$content','$id_product','$id_user','$date_comment','$star')";
        if ($this->conn->query($sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function DeleteComment($id)
    {
        $sql = "DELETE FROM comments WHERE id = $id";
        if ($this->conn->query($sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function UpdateComment($id, $content, $id_product, $id_user, $date_comment, $star)
    {
        $sql = "UPDATE `comments` SET `content`='$content',`id_product`='$id_product',`id_user`='$id_user',`date_comment`='$date_comment',`star`='$star' WHERE id = $id";
        if ($this->conn->query($sql)) {
            return true;
        } else {
            return false;
        }
    }

    function CommentSelectByProduct($id_product, $limit = 10)
    {
        if (!isset($_REQUEST['page'])) {
            $_SESSION['page'] = 1;
        }
        if (!isset($_SESSION['total_page'])) {
            $_SESSION['total_page'] = 1;
        }
        $sql = "SELECT count(*) FROM comments bl JOIN products sp ON sp.id = bl.id_product WHERE bl.id_product = $id_product ORDER BY bl.id DESC";

        $_SESSION['total_bl'] = $this->conn->query($sql);
        // if (exist_param("page")) {
        //     $_SESSION['page'] = $_REQUEST['page'];
        // }
        $begin = ($_SESSION['page'] - 1) * $limit;
        // $_SESSION['total_page'] = ceil($_SESSION['total_bl'] / $limit);
        $sql = "SELECT bl.*, sp.name, kh.full_name, kh.img FROM comments bl JOIN products sp ON sp.id = bl.id_product JOIN users kh ON kh.id = bl.id_user WHERE bl.id_product = $id_product ORDER BY id DESC LIMIT $begin, $limit";
        $arr = [];
        foreach ($this->conn->query($sql) as $row) {
            array_push($arr, $row);
        }
        return $arr;
    }

    public function CommentStatistical()
    {
        $sql = "SELECT sp.id, sp.name, COUNT(*) so_luong, MIN(bl.date_comment) cu_nhat, MAX(bl.date_comment) moi_nhat FROM comments bl JOIN products sp ON sp.id = bl.id_product GROUP BY sp.id, sp.name HAVING so_luong > 0;";
        $arr = [];
        foreach ($this->conn->query($sql) as $row) {
            array_push($arr, $row);
        }
        return $arr;
    }
}
