<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Winstore - Admin</title>
    <base href="http://localhost/ass-php2/" target="_parent">

    <link rel="icon" href="public/images/winstore-favicon.png" type="image/gif" sizes="16x16">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <!-- Custom -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="app/lib/ckeditor/ckeditor.js"></script>
    <link rel="stylesheet" href="public/css/dashboard.css" type="text/css">
</head>

<body>
    <div class="wrapper">
        <!-- -===========================Menu ===================-->
        <nav id="sidebar">
            <div class="sidebar-header" style="text-align: center;">
                <a href="">
                    <img src="public/images/winstore-white.png" alt="logo" class="img-fluid logo">
                </a>
            </div>
            <ul class="list-unstyled components text-secondary">
                <li>
                    <a href="./Auth" target="_blank"><i class="fa fa-store"></i> Xem trang
                        web</a>
                </li>
                <li>
                    <a href="Dashboard"><i class="fa fa-home"></i> Trang chủ</a>
                </li>
                <!-- Danh mục -->
                <li>
                    <a href="#categories" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle no-caret-down"><i class="fa fa-list-alt"></i> Danh mục
                        <i class="fa fa-angle-right float-xl-right"></i>
                    </a>
                    <ul class="collapse list-unstyled" id="categories">
                        <li>
                            <a href="Category/AddCategory">
                                <i class="fa fa-plus"></i> Thêm Danh Mục</a>
                        </li>
                        <li>
                            <a href="Category">
                                <i class="fa fa-list-ul"></i> Danh sách danh mục</a>
                        </li>
                    </ul>
                </li>
                <!-- Sản phẩm -->
                <li>
                    <a href="#products" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle no-caret-down"><i class="fa fa-table"></i> Sản phẩm
                        <i class="fa fa-angle-right float-xl-right"></i>
                    </a>
                    <ul class="collapse list-unstyled" id="products">
                        <li>
                            <a href="Product/AddProduct"><i class="fa fa-plus"></i> Thêm sản phẩm</a>
                        </li>
                        <li>
                            <a href="Product">
                                <i class="fa fa-list-ul"></i> Danh sách sản phẩm</a>
                        </li>
                    </ul>
                </li>
                <!-- Danh mục bài viết -->
                <li>
                    <a href="#danhmucbv" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle no-caret-down"><i class="fa fa-list-alt"></i> Danh mục bài viết
                        <i class="fa fa-angle-right float-xl-right"></i>
                    </a>
                    <ul class="collapse list-unstyled" id="danhmucbv">
                        <li>
                            <a href="CategoryPost/AddCategoryPost">
                                <i class="fa fa-plus"></i> Thêm Danh Mục</a>
                        </li>
                        <li>
                            <a href="CategoryPost">
                                <i class="fa fa-list-ul"></i> Danh sách danh mục</a>
                        </li>
                    </ul>
                </li>
                <!-- Bài viết -->
                <li>
                    <a href="#baiviet" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle no-caret-down"><i class="fa fa-newspaper"></i> Bài viết
                        <i class="fa fa-angle-right float-xl-right"></i>
                    </a>
                    <ul class="collapse list-unstyled" id="baiviet">
                        <li>
                            <a href="Post/AddPost"><i class="fa fa-plus"></i> Thêm bài viết</a>
                        </li>
                        <li>
                            <a href="Post">
                                <i class="fa fa-list-ul"></i> Danh sách bài viết</a>
                        </li>
                    </ul>
                </li>
                <!-- Khách hàng -->
                <li>
                    <a href="#accounts" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle no-caret-down">
                        <i class='fa fa-user-friends'></i> Khách hàng
                        <i class="fa fa-angle-right float-xl-right"></i>
                    </a>
                    <ul class="collapse list-unstyled" id="accounts">
                        <li>
                            <a href="User/AddUser"><i class="fa fa-plus"></i> Thêm khách hàng</a>
                        </li>
                        <li>
                            <a href="User">
                                <i class="fa fa-list-ul"></i> Danh sách khách hàng</a>
                        </li>
                    </ul>
                </li>
                <!-- Nhân viên -->

                <?php
                if (isset($_SESSION['admin']) && $_SESSION['admin']['role'] != "0") { ?>
                    <script>
                        // alert('Bạn không phải là admin!!!');
                    </script>
                <?php } else { ?>
                    <li>
                        <a href="#nhanvien" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle no-caret-down">
                            <i class='fa fa-user-tie'></i> Nhân viên
                            <i class="fa fa-angle-right float-xl-right"></i>
                        </a>
                        <ul class="collapse list-unstyled" id="nhanvien">
                            <li>
                                <a href="Staff/AddStaff"><i class="fa fa-plus"></i> Thêm nhân viên</a>
                            </li>
                            <li>
                                <a href="Staff">
                                    <i class="fa fa-list-ul"></i> Danh sách nhân viên</a>
                            </li>
                        </ul>
                    </li>
                <?php }  ?>
                <li>
                    <a href="Comment"> <i class="fa fa-comments"></i> Bình luận</a>
                </li>
                <li>
                    <a href="Bill"><i class='fas fa-shipping-fast'></i>Đơn hàng</a>
                </li>
                <!-- <li>
                    <a href="<?= $ADMIN_URL ?>/thong-ke/"><i class="fa fa-chart-line"></i> Thống kê</a>
                </li> -->

                <!-- 
                <li>
                    <a href="#"><i class="fas fa-cog"></i>Cài đặt</a>
                </li> -->
            </ul>
        </nav>
        <div id="body" class="active">
            <!-- navbar navigation component -->
            <nav class="navbar navbar-expand-lg navbar-white bg-white">
                <button type="button" id="sidebarCollapse" class="btn btn-light">
                    <i class="fa fa-bars"></i><span></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent" style="margin-right: 20px;">
                    <ul class="nav navbar-nav ml-auto">

                        <a class="mt-3">Xin chào,&nbsp; </a><a class="text-danger mt-3"><?= $_SESSION['admin']['name'] ?></a>
                        <li class="nav-item dropdown">
                            <div class="nav-dropdown">
                                <a href="#" id="nav2" class="nav-item nav-link dropdown-toggle text-secondary" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-user primary-color"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end nav-link-menu">
                                    <ul class="nav-list">
                                        <li><a href="./LogoutAdmin" class="dropdown-item">&nbsp;<i class="fas fa-sign-out-alt"></i>
                                                Đăng xuất</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- end of navbar navigation -->
            <div class="content">
                <?php require_once "./app/views/pages/" . $data['Page'] . ".php" ?>
            </div>
        </div>
    </div>



    <!-- Js -->

    <script src="public/js/jquery.validate.js"></script>
    <script src="public/js/main.js"></script>
    <script src="public/js/validation.js"></script>



    <script>
        // =============Check delete=================//
        function checkDelete() {
            var x = confirm("Bạn chắc muốn xóa chứ?")
            if (x) {
                return true;
            } else {
                return false;
            }
        }
        // =============Auto resize textarea=================//

        // function expandTextarea(id) {
        //     document.getElementById(id).addEventListener('keyup', function() {
        //         this.style.overflow = 'hidden';
        //         this.style.minHeight = '106.8px';
        //         this.style.height = 0;
        //         this.style.height = this.scrollHeight + 'px';
        //     }, false);
        // }
        // expandTextarea('txtarea');
    </script>


    <!-- Toast message -->
    <script>
        $(document).ready(function() {
            $('.toast').toast('show');
        });
    </script>

    <!--  chọn và bỏ chọn các loại trên trang list.php. -->
    <script>
        $(document).ready(function() {
            var checkboxItem = ":checkbox";
            $("#select-all").click(function() {
                if (this.checked) {
                    $(checkboxItem).each(function() {
                        this.checked = true;
                    });
                } else {
                    $(checkboxItem).each(function() {
                        this.checked = false;
                    });
                }
            });

            $("#deleteAll").click(function() {
                if ($(":checked").length === 0) {
                    alert("Vui lòng chọn ít nhất một mục!");
                    return false;
                }
            })
        });
    </script>
</body>

</html>