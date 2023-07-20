<div class="container mt-3">
    <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="./Auth">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="./Auth/News">Tin tức</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= $data['GetPostId']['title'] ?></li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="container content-new-ui">
    <div class="col-8 content-body-ui">
        <div class="header-content">
            <h2 class="mt-3"><?= $data['GetPostId']['title'] ?></h2>
            <div class="hr"></div>
            <div class="time-content">
                <p><?= $data['GetPostId']['post_date'] ?> By <?= $data['GetPostId']['full_name'] ?></p>
            </div>
        </div>
        <div class="body-content">
            <div class="body-content-image">
                <img src="./public/images/uploads/news/<?= $data['GetPostId']['img'] ?>" alt="">
            </div>
            <div style="padding: 20px;"><?= $data['GetPostId']['content'] ?></div>
        </div>
        <div class="hr"></div>
        <div class="list-tin-lien-quan cung-danh-muc-ui">
            <!-- <div class="header-row">
                <h3>Tin liên quan</h3>
            </div> -->
            <?php foreach ($data['GetPostIdCategory'] as $dmbv) :

            ?>
                <div class="item-view">
                    <div class="left-view-image">
                        <a href="./Auth/News/<?= $dmbv['id'] ?>">
                            <img src="./public/images/uploads/news/<?= $dmbv['img'] ?>" alt="">
                        </a>
                    </div>
                    <div class="item-view-title">
                        <div class="view-title">
                            <a href="./Auth/News/<?= $dmbv['id'] ?>">
                                <h2 style="    -webkit-line-clamp: 3;"><?= $dmbv['title'] ?></h2>
                            </a>
                            <div class="description">
                                <p style="font-size: .8rem;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 3;-webkit-box-orient: vertical;overflow: hidden;">
                                    <?= $dmbv['describe_short'] ?></p>
                            </div>
                        </div>
                        <div class="social-container">
                            <span class="ngay-dang"><?= $dmbv['post_date'] ?></span>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
    <div class="left">
        <div class="list-tin-moi tin-moi-ui">
            <div class="header-row">
                <h3>Tin mới nhất</h3>
            </div>
            <?php foreach ($data['GetPostId1'] as $dm1) :

            ?>
                <div class="item-view">
                    <div class="left-view-image"><a href="./Auth/DetailNews/<?= $dm1['id'] ?>">
                        </a><a href="./Auth/DetailNews/<?= $dm1['id'] ?>">
                            <img src="./public/images/uploads/news/<?= $dm1['img'] ?>" alt="">
                        </a>
                    </div>
                    <div class="item-view-title">
                        <div class="view-title">
                            <a href="./Auth/DetailNews/<?= $dm1['id'] ?>">
                                <h2 style="    -webkit-line-clamp: 3;"><?= $dm1['title'] ?></h2>
                            </a>
                        </div>
                        <div style="display:block;float:right;" class="social-container">
                            <span class="ngay-dang" style="text-align:right;"><?= $dm1['post_date'] ?></span>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
        <div class="list-tin-moi tin-moi-ui">
            <div class="header-row">
                <h3>Tin ưu đãi</h3>
            </div>
            <?php foreach ($data['GetPostId3'] as $dm3) :

            ?>
                <div class="item-view">
                    <div class="left-view-image"><a href="./Auth/DetailNews/<?= $dm3['id'] ?>">
                        </a><a href="./Auth/DetailNews/<?= $dm3['id'] ?>">
                            <img src="./public/images/uploads/news/<?= $dm3['img'] ?>" alt="">
                        </a>
                    </div>
                    <div class="item-view-title">
                        <div class="view-title">
                            <a href="./Auth/DetailNews/<?= $dm3['id'] ?>">
                                <h2 style="    -webkit-line-clamp: 3;"><?= $dm3['title'] ?></h2>
                            </a>
                        </div>
                        <div style="display:block; float:right;" class="social-container">
                            <span class="ngay-dang" style="text-align:right;"><?= $dm3['post_date'] ?></span>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>