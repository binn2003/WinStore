 <!-- Body -->

 <div class="container mt-2">
     <div class="row">
         <div class="col">
             <nav aria-label="breadcrumb">
                 <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="./Auth"><i class='fa fa-home'></i></a></li>
                     <li class="breadcrumb-item"><a class="act" href="./Auth/News">Tin tức</a></li>
                 </ol>
             </nav>
         </div>
     </div>
 </div>
 <div class="container">
     <div class="row container">
         <!-- Sản phẩm -->


         <div class="row">
             <div class="col-8">
                 <?php foreach ($data['ListPost'] as $row) :
                    ?>
                     <div class="tin-khac">
                         <div class="list-view">
                             <div class="item-view">
                                 <div class="item-view-image" style="margin-right: 20px;">
                                     <a class="chitietbv" href="./Auth/DetailNews/<?= $row['id'] ?>">
                                         <img class="anhbaiviet" src="./public/images/uploads/news/<?= $row['img'] ?>" alt="<?= $row['title'] ?>">
                                     </a>
                                 </div>
                                 <div class="item-view-title">
                                     <div class="view-title">
                                         <a href="./Auth/DetailNews/<?= $row['id'] ?>">
                                             <h2 class="tenbaiviet"><?= $row['title'] ?></h2>
                                         </a>
                                     </div>
                                     <div class="description">
                                         <p style="font-size: 1rem;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 3;-webkit-box-orient: vertical;overflow: hidden;">
                                             <?= $row['describe_short'] ?>
                                         </p>
                                     </div>
                                     <div class="social-container">
                                         <span class="ngay-dang"><?= $row['post_date'] ?></span>
                                         <!-- <span class="gio-dang">1 giờ</span> -->
                                         <i class='fas fa-clock'></i>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 <?php endforeach; ?>
             </div>
             <div class="col-4 col-sm-4">
                 <div class="bg-light mb-3">

                     <!-- Danh mục -->
                     <div id="accordion" role="tablist">
                         <div class="card">
                             <div class="card-header bg-dark text-white text-uppercase" role="tab" id="headingOne">
                                 <h6 class="mb-0">
                                     <a class="text-white d-block" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                         <i class="fa fa-list"></i> Tin tức
                                     </a>
                                 </h6>
                             </div>

                             <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">

                                 <ul class="list-group category_block">
                                     <?php foreach ($data['ListCategoryPost'] as $dmbv) : ?>
                                         <li class="list-group-item">
                                             <a class="d-block" href="./Auth/DetailCategoryPost/<?= $dmbv['id'] ?>"><?= $dmbv['name'] ?></a>
                                         </li>
                                     <?php endforeach ?>

                                 </ul>
                             </div>
                         </div>
                     </div>
                 </div>

             </div>
         </div>
     </div>

 </div>
 <div class="row mt-5 justify-content-center">
     <ul class="pagination">
         <?php for ($i = 1; $i <= $_SESSION['total_page']; $i++) { ?>

             <li class="page-item <?= $_SESSION['page'] == $i ? 'active' : '' ?>">
                 <a class="page-link bg-dark" style="border-color: #343a40;" href="?page=<?= $i ?>"><?= $i ?></a>
             </li>

         <?php } ?>

     </ul>
 </div>
 </div>

 </div>
 </div>