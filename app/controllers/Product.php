<?php
class Product extends Controller
{
    public $Products;
    public $Categories;
    public $title_site;

    function __construct()
    {
        if (isset($_SESSION['admin'])) {
            if ($this->checkAdmin()) {
                header('location: ./Dashboard');
            }
        } else {
            header('location: ./LogoutAdmin');
        }
        $this->Products = $this->callModel('ProductModel');
        $this->Categories = $this->callModel('CategoryModel');
    }

    function Show()
    {
        $this->callView(
            'MasterAdmin',
            [
                'Page' => 'ListProductPage',
                'ListProduct' => $this->Products->GetProductCategoryStaff(),
                'ListCategory' => $this->Categories->GetCategory(),
                'title_site' => '',
            ]
        );
    }

    public function AddProduct()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['productName'];
            $price = $_POST['price'];
            $sale = $_POST['sale'];
            $date = $_POST['date'];
            $describe = $_POST['describe'];
            $special = $_POST['special'];
            $view = $_POST['view'];
            $describe_short = $_POST['describe_short'];
            $id_category = $_POST['id_category'];
            $id_staff = $_SESSION['admin']['id'];
            $img = $_FILES['img']['name'];

            $res = $this->Products->AddProduct($name, $price, $sale, $img, $date, $describe, $special, $view, $describe_short, $id_category, $id_staff);
            move_uploaded_file($_FILES['img']['tmp_name'], './public/images/uploads/products/' . $img);
            if ($res) {
                header('location: ../Product');
            }
        } else {
            $this->callView('MasterAdmin', [
                'Page' => 'AddProductPage',
                'ListProduct' => $this->Products->GetProduct(),
                'ListCategory' => $this->Categories->GetCategory(),
            ]);
        }
    }

    function ShowUpdate($id)
    {
        $res = $this->Products->GetProductById($id);
        $this->callView(
            'MasterAdmin',
            [
                'Page' => 'UpdateProductPage',
                'GetProductId' => mysqli_fetch_assoc($res),
                'ListCategory' => $this->Categories->GetCategory(),
            ]
        );
    }

    public function UpdateProduct()
    {
        $id = $_POST['idProduct'];
        $name = $_POST['productName'];
        $price = $_POST['price'];
        $sale = $_POST['sale'];
        $date = $_POST['date'];
        $describe = $_POST['describe'];
        $special = $_POST['special'];
        $view = $_POST['view'];
        $describe_short = $_POST['describe_short'];
        $id_category = $_POST['id_category'];
        $id_staff = $_POST['id_staff'];
        $img = $_POST['img'];
        $up_img = $_FILES['up_img']['name'];

        if (empty($_FILES['up_img']['size'])) {
            $res = $this->Products->UpdateProduct($id, $name, $price, $sale, $img, $date, $describe, $special, $view, $describe_short, $id_category, $id_staff);
        } else {
            $res = $this->Products->UpdateProduct($id, $name, $price, $sale, $up_img, $date, $describe, $special, $view, $describe_short, $id_category, $id_staff);
        }
        move_uploaded_file($_FILES['up_img']['tmp_name'], './public/images/uploads/products/' . $up_img);
        if ($res) {
            header('location: ../Product');
        }
    }

    public function DeleteProduct($id)
    {
        $res = $this->Products->DeleteProduct($id);
        if ($res) {
            header('location: ../Product');
        }
    }

    public function Search()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $kyw = $_POST['kyw'];
            if ($kyw == '') {
                $this->callView(
                    'MasterAdmin',
                    [
                        'Page' => 'ListProductPage',
                        'ListProduct' => $this->Products->GetProductCategoryStaff(),
                        'title_site' => "Tất cả sản phẩm",
                    ]
                );
            } else {
                $this->callView(
                    'MasterAdmin',
                    [
                        'Page' => 'ListProductPage',
                        'ListProduct' => $this->Products->SearchProduct($kyw),
                        'title_site' => "Các sản phẩm có chứa từ khóa :'$kyw'",
                    ]
                );
            }
        } else {
            $this->callView(
                'MasterAdmin',
                [
                    'Page' => 'ListProductPage',
                    'ListProduct' => $this->Products->GetProductCategoryStaff(),
                    'title_site' => "Tất cả sản phẩm",
                ]
            );
        }
    }
}
