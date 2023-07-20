$(document).ready(function () {
    //---------------------------- MASTER ADMIN ----------------------------

    //Login Admin
    $('#login_admin').validate({
        rules: {
            username: {
                required: true,
            },
            password: {
                required: true,
            },
        },
        messages: {
            username: {
                required: 'Hãy điền tên đăng nhập',
            },
            password: {
                required: 'Hãy điền mật khẩu',
            },
        },
    });

    //Add Category
    $('#add_category').validate({
        rules: {
            CategoryName: {
                required: true,
                // remote: 'check-danh-muc.php?act=add',
            },
        },
        messages: {
            CategoryName: {
                required: 'Vui lòng nhập tên danh mục',
                // remote: 'Tên danh mục đã tồn tại',
            },
        },
    });

    //Update Category
    $('#update_category').validate({
        rules: {
            CategoryName: {
                required: true,
                // remote: 'check-danh-muc.php?act=update&maDanhMuc=' + maDanhMuc,
            },
        },
        messages: {
            CategoryName: {
                required: 'Vui lòng nhập tên danh mục',
                // remote: 'Tên danh mục đã tồn tại',
            },
        },
    });

    //Add Category Post
    $('#add_category_post').validate({
        rules: {
            CategoryPostName: {
                required: true,
                // remote: 'check-danh-muc.php?act=add',
            },
        },
        messages: {
            CategoryPostName: {
                required: 'Vui lòng nhập tên danh mục',
                // remote: 'Tên danh mục đã tồn tại',
            },
        },
    });

    //Update Category Post
    $('#update_category_post').validate({
        rules: {
            CategoryPostName: {
                required: true,
                // remote: 'check-danh-muc.php?act=update&maDanhMuc=' + maDanhMuc,
            },
        },
        messages: {
            CategoryPostName: {
                required: 'Vui lòng nhập tên danh mục',
                // remote: 'Tên danh mục đã tồn tại',
            },
        },
    });

    //Add Product
    $.validator.addMethod(
        'lessThanEqual',
        function (value, element, param) {
            if (this.optional(element)) return true;
            var i = parseInt(value);
            var j = parseInt($(param).val());
            return i <= j;
        },
        'The value {0} must be less than {1}'
    );
    $('#add_product').validate({
        rules: {
            productName: {
                required: true,
            },
            price: {
                required: true,
                min: 0,
            },
            sale: {
                // required: true,
                min: 0,
                lessThanEqual: '#price',
            },
            // date: {
            //     required: true,
            // },
            img: {
                required: true,
            },
        },
        messages: {
            productName: {
                required: 'Vui lòng điền tên sản phẩm',
            },
            price: {
                required: 'Vui lòng điền đơn giá vnđ',
                min: 'Đơn giá phải lớn hơn 0',
            },
            sale: {
                // required: 'Vui lòng điền giảm giá vnđ',
                min: 'giảm giá phải lớn hơn 0',
                lessThanEqual: 'Giá đã giảm phải nhỏ hơn đơn giá',
            },
            // date: {
            //     required: 'Vui lòng chọn ngày nhập',
            // },
            img: 'Vui lòng chọn ảnh',
        },
    });

    //Update Product
    $('#update_product').validate({
        rules: {
            productName: {
                required: true,
            },
            price: {
                required: true,
                min: 0,
            },
            sale: {
                // required: true,
                min: 0,
                lessThanEqual: '#price',
            },
            // date: {
            //     required: true,
            // },
        },
        messages: {
            productName: {
                required: 'Vui lòng điền tên sản phẩm',
                remote: 'Tên sản phẩm đã tồn tại',
            },
            price: {
                required: 'Vui lòng điền đơn giá',
                min: 'Đơn giá phải lớn hơn 0',
            },
            sale: {
                // required: 'Vui lòng điền giảm giá vnđ',
                min: 'giảm giá phải lớn hơn 0',
                lessThanEqual: 'Giá đã giảm phải nhỏ hơn đơn giá',
            },
            // date: {
            //     required: 'Vui lòng chọn ngày nhập',
            // },
        },
    });

    //Add Post
    $('#add_post').validate({
        rules: {
            title: {
                required: true,
                // remote: 'check-bai-viet.php?act=add',
            },
            describe_short: {
                required: true,
            },
            content: {
                required: true,
            },
            // post_date: {
            //     required: true,
            // },
            img: {
                required: true,
            },
        },
        messages: {
            title: {
                required: 'Vui lòng nhập tiêu đề bài viết',
                // remote: 'Tiêu đề bài viết đã tồn tại',
            },
            describe_short: {
                required: 'Vui lòng nhập mô tả',
            },
            content: {
                required: 'Vui lòng nhập nội dung bài viết',
            },
            // post_date: {
            //     required: 'Vui lòng chọn ngày nhập',
            // },
            img: 'Vui lòng chọn ảnh',

        },
    });

    //Update Post
    $('#update_post').validate({
        rules: {
            title: {
                required: true,
                // remote: 'check-bai-viet.php?act=update&idBaiViet=' + idBaiViet,
            },
            describe_short: {
                required: true,
            },
            content: {
                required: true,
            },
            // post_date: {
            //     required: true,
            // },
        },
        messages: {
            title: {
                required: 'Vui lòng nhập tiêu đề bài viết',
                // remote: 'Tiêu đề bài viết đã tồn tại',
            },
            describe_short: {
                required: 'Vui lòng nhập mô tả',
            },
            content: {
                required: 'Vui lòng nhập nội dung',
            },
            // post_date: {
            //     required: 'Vui lòng chọn ngày đăng bài',
            // },
        },
    });

    //Add User
    $('#add_user').validate({
        rules: {
            username: {
                required: true,
                minlength: 6,
                // remote: 'check.php',
            },
            full_name: {
                required: true,
            },
            email: {
                required: true,
                email: true,
                // remote: 'check.php',
            },
            password: {
                required: true,
                minlength: 6,
            },
            phone: {
                required: true,
                minlength: 10,
            },
        },
        messages: {
            username: {
                required: 'Vui lòng điền tên đăng nhập',
                minlength: 'Hãy nhập tối thiểu 6 ký tự',
                remote: 'Mã kh đã tồn tại',
            },
            full_name: {
                required: 'Vui lòng điền họ và tên',
            },
            email: {
                required: 'Vui lòng điền email',
                email: 'Email không hợp lệ ',
                remote: 'Email đã tồn tại',
            },
            password: {
                required: 'Vui lòng điền mật khẩu',
                minlength: 'Hãy nhập ít nhất 6 ký tự',
            },
            phone: {
                required: 'Vui lòng điền số điện thoại',
                minlength: 'Hãy nhập tối thiểu 10 chữ số',
            },
        },
    });

    //Update User
    $('#update_user').validate({
        rules: {
            full_name: {
                required: true,
            },
            email: {
                required: true,
                email: true,
                // remote: 'check_user.php?act=update&ma_kh=' + ma_kh,
            },
            phone: {
                required: true,
                minlength: 10,
            },
        },
        messages: {
            full_name: {
                required: 'Vui lòng điền họ và tên',
            },
            email: {
                required: 'Vui lòng điền email',
                email: 'Email không hợp lệ ',
                // remote: "Email đã tồn tại",
            },
            phone: {
                required: 'Vui lòng nhập số điện thoại',
                minlength: 'Hãy điền ít nhất 10 chữ số',
            },
        },
    });

    //Add Staff
    $('#add_staff').validate({
        rules: {
            username: {
                required: true,
                minlength: 6,
                // remote: 'check.php',
            },
            full_name: {
                required: true,
            },
            email: {
                required: true,
                email: true,
                // remote: 'check.php',
            },
            password: {
                required: true,
                minlength: 6,
            },
            phone: {
                required: true,
                minlength: 10,
            },
            cmnd: {
                required: true,
                minlength: 9,
            },
        },
        messages: {
            username: {
                required: 'Vui lòng điền tên đăng nhập',
                minlength: 'Hãy nhập tối thiểu 6 ký tự',
                // remote: 'Mã kh đã tồn tại',
            },
            full_name: {
                required: 'Vui lòng điền họ và tên',
            },
            email: {
                required: 'Vui lòng điền email',
                email: 'Email không hợp lệ ',
                // remote: 'Email đã tồn tại',
            },
            password: {
                required: 'Vui lòng điền mật khẩu',
                minlength: 'Hãy nhập ít nhất 6 ký tự',
            },
            phone: {
                required: 'Vui lòng điền số điện thoại',
                minlength: 'Hãy nhập tối thiểu 10 chữ số',
            },
            cmnd: {
                required: 'Vui lòng điền số CMND',
                minlength: 'Hãy nhập tối thiểu 9 chữ số',
            },
        },
    });

    //Update Staff
    $('#update_staff').validate({
        rules: {
            full_name: {
                required: true,
            },
            email: {
                required: true,
                email: true,
                // remote: 'check_user.php?act=update&ma_kh=' + ma_kh,
            },
            phone: {
                required: true,
                minlength: 10,
            },
        },
        messages: {
            full_name: {
                required: 'Vui lòng điền họ và tên',
            },
            email: {
                required: 'Vui lòng điền email',
                email: 'Email không hợp lệ ',
                // remote: "Email đã tồn tại",
            },
            phone: {
                required: 'Vui lòng nhập số điện thoại',
                minlength: 'Hãy điền ít nhất 10 chữ số',
            },
        },
    });

    //---------------------------- MASTER USER ----------------------------

    //Login User
    $('#login_user').validate({
        rules: {
            username: {
                required: true,
            },
            password: {
                required: true,
            },
        },
        messages: {
            username: {
                required: 'Hãy điền tên đăng nhập',
            },
            password: {
                required: 'Hãy điền mật khẩu',
            },
        },
    });

    //Register User
    $('#register_user').validate({
        rules: {
            full_name: {
                required: true,
                minlength: 6,
            },
            username: {
                required: true,
                // remote: 'check.php',
                minlength: 6,
            },
            email: {
                required: true,
                email: true,
                // remote: 'check.php',
            },
            phone: {
                required: true,
                minlength: 10,
            },
            password: {
                required: true,
                minlength: 6,
            },
            password2: {
                required: true,
                equalTo: '#password',
                minlength: 6,
            },
        },
        messages: {
            full_name: {
                required: 'Vui lòng điền họ và tên',
            },
            username: {
                required: 'Vui lòng điền tên đăng nhập',
                // remote: 'Tên đăng nhập đã tồn tại',
                minlength: 'Tối thiểu 6 ký tự',
            },
            email: {
                required: 'Vui lòng điền email',
                // remote: 'Email đã tồn tại, vui lòng sử dụng email khác!',
                email: 'Email không hợp lệ ',
            },
            phone: {
                required: 'Vui lòng điền số điện thoại',
                minlength: 'Hãy nhập tối thiểu 10 chữ số',
            },
            password: {
                required: 'Vui lòng điền mật khẩu',
                minlength: 'Hãy nhập ít nhất 6 ký tự',
            },
            password2: {
                required: 'Vui lòng xác nhận mật khẩu',
                equalTo: 'Xác nhận mật khẩu không khớp',
                minlength: 'Hãy nhập ít nhất 6 ký tự',
            },
        },
    });

    //Update Profile
    $('#update_profile').validate({
        rules: {
            full_name: {
                required: true,
            },
            email: {
                required: true,
                email: true,
            },
            phone: {
                required: true,
                minlength: 10,
            },
        },
        messages: {
            full_name: {
                required: 'Vui lòng điền họ và tên',
            },
            email: {
                required: 'Vui lòng điền email',
                email: 'Email không hợp lệ ',
                // remote: "Email đã tồn tại",
            },
            phone: {
                required: 'Vui lòng nhập số điện thoại',
                minlength: 'Hãy điền ít nhất 10 chữ số',
            },
        },
    });

    //Change Password
    $('#change_pass').validate({
        rules: {
            pass_old: {
                required: true,
            },
            pass_new: {
                required: true,
                minlength: 6,
            },
            pass_new2: {
                required: true,
                equalTo: '#pass_new',
            },
        },
        messages: {
            pass_old: {
                required: 'Vui lòng nhập mật khẩu cũ',
            },
            pass_new: {
                required: 'Vui lòng nhập mật khẩu mới',
                minlength: 'Mật khẩu phải ít nhất 6 kí tự ',
            },
            pass_new2: {
                required: 'Vui lòng xác nhận mật khẩu mới',
                equalTo: 'Mật khẩu không khớp',
            },
        },
    });

    //Forgot Password
    $('#forgot_pass').validate({
        rules: {
            email: {
                required: true,
                email: true,
            },
        },
        messages: {
            email: {
                required: 'Vui lòng điền email',
                email: 'Email không hợp lệ ',
                // remote: "Email đã tồn tại",
            },
        },
    });

    //Reset Password
    $('#reset_pass').validate({
        rules: {
            pass_new: {
                required: true,
                minlength: 6,
            },
            pass_new2: {
                required: true,
                equalTo: '#pass_new',
            },
        },
        messages: {
            pass_new: {
                required: 'Vui lòng nhập mật khẩu mới',
                minlength: 'Mật khẩu phải ít nhất 6 kí tự ',
            },
            pass_new2: {
                required: 'Vui lòng xác nhận mật khẩu mới',
                equalTo: 'Mật khẩu không khớp',
            },
        },
    });

    //Pay
    $('#form_pay').validate({
        rules: {
            name_user: {
                required: true,
            },
            email_user: {
                required: true,
                email: true,
            },
            phone_user: {
                required: true,
                minlength: 10,
            },
            address_user: {
                required: true,
            },
        },
        messages: {
            name_user: {
                required: 'Vui lòng nhập họ và tên',
            },
            email_user: {
                required: 'Vui lòng nhập Email',
                remote: 'Email đã tồn tại, vui lòng sử dụng email khác!',
                email: 'Email không hợp lệ ',
            },
            phone_user: {
                required: 'Vui lòng nhập số điện thoại',
                minlength: 'Hãy nhập tối thiểu 10 chữ số',
            },
            address_user: {
                required: 'Vui lòng nhập địa chỉ nhận hàng',
            },
        },
    });





















});
