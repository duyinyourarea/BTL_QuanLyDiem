<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Public/Css/style.css">
    <link rel="stylesheet" href="Public/Css/css_bootstrap.min.css">
    <base href="http://localhost/BTL_QuanLyDiem/">
    <title>Document</title>
</head>

<body>
    <form action="http://localhost/BTL_QuanLyDiem/Home/Dangnhap" method="post">
            <div class="container-fluid" style="margin-top: 170px;">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-md-9 col-lg-6 col-xl-5">
                        <img src="Public/Images/logo-utt-border.png" class="img-fluid" alt="UTT image">
                    </div>
                    <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">

                        <div class="text-center text-lg-start">
                            <h4 style="margin: 0;">BỘ GIAO THÔNG VẬN TẢI</h4>
                            <h3 style="margin: 0;">ĐẠI HỌC CÔNG NGHỆ GIAO THÔNG VẬN TẢI</h3>
                        </div>
                        <div class="text-center text-lg-start mt-4 pt-2">
                            <h4 style="color: brown; font-family: 'Times New Roman', Times, serif;">HỆ THỐNG QUẢN LÝ ĐIỂM</h4>
                        </div>

                        <!-- TK input -->
                        <div class="form-outline mb-4">
                            <input type="text" class="form-control form-control-lg" name="txtTaiKhoan" placeholder="Tài khoản" value="<?php if (isset($data['taikhoan'])) {
                                                                                                                                            echo $data['taikhoan'];
                                                                                                                                        } ?>">
                        </div>
                        <!-- Password input -->
                        <div class="form-outline mb-3">
                            <input type="password" class="form-control form-control-lg" name="txtMatKhau" placeholder="Mật khẩu" value="<?php if (isset($data['matkhau'])) {
                                                                                                                                            echo $data['matkhau'];
                                                                                                                                        } ?>">
                        </div>
                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" class="btn btn-primary btn-lg" name="btnLogin" style="padding-left: 2.5rem; padding-right: 2.5rem;">Đăng nhập</button>
                        </div>
                    </div>
                </div>
            </div>
    </form>
</body>

</html>