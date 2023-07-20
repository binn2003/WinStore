 <!-- ============================ COMPONENT REGISTER ================================= -->
 <div class="card mb-4 mx-auto mt-3" style="max-width: 500px;">
     <article class="card-body">
         <div class="mb-4">
             <center>
                 <h3 class="card-title">Đăng ký</h3>
             </center>
         </div>

         <!-- FORM -->
         <form action="./Auth/Register" method="post" enctype="multipart/form-data" id="register_user">
             <div class="form-row">
                 <div class="col form-group">
                     <label>Họ và tên</label>
                     <input type="text" class="form-control" placeholder="Họ và tên" name="full_name">
                 </div> <!-- form-group end.// -->
             </div> <!-- form-row end.// -->
             <div class="form-row">
                 <div class="col form-group">
                     <label>Tên đăng nhập</label>
                     <input type="text" class="form-control" placeholder="Username" name="username" required>
                 </div> <!-- form-group end.// -->
             </div> <!-- form-row end.// -->
             <div class="form-group">
                 <label>Email</label>
                 <input type="email" class="form-control" placeholder="Nhập địa chỉ email..." name="email" required>
                 <!-- <small class="form-text text-muted">Chúng tôi sẽ không bao giờ chia sẻ email của bạn với bất kỳ
                     ai khác.</small> -->
             </div> <!-- form-group end.// -->
             <div class="form-group">
                 <label>Số điện thoại</label>
                 <input type="text" class="form-control" name="phone" required>
             </div>

             <div class="form-row">
                 <div class="form-group col-md-6">
                     <label>Tạo mật khẩu</label>
                     <input class="form-control" type="password" name="password" id="password" required>
                 </div> <!-- form-group end.// -->
                 <div class="form-group col-md-6">
                     <label>Nhập lại mật khẩu</label>
                     <input class="form-control" type="password" name="password2" required>
                 </div> <!-- form-group end.// -->
             </div>
             <div class="form-row">
                 <div class="form-group col-md-6">
                     <label>Ảnh đại diện</label>
                     <input type="file" class="form-control load-img" name="img">
                 </div> <!-- form-group end.// -->
                 <div class="form-group col-md-6">
                     <img id="blah" src="#" alt="your image" style="display: none;height: 80px;" />

                 </div>
             </div> <!-- form-row end.// -->
             <div class="form-group">
                 <button type="submit" name="btn_register" class="btn btn-primary btn-block"> Đăng ký </button>
             </div> <!-- form-group// -->
             <input type="hidden" name="address" value="">
             <input type="hidden" name="activated" value="1">

             <i class=" text-danger"><?= (isset($MESSAGE) && (strlen($MESSAGE) > 0)) ? $MESSAGE : "" ?></i>

         </form>
         <hr>
         <p class="text-center">Đã có tài khoản? <a href="./Auth/Login">Đăng nhập</a></p>
     </article> <!-- card-body end .// -->
 </div> <!-- card.// -->
 <!-- ============================ COMPONENT REGISTER END .// ================================= -->
 <script src="public/js/load-img.js"></script>