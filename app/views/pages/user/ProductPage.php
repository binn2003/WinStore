 <!-- Body -->

 <div class="container mt-2">
     <div class="row">
         <div class="col">
             <nav aria-label="breadcrumb">
                 <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="./Auth"><i class='fa fa-home'></i></a></li>
                     <li class="breadcrumb-item"><a class="act" href="./Auth/Products">Sản phẩm</a></li>
                 </ol>
             </nav>
         </div>
     </div>
 </div>
 <div class="container">
     <div class="row">
         <div class="col-12 col-sm-3">
             <div class="bg-light mb-3">

                 <!-- Danh mục -->
                 <div id="accordion" role="tablist">
                     <!-- Danh mục -->
                     <div class="card">
                         <div class="card-header bg-dark text-white text-uppercase" role="tab" id="headingOne">
                             <h6 class="mb-0">
                                 <a class="text-white d-block" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                     <i class="fa fa-list"></i> Danh mục
                                 </a>
                             </h6>
                         </div>

                         <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                             <ul class="list-group category_block">
                                 <?php foreach ($data['ListCategory'] as $dm) : ?>
                                     <li class="list-group-item">
                                         <a class="d-block" href="./Auth/DetailCategory/<?= $dm['id'] ?>"><?= $dm['name'] ?></a>
                                     </li>
                                 <?php endforeach ?>
                             </ul>
                         </div>
                     </div>
                     <!-- Danh mục top 10 -->
                     <div class="card mt-3">
                         <div class="card-header bg-dark text-white text-uppercase" role="tab" id="headingTwo">
                             <h6 class="mb-0">
                                 <center>
                                     <a class="text-white d-block collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                         <i class="fas fa-heart text-danger"></i> Top 10 yêu thích <i class="fas fa-heart text-danger"></i>
                                     </a>
                                 </center>
                             </h6>
                         </div>
                         <div id="collapseTwo" class="collapse show" role="tabpanel" aria-labelledby="headingTwo">
                             <ul class="list-group category_block">
                                 <?php foreach ($data['ProductTop10'] as $top10) : ?>
                                     <li class="list-group-item px-2 py-3">
                                         <a class="d-flex align-items-center" href="./Auth/DetailProduct/<?= $top10['id'] ?>">
                                             <div class="">
                                                 <img class="img-fluid img-list" src="./public/images/uploads/products/<?= $top10['img'] ?>" alt="">
                                             </div>
                                             <span class="ml-2 d-blocke"><?= $top10['name'] ?></span>
                                         </a>
                                     </li>
                                 <?php endforeach; ?>
                             </ul>
                         </div>
                     </div>
                     <!-- Danh mục đặc biệt -->
                     <div class="card mt-3">
                         <div class="card-header bg-dark text-white text-uppercase" role="tab" id="headingThree">
                             <h6 class="mb-0">
                                 <center>
                                     <a class="text-white d-block collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                         <i class="fa fa-star text-warning"></i> Sản phẩm đặc biệt <i class="fa fa-star text-warning"></i>
                                     </a>
                                 </center>
                             </h6>
                         </div>
                         <div id="collapseThree" class="collapse show" role="tabpanel" aria-labelledby="headingThree">
                             <ul class="list-group category_block">
                                 <?php foreach ($data['ProductSpecial'] as $special) : ?>
                                     <li class="list-group-item px-2 py-3">
                                         <a class="d-flex align-items-center" href="./Auth/DetailProduct/<?= $special['id'] ?>">
                                             <div class="">
                                                 <img class="img-fluid img-list" src="./public/images/uploads/products/<?= $special['img'] ?>" alt="">
                                             </div>
                                             <span class="ml-2 d-blocke"><?= $special['name'] ?></span>
                                         </a>
                                     </li>
                                 <?php endforeach ?>
                             </ul>
                         </div>
                     </div>
                 </div>
             </div>

         </div>
         <!-- Sản phẩm -->
         <div class="col" style="margin-left: 30px;">
             <form class="pb-3" action="./Auth/Search" method="POST">
                 <div class="input-group">
                     <input type="text" class="form-control" name="kyw" placeholder="Nhập từ khóa...">
                     <div class="input-group-append">
                         <button class="btn bg-dark" type="submit" name="timkiem"><i class="fa fa-search text-white"></i></button>
                     </div>
                 </div>
             </form>
             <h5 class="alert-secondary pt-3 pb-3 pl-sm-4 shadow-sm text-center "><?= $this->title_site ?></h5>

             <div class="row">
                 <?php foreach ($data['ListProduct'] as $row) :
                        if ($row['price'] > 0) {
                            $percent_discount = number_format(($row['price'] - $row['sale']) / $row['price'] * 100);
                        } else {
                            $percent_discount = 0;
                        }

                    ?>
                     <div class="col-12 col-md-6 col-lg-4 col-xl-3 mt-3">
                         <div class="card text-center product-card pb-2">
                             <?php
                                if ($row['sale'] > 0) {

                                ?>
                                 <div class="product-badge badge-frame" style="left: 0;top: 0;">
                                     <?= $row['sale'] == 0 ? '' : '-' . $percent_discount . '%' ?>
                                 </div>

                             <?php
                                }
                                ?>

                             <a class="product-thumb" href="./Auth/DetailProduct/<?= $row['id'] ?>" data-abc="true">
                                 <img class="card-img-top product-img object-fit-contain" style="height: 272px;" src="./public/images/uploads/products/<?= $row['img'] ?>" alt="Ảnh sản phẩm">
                             </a>
                             <div class="card-body p-0 pt-3 px-2">
                                 <h3 class="product-title mh-60">
                                     <a href="./Auth/DetailProduct/<?= $row['id'] ?>">
                                         <?= $row['name'] ?>
                                     </a>
                                 </h3>
                                 <div class="product-price">
                                     <div class="col d-flex justify-content-center align-items-center">
                                         <del class="d-block ml-3"><?= number_format($row['price'], 0, ',', '.') ?><sup>đ</sup></del>
                                         <p class="text-danger font-weight-bold fz-20 d-block ml-3 mb-0">
                                             <?php if ($row['sale'] <= 0) {
                                                    echo number_format($row['price'], 0, ',', '.');
                                                }
                                                if ($row['sale'] > 0) {
                                                    echo number_format($row['sale'], 0, ',', '.');
                                                } ?><sup>đ</sup></p>
                                     </div>
                                 </div>
                                 <div class="col m-2">
                                     <a href="./Auth/AddCart/<?= $row['id'] ?>" class=" btn btn-outline-primary btn-sm">Thêm vào giỏ hàng</a>
                                 </div>

                             </div>
                         </div>
                     </div>
                 <?php endforeach; ?>

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