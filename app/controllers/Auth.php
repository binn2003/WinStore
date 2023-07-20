<?php
class Auth extends Controller
{
    public $ProductModel;
    public $CategoriesModel;
    public $PostModel;
    public $CategoriesPostModel;
    public $accModel;
    public $title_site;
    public $UserModel;
    public $CommentModel;
    public $InvoiceModel;


    function __construct()
    {
        $this->ProductModel = $this->callModel('ProductModel');
        $this->CategoriesModel = $this->callModel('CategoryModel');
        $this->PostModel = $this->callModel('PostModel');
        $this->CategoriesPostModel = $this->callModel('CategoryPostModel');
        $this->accModel = $this->callModel('AccModel');
        $this->UserModel = $this->callModel('UserModel');
        $this->CommentModel = $this->callModel('CommentModel');
        $this->InvoiceModel = $this->callModel('InvoiceModel');
    }

    function Show()
    {
        $this->callView(
            'MasterUser',
            [
                'Page' => 'WinstorePage',
                'ProductNew' => $this->ProductModel->GetProductNew(),
                'ProductSpecial' => $this->ProductModel->GetProductSpecial(),
                'ProductSale' => $this->ProductModel->GetProductSale(),
                'ProductTop10' => $this->ProductModel->GetProductTop10(),
            ]
        );
    }

    function Intro()
    {
        $this->callView(
            'MasterUser',
            [
                'Page' => 'IntroPage',
            ]
        );
    }

    function Contact()
    {
        $this->callView(
            'MasterUser',
            [
                'Page' => 'ContactPage',
            ]
        );
    }

    function Products()
    {
        $this->callView(
            'MasterUser',
            [
                'Page' => 'ProductPage',
                'ListProduct' => $this->ProductModel->GetProduct(),
                'ListCategory' => $this->CategoriesModel->GetCategory(),
                'ProductTop10' => $this->ProductModel->GetProductTop10(),
                'ProductSpecial' => $this->ProductModel->GetProductSpecial(),
            ]
        );
    }

    function News()
    {
        $this->callView(
            'MasterUser',
            [
                'Page' => 'NewsPage',
                'ListPost' => $this->PostModel->GetPostStatus(),
                'ListCategoryPost' => $this->CategoriesPostModel->GetCategoryPost(),
            ]
        );
    }

    public function Search()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $kyw = $_POST['kyw'];
            if ($kyw == '') {
                $this->title_site = "Tất cả sản phẩm";
                $this->callView(
                    'MasterUser',
                    [
                        'Page' => 'ProductPage',
                        'ListProduct' => $this->ProductModel->GetProduct(),
                        'ListCategory' => $this->CategoriesModel->GetCategory(),
                        'ProductTop10' => $this->ProductModel->GetProductTop10(),
                        'ProductSpecial' => $this->ProductModel->GetProductSpecial(),
                    ]
                );
            } else {
                $this->title_site = "Các sản phẩm có chứa từ khóa :'$kyw'";
                $this->callView(
                    'MasterUser',
                    [
                        'Page' => 'ProductPage',
                        'ListProduct' => $this->ProductModel->SearchProduct($kyw),
                        'ListCategory' => $this->CategoriesModel->GetCategory(),
                        'ProductTop10' => $this->ProductModel->GetProductTop10(),
                        'ProductSpecial' => $this->ProductModel->GetProductSpecial(),
                    ]
                );
            }
        } else {
            $this->title_site = "Tất cả sản phẩm";
            $this->callView(
                'MasterUser',
                [
                    'Page' => 'ProductPage',
                    'ListProduct' => $this->ProductModel->GetProduct(),
                    'ListCategory' => $this->CategoriesModel->GetCategory(),
                    'ProductTop10' => $this->ProductModel->GetProductTop10(),
                    'ProductSpecial' => $this->ProductModel->GetProductSpecial(),
                ]
            );
        }
    }

    public function DetailCategory($id)
    {
        $res = $this->ProductModel->GetProductByIdCategory($id);
        $name = $res[0]['name_dm'];
        $this->title_site = "Các sản phẩm thuộc danh mục : '$name'";
        $this->callView(
            'MasterUser',
            [
                'Page' => 'ProductPage',
                'ListProduct' => $res,
                'ListCategory' => $this->CategoriesModel->GetCategory(),
                'ProductTop10' => $this->ProductModel->GetProductTop10(),
                'ProductSpecial' => $this->ProductModel->GetProductSpecial(),
            ]
        );
    }

    public function DetailCategoryPost($id)
    {
        $this->callView(
            'MasterUser',
            [
                'Page' => 'NewsPage',
                'ListPost' => $this->PostModel->GetPostByIdCategory($id),
                'ListCategoryPost' => $this->CategoriesPostModel->GetCategoryPost(),
            ]
        );
    }

    public function DetailProduct($id)
    {
        $this->ProductModel->UpdateViewProduct($id);
        $res = $this->ProductModel->GetProductById($id);
        $this->callView(
            'MasterUser',
            [
                'Page' => 'DetailProductPage',
                'GetProductId' => mysqli_fetch_assoc($res),
                'ListCommentByProduct' => $this->CommentModel->CommentSelectByProduct($id, 5),
                'GetProductIdCategory' => $this->ProductModel->GetProductByIdCategory($id),
            ]
        );
    }

    public function DetailNews($id)
    {
        $this->PostModel->UpdateViewPost($id);
        $res = $this->PostModel->GetPostStaffById($id);
        $this->callView(
            'MasterUser',
            [
                'Page' => 'DetailNewsPage',
                'GetPostId' => mysqli_fetch_assoc($res),
                'GetPostIdCategory' => $this->PostModel->GetPostByIdCategory($id),
                'GetPostId1' => $this->PostModel->GetPostByIdCategory(1),
                'GetPostId3' => $this->PostModel->GetPostByIdCategory(3),
            ]
        );
    }

    public function Login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (empty($_SESSION['user'])) {
                $array_data = ['username', 'password'];
                $error = $this->LoopCheckError($array_data, $_POST);
                if (empty($error)) {
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $res = $this->accModel->findDataUser('username', $username, "*");
                    $res = !empty($res) ? $res->fetch_assoc() : '';
                    if (!empty($res['password'])) {
                        $check_pass = password_verify($password, $res['password']);
                        if (!empty($check_pass)) {
                            $dataNew = [
                                'id' => $res['id'],
                                'username' => $res['username'],
                                'activated' => $res['activated'],
                                'name' => $res['full_name'],
                                'avatar' => $res['img'],
                                'email' => $res['email'],
                                'address' => $res['address'],
                                'phone' => $res['phone'],
                            ];
                            if ($_POST['ghi_nho']) {
                                setcookie("user", $res['username'], time() + (86400 * 7));
                                setcookie("pass", $password, time() + (86400 * 7));
                            }
                            $_SESSION['user'] = $dataNew;
                            if ($dataNew['activated'] == 1) {
                                header('location: ../Auth');
                            } else {
                                echo "<script>alert('Tài khoản của bạn chưa được kích hoạt')</script>";
                                unset($_SESSION['user']);
                                echo "<script>window.location='./Login';</script>";
                            }
                            return;
                        } else {
                            $error['username'] = 'Sai tài khoản hoặc mật khẩu';
                        }
                    } else {
                        $error = 'Sai tài khoản hoặc mật khẩu';
                    }
                }

                $this->callView('MasterUser', [
                    'Page' => 'LoginUserPage',
                    'status' => $error,
                ]);
            } else {
                $this->callView('MasterUser', [
                    'Page' => 'LoginUserPage',
                ]);
            }
        } else {
            $this->callView('MasterUser', [
                'Page' => 'LoginUserPage',
            ]);
        }
    }

    public function Register()
    {
        if (empty($_SESSION['user'])) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $password1 = password_hash($password, PASSWORD_DEFAULT);
                $full_name = $_POST['full_name'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $address = $_POST['address'];
                $activated = $_POST['activated'];
                $img = $_FILES['img']['name'];

                $res = $this->UserModel->AddUser($username, $password1, $full_name, $img, $email, $phone, $address, $activated);
                move_uploaded_file($_FILES['img']['tmp_name'], './public/images/uploads/users/' . $img);
                if ($res) {
                    header('location: ./Login');
                }
            } else {
                $this->callView('MasterUser', [
                    'Page' => 'RegisterUserPage',
                ]);
            }
        } else {
            $this->callView('MasterUser', [
                'Page' => 'WinstorePage',
            ]);
        }
    }

    public function ChangePassword()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (empty($_SESSION['user'])) return;
            $user = $_SESSION['user']['id'];
            if (empty($error)) {
                $res =  $this->accModel->findDataUser('id', $user);
                $res = mysqli_fetch_assoc($res);
                if (!empty($res)) {
                    if (password_verify($_POST['pass_old'], $res['password'])) {
                        $newPass = password_hash($_POST['pass_new'], PASSWORD_DEFAULT);
                        $response =  $this->accModel->updateDataUser('password', $newPass, $user);
                        if ($response) {
                            $this->callView('MasterUser', [
                                'Page' => 'ChangePasswordPage',
                                'status' => 'Đổi mật khẩu thành công'
                            ]);
                            return;
                        } else {
                            $error = "Server not response";
                        }
                    } else {
                        $error = "Mật khẩu cũ không đúng";
                    }
                } else {
                    $error = "Invalid user ID";
                }
            }
            $this->callView('MasterUser', [
                'Page' => 'ChangePasswordPage',
                'status' => $error,
            ]);
        } else {
            $this->callView('MasterUser', [
                'Page' => 'ChangePasswordPage',
            ]);
        }
    }

    public function ShowUpdateProfile()
    {
        if (isset($_SESSION['user'])) {
            $res = $this->UserModel->GetUserById($_SESSION['user']['id']);
            $this->callView(
                'MasterUser',
                [
                    'Page' => 'UpdateProfilePage',
                    'GetUserId' => mysqli_fetch_assoc($res),
                ]
            );
        } else {
            header('location: ./Login');
        }
    }

    public function UpdateProfile()
    {
        if (isset($_SESSION['user'])) {
            $id = $_POST['idUser'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $full_name = $_POST['full_name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $activated = $_POST['activated'];
            $img = $_POST['img'];
            $up_img = $_FILES['up_img']['name'];

            if (empty($_FILES['up_img']['size'])) {
                $res = $this->UserModel->UpdateUser($id, $username, $password, $full_name, $img, $email, $phone, $address, $activated);
            } else {
                $res = $this->UserModel->UpdateUser($id, $username, $password, $full_name, $up_img, $email, $phone, $address, $activated);
            }
            move_uploaded_file($_FILES['up_img']['tmp_name'], './public/images/uploads/users/' . $up_img);
            if ($res) {
                header('location: ./ShowUpdateProfile');
            }
        } else {
            header('location: ./Login');
        }
    }



    public function AddComment()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $content = $_POST['content'];
            $date_comment = date_format(date_create(), 'Y/m/d H:i:s');
            $id_product = $_POST['id_product'];
            $star = $_POST['star'];
            $id_user = $_SESSION['user']['id'];
            $res = $this->CommentModel->AddComment($content, $id_product, $id_user, $date_comment, $star);
            if ($res) {
                header('location: ./DetailProduct/' . $id_product . '');
            }
        } else {
            $this->callView('MasterUser', ['Page' => 'Winstore']);
        }
    }

    public function ForgotPassword()
    {
        require_once './app/lib/mail/index.php';
        $mail = new Mailer();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $res =  $this->accModel->findDataUser('email', $email);
            $res = mysqli_fetch_assoc($res);
            if (!empty($res)) {
                if ($email == $res['email']) {
                    $code = substr(rand(0, 999999), 0, 6);
                    $title = "Khôi phục mật khẩu";
                    $content = "Mã xác nhận của bạn là <span style='color: red'>" . $code . "</span>";
                    $mail->sendMail($title, $content, $email);

                    $_SESSION['mail'] = $email;
                    $_SESSION['code'] = $code;
                    header('location: ./CheckCode');
                } else {
                    $error = "Email không đúng";
                }
            } else {
                $this->callView('MasterUser', [
                    'Page' => 'ForgotPasswordPage',
                    'status' => 'Không tìm thấy email!!',
                ]);
            }
        } else {
            $this->callView('MasterUser', ['Page' => 'ForgotPasswordPage',]);
        }
    }

    public function CheckCode()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($_SESSION['code']) {
                if ($_POST['code'] != $_SESSION['code']) {
                    $error = 'Mã xác nhận không đúng!!';
                    $this->callView('MasterUser', [
                        'Page' => 'CheckCodePage',
                        'status' => $error,
                    ]);
                } else {
                    header('location: ./ResetPassword');
                }
            } else {
                header('location: ./Login');
            }
        } else {
            $this->callView('MasterUser', ['Page' => 'CheckCodePage',]);
        }
    }

    public function ResetPassword()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($_SESSION['mail']) {
                $password2 = $_POST['pass_new2'];
                $password = password_hash($password2, PASSWORD_DEFAULT);
                $res = $this->UserModel->ResetPassUser($password, $_SESSION['mail']);
                unset($_SESSION['mail']);
                unset($_SESSION['code']);
                if ($res) {
                    $this->callView('MasterUser', [
                        'Page' => 'ResetPasswordPage',
                        'status' => 'Đổi mật khẩu thành công',
                    ]);
                }
            } else {
                header('location: ./Login');
            }
        } else {
            $this->callView('MasterUser', ['Page' => 'ResetPasswordPage',]);
        }
    }

    public function AddCart($id)
    {
        if (isset($id) && $id > 0) {
            $res = $this->ProductModel->GetProductById($id);
            $items = mysqli_fetch_assoc($res);
            $total = 0;
            $slProduct = empty($_POST['quantity']) ? 1 : $_POST['quantity'];
            if (isset($_SESSION['cart'])) {

                if (isset($_SESSION['cart'][$id]['sl'])) {
                    $_SESSION['cart'][$id]['sl'] += $slProduct;
                } else {
                    $_SESSION['cart'][$id]['sl'] = $slProduct;
                }
                $_SESSION['cart'][$id]['id'] = $items['id'];
                $_SESSION['cart'][$id]['name'] = $items['name'];
                $_SESSION['cart'][$id]['img'] = $items['img'];
                $_SESSION['cart'][$id]['price'] = $items['price'];
                $_SESSION['cart'][$id]['sale'] = $items['sale'];

                foreach ($_SESSION['cart'] as $key => $value) {
                    $total += $_SESSION['cart'][$key]['sl'];
                }
            } else {
                $_SESSION['cart'][$id]['sl'] = $slProduct;
                $_SESSION['cart'][$id]['id'] = $items['id'];
                $_SESSION['cart'][$id]['name'] = $items['name'];
                $_SESSION['cart'][$id]['img'] = $items['img'];
                $_SESSION['cart'][$id]['price'] = $items['price'];
                $_SESSION['cart'][$id]['sale'] = $items['sale'];
                foreach ($_SESSION['cart'] as $key => $value) {
                    $total += $_SESSION['cart'][$key]['sl'];
                }
            }
            $_SESSION['total_cart'] = $total;
            if (isset($_SESSION['cart'])) {
                $this->callView('MasterUser', [
                    'Page' => 'ListCartPage',
                ]);
            }
        }
    }

    public function ListCart()
    {
        if (isset($_SESSION['cart'])) {
            $this->callView('MasterUser', [
                'Page' => 'ListCartPage',
            ]);
        } else {
            $this->callView('MasterUser', [
                'Page' => 'ListCartPage',
            ]);
        }
    }

    public function DeleteCart($id)
    {
        $_SESSION['total_cart'] -=   $_SESSION['cart'][$id]['sl'];
        unset($_SESSION['cart'][$id]);
        if (isset($_SESSION['cart'])) {
            $this->callView('MasterUser', [
                'Page' => 'ListCartPage',
            ]);
        }
    }

    public function DeleteAllCart()
    {
        unset($_SESSION['cart']);
        unset($_SESSION['total_cart']);
        $this->callView('MasterUser', [
            'Page' => 'ListCartPage',
        ]);
    }

    public function Pay()
    {
        if (isset($_SESSION['user'])) {
            $this->callView('MasterUser', [
                'Page' => 'PayPage',
            ]);
        } else {
            header('location: ./Login');
        }
    }

    public function Invoice()
    {
        if (isset($_SESSION['user'])) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $name_user = $_POST['name_user'];
                $id_user = $_POST['idUser'];
                $email_user = $_POST['email_user'];
                $phone_user = $_POST['phone_user'];
                $address_user = $_POST['address_user'];
                $payment = $_POST['payment'];
                $total = $_POST['totalAll'];
                $code_bill = "WS" . rand(0, 999999);
                $date_buy = date_format(date_create(), 'Y/m/d H:i:s');
                //tạo đơn hàng
                //trả về 1 id đơn hàng
                $id_bill = $this->InvoiceModel->BillInsert($total, $payment, $date_buy, 1, $id_user, $name_user, $address_user, $email_user, $phone_user, $code_bill);
                $_SESSION['id_bill'] = $id_bill;
                if (isset($_SESSION['cart']) && (count($_SESSION['cart']) > 0)) {
                    foreach ($_SESSION['cart'] as $item) {
                        extract($item);
                        if ($item['sale'] == 0) {
                            $this->InvoiceModel->BillDetailInsert($id_bill, $item['id'], $item['sl'], $item['name'], $item['price'], $item['img']);
                        } else {
                            $this->InvoiceModel->BillDetailInsert($id_bill, $item['id'], $item['sl'], $item['name'], $item['sale'], $item['img']);
                        }
                    }
                    $this->callView('MasterUser', [
                        'Page' => 'OderSuccessPage',
                    ]);
                    unset($_SESSION['cart']);
                    unset($_SESSION['total_cart']);
                    unset($_SESSION['id_bill']);
                }
            } else {
                $this->callView('MasterUser', ['Page' => 'PayPage',]);
            }
        } else {
            header('location: ./Login');
        }
    }

    public function ListBill()
    {
        if (isset($_SESSION['user'])) {
            $this->callView(
                'MasterUser',
                [
                    'Page' => 'ListBillPage',
                    'BillByIdUser' => $this->InvoiceModel->BillByIdUser($_SESSION['user']['id']),
                ]
            );
        } else {
            header('location: ./Login');
        }
    }

    public function DetailBill($id)
    {
        if (isset($_SESSION['user'])) {
            $this->callView(
                'MasterUser',
                [
                    'Page' => 'DetailBillUserPage',
                    'DetailBill' => $this->InvoiceModel->BillDetailById($id),
                    'BillId' => $this->InvoiceModel->BillById($id),
                ]
            );
        } else {
            header('location: ./');
        }
    }
}
