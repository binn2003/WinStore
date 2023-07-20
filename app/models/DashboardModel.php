<?php
class DashboardModel extends DB
{
    public function GetDashboards()
    {
        $sql = "SELECT (SELECT COUNT(categories.id) FROM categories) as categories,(SELECT COUNT(products.id) FROM products) AS products,(SELECT COUNT(staffs.id) FROM staffs) AS staffs,(SELECT COUNT(users.id) FROM users) AS users,(SELECT COUNT(categories_post.id) FROM categories_post) AS categories_post,(SELECT COUNT(posts.id) FROM posts) AS posts,(SELECT COUNT(comments.id) FROM comments) AS comments,(SELECT COUNT(bills.id) FROM bills) AS bills,(SELECT COUNT(bill_detail.id) FROM bill_detail) AS bill_detail";
        $arr = [];
        foreach ($this->conn->query($sql) as $row) {
            array_push($arr, $row);
        }
        return $arr;
    }

    public function ProductStatistical()
    {
        $sql = "SELECT dm.id as id, dm.name as name,COUNT(*) as so_luong,MIN(sp.price) as price_min,MAX(sp.price) as price_max,AVG(sp.price) as price_avg FROM products sp JOIN categories dm ON dm.id=sp.id_category GROUP BY dm.id, dm.name";
        $arr = [];
        foreach ($this->conn->query($sql) as $row) {
            array_push($arr, $row);
        }
        return $arr;
    }

    public function PostStatistical()
    {
        $sql = "SELECT dmbv.id, dmbv.name, COUNT(*) so_luong, MIN(bv.post_date) cu_nhat, MAX(bv.post_date) moi_nhat FROM posts bv JOIN categories_post dmbv ON dmbv.id = bv.id_category_post GROUP BY dmbv.id, dmbv.name";
        $arr = [];
        foreach ($this->conn->query($sql) as $row) {
            array_push($arr, $row);
        }
        return $arr;
    }
}
