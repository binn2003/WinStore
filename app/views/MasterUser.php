<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Win Store</title>
    <base href="http://localhost/ass-php2/" target="_parent">
    <link rel="icon" href="public/images/winstore-favicon.png" type="image/gif" sizes="16x16">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <!-- Slick slider -->
    <link rel="stylesheet" href="public/css/slick.css" type="text/css">
    <link rel="stylesheet" href="public/css/slick-theme.css" type="text/css">

    <!-- Custom -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="public/css/style.css" type="text/css">
    <link rel="stylesheet" href="public/css/mua-hang-thanh-cong.css" type="text/css">
</head>

<body>
    <!-- Header -->
        <header class="sticky-top">
            <nav class="navbar navbar-md navbar-expand-lg navbar-dark p-1">
                <div class="container">
                    <a class="navbar-brand" href="./Auth">
                        <img class="img-fluid logo" src="public/images/winstore-white.png" alt="logo">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-bars primary-color"></i>
                    </button>

                    <div class="collapse navbar-collapse justify-content-center" id="navbarsExampleDefault">
                        <ul class="navbar-nav mr-5 nav">
                            <?php
                            if (isset($_SESSION['name_page'])) {
                                $name_page = $_SESSION['name_page'];
                            }
                            ?>
                            <li class="nav-item <?= $name_page == 'trang_chu' ? 'active' : '' ?>">
                                <a class="nav-link text-gray" href="./Auth"><i class='fa fa-home'></i></a>
                            </li>
                            <li class="nav-item <?= $name_page == 'gioi_thieu' ? 'active' : '' ?>">
                                <a class="nav-link text-gray" href="./Auth/Intro">Giới thiệu</a>
                            </li>
                            <li class="nav-item <?= $name_page == 'lien_he' ? 'active' : '' ?>">
                                <a class="nav-link text-gray" href="./Auth/Contact">Liên Hệ</a>
                            </li>
                            <li class="nav-item <?= $name_page == 'san_pham' ? 'active' : '' ?>">
                                <a class="nav-link text-gray" href="./Auth/Products">Sản phẩm</a>
                            </li>
                            <li class="nav-item <?= $name_page == 'tin_tuc' ? 'active' : '' ?>">
                                <a class="nav-link text-gray" href="./Auth/News">Tin tức</a>
                            </li>
                        </ul>

                        <form action="./Auth/Search" method="POST" style="margin-right: 100px;margin-left: 50px;">
                            <div class="input-group">
                                <input type="text" class="form-control" name="kyw" placeholder="Nhập từ khóa..." style="background-color: #333f48; color: #fff;border:0;">
                                <div class="input-group-append">
                                    <button class="btn bg-dark" type="submit" name="timkiem"><i class="fa fa-search text-white"></i></button>
                                </div>
                            </div>
                        </form>
                        <!--Cart user -->
                        <div class="widgets-wrap float-md-right ml-4">
                            <!-- Cart -->
                            <div class="widget-header mt-1 mr-3">
                                <a href="./Auth/ListCart" class="icon icon-sm rounded-circle border"><i class="fa fa-shopping-cart text-light"></i></a>
                                <span class="badge badge-pill badge-danger notify">
                                    <?php
                                    if (isset($_SESSION['total_cart'])) {
                                        echo $_SESSION['total_cart'];
                                    } else {
                                        echo 0;
                                    }
                                    ?>
                                </span>
                            </div>
                            <!-- User -->
                            <div class="dropdown widget-header icontext">
                                <a href="#" class="icon icon-sm rounded-circle border" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?php
                                    if (isset($_SESSION['user']) && $_SESSION['user']['avatar'] != "") { ?>
                                        <img src="./public/images/uploads/users/<?= $_SESSION['user']['avatar'] ?>" width="50" height="50" class="mb-2 object-fit-cover" alt="">
                                    <?php } else { ?>
                                        <i class="fa fa-user text-light"></i>
                                    <?php }  ?>
                                </a>
                                <div class="text">

                                    <?php
                                    if (isset($_SESSION['user'])) { ?>
                                        <span class="text-light">Xin chào!</span>
                                        <div class="text-danger text-info"><?= $_SESSION['user']['name'] ?></div>
                                    <?php } else { ?>

                                        <!-- <a href="<?= $SITE_URL . '/tai-khoan/dang-nhap.php' ?>" class="d-block text-info">Đăng nhập</a> -->

                                    <?php }  ?>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                        <?php
                                        if (isset($_SESSION['user'])) { ?>

                                            <a class="dropdown-item pl-3 py-2" href="./Auth/ListBill">Đơn hàng</a>

                                            <a class="dropdown-item pl-3 py-2" href="./Auth/ShowUpdateProfile">Cập nhật tài khoản</a>
                                            <a class="dropdown-item pl-3 py-2" href="./Auth/ChangePassword">Đổi mật
                                                khẩu</a>
                                            <a class="dropdown-item pl-3 py-2" href="./LogoutUser">Đăng xuất</a>


                                        <?php } else { ?>

                                            <a class="dropdown-item pl-3 py-2" href="./Auth/Login">Đăng
                                                nhập</a>
                                            <a class="dropdown-item pl-3 py-2" href="./Auth/Register">Đăng
                                                ký</a>

                                        <?php }  ?>
                                    </div>
                                </div>
                            </div>

                        </div> <!-- widgets-wrap.// -->

                    </div>

                </div>

            </nav>
        </header>

    <main>
        <?php require_once "./app/views/pages/user/" . $data['Page'] . ".php" ?>
    </main>

    <!-- Footer -->
    <footer class="text-light mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-lg-4 col-xl-3">
                    <a class="navbar-brand" href="./Auth">
                        <img class="img-fluid" src="./public/images/winstore-white.png" alt="logo" width="100%">
                    </a>
                </div>

                <div class="col-md-3 col-lg-3 col-xl-3 mx-auto">

                    <h5>Liên hệ</h5>
                    <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
                    <ul class="list-unstyled">
                        <li><i class="fa fa-home mr-2"></i>Hòa Minh, Liên Chiểu, Đà Nẵng</li>
                        <li><i class="fa fa-envelope mr-2"></i>voquyduc2003@gmail.com</li>
                        <li><i class="fa fa-phone mr-2"></i> 0332143234</li>
                        <li><i class="fa fa-print mr-2"></i>+84332143234</li>
                    </ul>
                </div>

                <div class="col-md-3 col-lg-3 col-xl-3">
                    <h5>Chính sách</h5>
                    <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
                    <ul class="list-unstyled">
                        <li><a href="">Chính sách bảo hành</a></li>
                        <li><a href="">Chính sách đổi hàng</a></li>
                        <li><a href="">Chính sách bảo mật</a></li>
                        <li><a href="">Chính sách vận chuyển</a></li>
                    </ul>
                </div>
                <div class="col-12 copyright mt-3">
                    <p class="float-right btn btn-info" id="top-up">
                        <i class="fa fa-angle-double-up" style="margin-left: 0;color: white;"></i>
                    </p>
                    <p class="text-center text-muted">Code by
                        <a href="https://www.facebook.com/voquyduc/"><i>voquyduc</i></a>
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Js -->
    <script src="public/js/bootstrap.min.js"></script>
    <script src="public/js/bootstrap.bundle.min.js"></script>
    <script src="public/js/jquery-3.6.0.min.js"></script>
    <script src="public/js/slick.min.js"></script>
    <script src="public/js/jquery.validate.js"></script>
    <script src="public/js/main.js"></script>
    <script src="public/js/validation.js"></script>

    <script>
        // kéo xuống khoảng cách 500px thì xuất hiện nút Top-up
        var offset = 500;
        // thời gian di trượt 0.75s ( 1000 = 1s )
        var duration = 750;
        $(function() {
            $(window).scroll(function() {
                if ($(this).scrollTop() > offset)
                    $('#top-up').fadeIn(duration);
                else
                    $('#top-up').fadeOut(duration);
            });
            $('#top-up').click(function() {
                $('body,html').animate({
                    scrollTop: 0
                }, duration);
            });
        });
    </script>


</body>

</html>