<?php
$Total = $data['Total'][0];

?>

<div class="container">
    <div class="cards row mt-5" style="margin-right: -1px;margin-left: -16px;">
        <div class="card-single col d-flex justify-content-around bg-success text-white py-5 ml-3" style="flex-direction: column-reverse; text-align: center;">
            <div>
                <span>Danh mục</span>
                <h1 class="font-weight-bold"><?= $Total['categories']; ?></h1>
            </div>
            <div>
                <i class="fa fa-th-list" style="font-size: 70px;"></i>
            </div>
        </div>
        <div class="card-single col d-flex justify-content-around bg-warning text-white py-5 ml-3 " style="flex-direction: column-reverse; text-align: center;">
            <div>
                <span>Sản phẩm</span>
                <h1 class="font-weight-bold"><?= $Total['products']; ?></h1>

            </div>
            <div>
                <i class="fa fa-sitemap" style="font-size: 70px;"></i>
            </div>
        </div>
        <div class="card-single col d-flex justify-content-around bg-danger text-white py-5 ml-3" style="flex-direction: column-reverse; text-align: center;">
            <div>
                <span>Khách hàng</span>
                <h1 class="font-weight-bold"><?= $Total['users']; ?></h1>

            </div>
            <div>
                <i class="fa fa-users" style="font-size: 70px;"></i>
            </div>
        </div>
        <div class="card-single col d-flex justify-content-around bg-primary text-white py-5 ml-3" style="flex-direction: column-reverse; text-align: center;">
            <div>
                <span>Bình luận</span>
                <h1 class="font-weight-bold"><?= $Total['comments']; ?></h1>

            </div>
            <div>
                <i class="fa fa-comments" style="font-size: 70px;"></i>
            </div>
        </div>
        <div class="card-single col d-flex justify-content-around bg-info text-white py-5 ml-3" style="flex-direction: column-reverse; text-align: center;">
            <div>
                <span>Nhân viên</span>
                <h1 class="font-weight-bold"><?= $Total['staffs']; ?></h1>

            </div>
            <div>
                <i class="fa fa-user" style="font-size: 70px;"></i>
            </div>
        </div>
        <div class="card-single col d-flex justify-content-around bg-secondary text-white py-5 ml-3" style="flex-direction: column-reverse; text-align: center;">
            <div>
                <span>Đơn hàng</span>
                <h1 class="font-weight-bold"><?= $Total['bills']; ?></h1>

            </div>
            <div>
                <i class="fas fa-shipping-fast" style="font-size: 70px;"></i>
            </div>
        </div>
        <div class="card-single col d-flex justify-content-around bg-success text-white py-5 ml-3" style="flex-direction: column-reverse; text-align: center;">
            <div>
                <span>Danh mục bài viết</span>
                <h1 class="font-weight-bold"><?= $Total['categories_post']; ?></h1>
            </div>
            <div>
                <i class="fa fa-list-alt" style="font-size: 70px;"></i>
            </div>
        </div>
        <div class="card-single col d-flex justify-content-around bg-warning text-white py-5 ml-3 " style="flex-direction: column-reverse; text-align: center;">
            <div>
                <span>Bài viết</span>
                <h1 class="font-weight-bold"><?= $Total['posts']; ?></h1>

            </div>
            <div>
                <i class="fa fa-newspaper" style="font-size: 70px;"></i>
            </div>
        </div>
    </div>
    <br>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load("current", {
            packages: ["corechart"]
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Danh mục', 'Số Lượng'],
                <?php
                foreach ($data['Product'] as $p) {
                    echo "['$p[name]',     $p[so_luong]],";
                }
                ?>
            ]);

            var options = {
                title: 'THỐNG KÊ SẢN PHẨM',
                is3D: true,
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
            chart.draw(data, options);
        }
    </script>
    
    <script type="text/javascript">
        google.charts.load("current", {
            packages: ["corechart"]
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Danh mục bài viết', 'Số Lượng'],
                <?php
                foreach ($data['Post'] as $row) {
                    echo "['$row[name]',     $row[so_luong]],";
                }
                ?>
                // ['Tin tức', 12],
                // ['Khuyễn mãi', 15],

            ]);

            var options = {
                title: 'THỐNG KÊ BÀI VIẾT',
                is3D: true,
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart_3d_2'));
            chart.draw(data, options);
        }
    </script>

    <div style="display: flex;">
        <div id="piechart_3d" style=" height: 300px;width: 48%; margin-right: 2%;"></div>
        <div id="piechart_3d_2" style=" height: 300px;width: 48%;"></div>
    </div>

</div>