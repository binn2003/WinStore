<?php
class ProductModel extends DB
{


    public function GetProduct()
    {
        $sql = "SELECT * FROM products";
        $arr = [];
        foreach ($this->conn->query($sql) as $row) {
            array_push($arr, $row);
        }
        return $arr;
    }

    public function GetProductById($id)
    {
        $sql = "SELECT * FROM products WHERE id = $id";
        return $this->conn->query($sql);
    }

    public function GetProductCategoryStaff()
    {
        $sql = "SELECT sp.*,dm.name as category_name,nv.full_name FROM products sp JOIN staffs nv ON sp.id_staff = nv.id JOIN categories dm ON sp.id_category = dm.id ORDER BY sp.name ASC";
        $arr = [];
        foreach ($this->conn->query($sql) as $row) {
            array_push($arr, $row);
        }
        return $arr;
    }

    public function GetProductByIdCategory($id)
    {
        $sql = "SELECT sp.*,dm.name as name_dm FROM products sp JOIN categories dm ON sp.id_category = dm.id WHERE id_category=$id";
        $arr = [];
        foreach ($this->conn->query($sql) as $row) {
            array_push($arr, $row);
        }
        return $arr;
    }

    public function AddProduct($name, $price, $sale, $img, $date, $describe, $special, $view, $describe_short, $id_category, $id_staff)
    {
        $sql = "INSERT INTO `products`(`name`, `price`, `sale`, `img`, `date`, `describe`, `special`, `view`, `describe_short`, `id_category`, `id_staff`) VALUES ('$name','$price','$sale','$img','$date','$describe','$special','$view','$describe_short','$id_category','$id_staff')";
        if ($this->conn->query($sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function DeleteProduct($id)
    {
        $sql = "DELETE FROM products WHERE id = $id";
        if ($this->conn->query($sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function UpdateProduct($id, $name, $price, $sale, $img, $date, $describe, $special, $view, $describe_short, $id_category, $id_staff)
    {
        echo $sql = "UPDATE `products` SET `name`='$name',`price`='$price',`sale`='$sale',`img`='$img',`date`='$date',`describe`='$describe',`special`='$special',`view`='$view',`describe_short`='$describe_short',`id_category`='$id_category',`id_staff`='$id_staff' WHERE id = $id";
        if ($this->conn->query($sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function GetProductNew()
    {
        $sql = "SELECT * FROM products ORDER BY date DESC LIMIT 0, 5";
        $arr = [];
        foreach ($this->conn->query($sql) as $row) {
            array_push($arr, $row);
        }
        return $arr;
    }

    public function GetProductSpecial()
    {
        $sql = "SELECT * FROM products WHERE special = 1";
        $arr = [];
        foreach ($this->conn->query($sql) as $row) {
            array_push($arr, $row);
        }
        return $arr;
    }

    public function GetProductSale()
    {
        $sql = "SELECT * FROM products WHERE sale > 0  ORDER BY (price-sale)/price*100 desc LIMIT 0, 5";
        $arr = [];
        foreach ($this->conn->query($sql) as $row) {
            array_push($arr, $row);
        }
        return $arr;
    }

    public function GetProductTop10()
    {
        $sql = "SELECT * FROM products WHERE view > 0 ORDER BY view DESC LIMIT 0, 10";
        $arr = [];
        foreach ($this->conn->query($sql) as $row) {
            array_push($arr, $row);
        }
        return $arr;
    }

    public function SearchProduct($keyword)
    {
        $sql = "SELECT sp.*,dm.name as category_name,nv.full_name FROM products sp  JOIN staffs nv ON sp.id_staff = nv.id JOIN categories dm ON dm.id=sp.id_category WHERE sp.name LIKE '%$keyword%' OR dm.name LIKE '%$keyword%';";
        return $this->conn->query($sql);
    }


    public function ProductSelectPage($order, $limit)
    {
        if (!isset($_REQUEST['page'])) {
            $_SESSION['page'] = 1;
        }
        if (!isset($_SESSION['total_page'])) {
            $_SESSION['total_page'] = 1;
        }
        $_SESSION['total_pro'] = $this->conn->query("SELECT count(*) FROM products");
        if ($_SESSION['page']) {
            $_SESSION['page'] = $_REQUEST['page'];
        }
        $begin = ($_SESSION['page'] - 1) * $limit;
        $_SESSION['total_page'] = ceil($_SESSION['total_pro'] / $limit);
        $sql = "SELECT products.id, products.name, products.price, products.sale, products.img, products.date, products.describe_short, products.special, products.view, products.id_category, staffs.full_name FROM products, staffs WHERE products.id_staff = staffs.id ORDER BY $order DESC LIMIT $begin,$limit";
        return $this->conn->query($sql);
    }

    public function UpdateViewProduct($id)
    {
        $sql = "UPDATE products SET view = view + 1 WHERE id=$id";
        return $this->conn->query($sql);
    }
}
