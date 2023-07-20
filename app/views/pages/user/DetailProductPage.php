<!-- Product-detail -->

<div class="container mt-3">
    <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= $ROOT_URL ?>">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="<?= $SITE_URL . '/sanpham/liet-ke.php' ?>">Sản phẩm</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= $data['GetProductId']['name'] ?></li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <!-- Image -->
        <div class="col-12 col-lg-6">
            <div class="card mb-3">
                <div class="card-body text-center">
                    <a href="#" data-toggle="modal" data-target="#productModal">
                        <!-- Ảnh sản phẩm -->
                        <img class="img-fluid" src="./public/images/uploads/products/<?= $data['GetProductId']['img'] ?>" />
                    </a>
                </div>
            </div>
        </div>

        <!-- Add to cart -->
        <div class="col-12 col-lg-6 add_to_cart_block">
            <div class="card mb-3">
                <div class="card-body text-center">
                    <h4 class="card-title"><?= $data['GetProductId']['name'] ?></h4>
                    <!-- Giá sản phẩm -->
                    <?php
                    if ($data['GetProductId']['price'] > 0) {
                        $percent_discount = number_format($data['GetProductId']['sale'] / $data['GetProductId']['price'] * 100);
                    } else {
                        $percent_discount = 0;
                    }
                    ?>
                    <p>Mã sản phẩm: <?= $data['GetProductId']['id'] ?></p>
                    <div class="product-price">
                        <div class="col d-flex justify-content-center align-items-center">
                            <del class="d-block ml-3"><?= number_format($data['GetProductId']['price'], 0, ',', '.') ?><sup>đ</sup></del>
                            <p class="text-danger font-weight-bold d-block mb-0 ml-1">
                                <?php if ($data['GetProductId']['sale'] <= 0) {
                                    echo number_format($data['GetProductId']['price'], 0, ',', '.');
                                }
                                if ($data['GetProductId']['sale'] > 0) {
                                    echo number_format($data['GetProductId']['sale'], 0, ',', '.');
                                } ?><sup>đ</sup></p>

                        </div>
                    </div>


                    <form method="POST" action="./Auth/AddCart/<?= $data['GetProductId']['id'] ?>">
                        <div class="form-group">
                            <label>Số Lượng :</label>
                            <div class="input-group justify-content-center">
                                <span class="input-group-prepend">
                                    <button type="button" class="quantity-left-minus btn btn-danger btn-number" data-type="minus" data-field="quantity">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </span>
                                <input type="text" class="text-center" id="quantity" name="quantity" min="1" max="100" value="1">
                                <span class="input-group-append">
                                    <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus" data-field="quantity">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label><?= $data['GetProductId']['describe_short'] ?></label>
                        </div>
                        <div class="khuyen-mai-hb mt-5">
                            <span class="tieu-de"><i class="fa fa-gift"></i> Khuyến mãi</span>
                            <ul>
                                <li>Fresship toàn bộ đơn hàng</li>
                                <li>Giảm 10% khi khách hàng mua hàng online</li>
                                <li>Đổi trả miễn phí trong vòng 30 ngày kể từ ngày mua</li>
                            </ul>
                        </div>
                        <div class="product_rassurance">
                            <ul class="list-inline">
                                <li class="list-inline-item"><i class="fa fa-truck fa-2x"></i><br />Giao hàng nhanh</li>
                                <li class="list-inline-item"><i class="fa fa-credit-card fa-2x"></i><br />Bảo mật
                                </li>
                                <li class="list-inline-item"><i class="fa fa-phone fa-2x"></i><br />0332143234
                                </li>
                            </ul>
                        </div>
                        <br>
                        <!-- <a href="<?= $SITE_URL . "/cart/add-cart.php?id=" . $maSanPham ?>" class="btn btn-danger btn-lg btn-block text-uppercase">
                            <i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng
                        </a> -->
                        <button class="btn btn-danger btn-lg btn-block text-uppercase"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</button>
                    </form>


                    <!-- <div class="reviews_product p-3 mb-2 ">
                        3 reviews
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        (4/5)
                        <a class="pull-right" href="#reviews">Xem tất cả đánh giá</a>
                    </div> -->

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Description -->
        <div class="col-12">
            <div class="card border-light bg-light mb-3">
                <div class="card-header bg-dark text-white text-uppercase"><i class="fa fa-align-justify"></i>
                    Mô tả sản phẩm
                </div>
                <div class="card-body" style="padding: 0 1.25rem;">
                    <p class="card-text "><?= $data['GetProductId']['describe'] ?></p>
                </div>
            </div>
        </div>

        <!-- Reviews -->
        <div class="col-12 " id="reviews">
            <div class="card border-light bg-light mb-3">
                <div class="card-header bg-dark text-white text-uppercase"><i class="fa fa-comment"></i> Đánh giá
                </div>
                <div class="card-body">
                    <?php foreach ($data['ListCommentByProduct'] as $bl) : ?>
                        <div class="review">
                            <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                            <meta itemprop="datePublished" content="01-01-2016">

                            <?php for ($i = 1; $i <= $bl['star']; $i++) {
                                echo '<span class="review_rating fa fa-star"></span>';
                            } ?>

                            <img width="30" height="30" class="rounded-circle object-fit-cover" src="./public/images/uploads/users/<?= $bl['img'] ?>" />
                            <b style="font-size: 14px;"><?= $bl['full_name'] ?></b>

                            <p class="mb-0 ml-4">&nbsp;&nbsp;&nbsp;<?= $bl['content'] ?></p>
                            <small class="form-text text-muted float-right"><?= $bl['date_comment'] ?></small>
                            <br>
                            <hr>
                        </div>
                    <?php endforeach ?>
                    <nav aria-label="..." class="text-center">

                        <ul class="pagination justify-content-center">
                            <?php for ($i = 1; $i <= $_SESSION['total_page']; $i++) { ?>

                                <li class="page-item <?= $_SESSION['page'] == $i ? 'active' : '' ?>">
                                    <a class="page-link" href="?maSanPham=<?= $maSanPham ?>&page=<?= $i ?>"><?= $i ?></a>
                                </li>

                            <?php } ?>

                        </ul>
                    </nav>

                </div>
                <?php

                if (!isset($_SESSION['user'])) {
                    echo '<h5 class="text-center"><i class="text-danger">Đăng nhập để bình luận về sản phẩm này</i></h5>';
                } else {

                ?>
                    <div class="comment-box text-center">
                        <form action="./Auth/AddComment" method="POST">
                            <div class="rating">
                                <input type="radio" name="star" value="5" id="5" checked>
                                <label for="5">☆</label>
                                <input type="radio" name="star" value="4" id="4">
                                <label for="4">☆</label>
                                <input type="radio" name="star" value="3" id="3">
                                <label for="3">☆</label>
                                <input type="radio" name="star" value="2" id="2">
                                <label for="2">☆</label>
                                <input type="radio" name="star" value="1" id="1">
                                <label for="1">☆</label>
                            </div>
                            <div class="comment-area">
                                <textarea class="form-control" style="width: 90%;margin-left: 4%;" name="content" placeholder="Nội dung..." rows="4"></textarea>
                            </div>
                            <div class="text-center mt-4">
                                <input type="hidden" name="id_product" value="<?= $data['GetProductId']['id'] ?>">
                                <button type="submit" class="btn btn-success send px-5">Đăng
                                    <i class="fa fa-long-arrow-right ml-1"></i>
                                </button>
                            </div>
                        </form>
                        <br>
                    </div>
                <?php
                } ?>
            </div>
        </div>
    </div>
</div>
<!-- Same product -->
<section class="same-product mt-5">
    <h3 class="same-product-title text-center">Sản phẩm cùng danh mục</h3>
    <div class="container-fluid p-5">
        <div class="row">
            <div class="col-md-12">
                <div class="owl-carousel ">

                    <?php foreach ($this->ProductModel->GetProductByIdCategory($data['GetProductId']['id_category']) as $sp_cdm) :

                        if ($sp_cdm['price'] > 0) {
                            $percent_discount_cl = number_format(($sp_cdm['price'] - $sp_cdm['sale']) / $sp_cdm['price'] * 100);
                        } else {
                            $percent_discount_cl = 0;
                        }

                    ?>
                        <div class="product-card">
                            <?php
                            if ($sp_cdm['sale'] > 0) {

                            ?>
                                <div class="product-badge badge-frame" style="left: 0;top: 0;">
                                    <?= $sp_cdm['sale'] == 0 ? '' : '-' . $percent_discount_cl . '%' ?>
                                </div>

                            <?php
                            }
                            ?>
                            <a class="product-thumb" href="./Auth/DetailProduct/<?= $sp_cdm['id'] ?>" data-abc="true">
                                <img class="product-img" src="./public/images/uploads/products/<?= $sp_cdm['img'] ?>">
                            </a>
                            <div class="card-body p-0 pt-3">
                                <h3 class="product-title mh-60 mb-0">
                                    <a href="./Auth/DetailProduct/<?= $sp_cdm['id'] ?>" data-abc="true"><?= $sp_cdm['name'] ?></a>
                                </h3>
                                <div class="product-price mb-0">
                                    <div class="col d-flex justify-content-center align-items-center">
                                        <del class="d-block fz-14"><?= number_format($sp_cdm['price'], 0, ',', '.') ?><sup>đ</sup></del>
                                        <p class="text-danger font-weight-bold fz-20 d-block ml-3 mb-0">
                                            <?php if ($sp_cdm['sale'] <= 0) {
                                                echo number_format($sp_cdm['price'], 0, ',', '.');
                                            }
                                            if ($sp_cdm['sale'] > 0) {
                                                echo number_format($sp_cdm['sale'], 0, ',', '.');
                                            } ?><sup>đ</sup></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal image -->
<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title" id="productModalLabel"><?= $tenSP ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <img class="img-fluid" src="<?= $UPLOAD_URL . "/products/" . $hinh ?>" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>