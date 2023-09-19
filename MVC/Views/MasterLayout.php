<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Public/Css/style.css">
    <link rel="stylesheet" href="Public/Css/css_bootstrap.min.css">
    <base href="http://localhost/BTL_QuanLyDiem/">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <header>
        <table>
            <tr>
                <td rowspan="2" id = "logo_cell" >
                    <img style="width: 169px;margin-left: 2px;" id="logo-utt-border" src="Public/Images/logo-utt-border.png" alt="asdasd">
                </td>
                <td rowspan="2" style="font-family: Arial, Helvetica, sans-serif; color: azure;">
                    <h4 style="margin: 0;">BỘ GIAO THÔNG VẬN TẢI</h3>
                    <h3 style="margin: 0;">ĐẠI HỌC CÔNG NGHỆ GIAO THÔNG VẬN TẢI</h2>
                    <h5 style="margin: 0;">UNIVERSITY OF TRANSPORT TECHNOLOGY</h4>
                </td>
                <td id = "status"><span></span></td>
            </tr>
            <tr>
                <td></td>
            </tr>
        </table>
    </header>
    <table style="width: 100%;margin-top: 2px;">
        <tr>
            <td>
            </td>
            <td style="align-items: end;width: 150px;border-radius: 15px;background-color: #56a4fe;text-align: center;">
                <span style="color: aliceblue;"><a href="" style="color: aliceblue;">Trang chủ</a> | <a href="" style="color: aliceblue;">Thoát</a></span>
            </td>
        </tr>
    </table>
    <div class = "article">
        <div class="container mt-3">
            <h4 class="mb-1">Danh mục chính</h4>
    
            <div class="accordion" id="accordionExample">
               <div class="card" style="border: none;">
                  <a href="">
                  <div class="card-header" id="headingOne" style="border-radius: 15px;">
                     <h5 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse"
                           data-target="#collapseOne"
                           aria-expanded="true" aria-controls="collapseOne" style="color: black;font-family: Arial, Helvetica, sans-serif;">
                        <b>Tra cứu điểm</b>
                        </button>
                     </h5>
                  </div>
                  </a>
               </div>
    
               <div class="card" style="border: none;">
                  <div class="card-header" id="headingTwo" style="border-radius: 15px;">
                     <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                           data-target="#collapseTwo"
                           aria-expanded="false" aria-controls="collapseTwo" style="color: black;font-family: Arial, Helvetica, sans-serif;">
                        <b>Tra cứu điểm tổng hợp</b>
                        </button>
                     </h5>
                  </div>
               </div>
    
               <div class="card" style="border: none;">
                  <div class="card-header" id="headingThree" style="border-radius: 15px;">
                     <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button"
                           data-toggle="collapse" data-target="#collapseThree"
                           aria-expanded="false" aria-controls="collapseThree" style="color: black;font-family: Arial, Helvetica, sans-serif;">
                        <b>Admin</b>
                        </button>
                     </h5>
                  </div>
                  <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                     data-parent="#accordionExample">
                     <div class="card-body">
                        <ul >
                            <li><a href="" style="color: black;font-family: Arial, Helvetica, sans-serif;"><b>Sinh viên</b></a></li>
                            <li><a href="" style="color: black;font-family: Arial, Helvetica, sans-serif;"><b>Tài khoản sinh viên</b></a></li>
                            <li><a href="" style="color: black;font-family: Arial, Helvetica, sans-serif;"><b>Môn hoc</b></a></li>
                            <li><a href="" style="color: black;font-family: Arial, Helvetica, sans-serif;"><b>Lớp</b></a></li>
                            <li><a href="" style="color: black;font-family: Arial, Helvetica, sans-serif;"><b>Khoa</b></a></li>
                            <li><a href="" style="color: black;font-family: Arial, Helvetica, sans-serif;"><b>Thống kê</b></a></li>
                        </ul>
                     </div>
                  </div>
               </div>
    
            </div>
    
         </div>
    </div>
    <div class = "aside">
            <?php 
                include_once './MVC/Views/Pages/'.$data['page'].'.php';
            ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</body>
</html>