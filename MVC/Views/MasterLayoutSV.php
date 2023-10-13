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
               <td rowspan="2" id="logo_cell">
                  <img style="width: 169px;margin-left: 2px;" id="logo-utt-border"
                     src="Public/Images/logo-utt-border.png" alt="asdasd">
               </td>
               <td rowspan="2" style="font-family: Arial, Helvetica, sans-serif; color: azure;">
                  <h4 style="margin: 0;">BỘ GIAO THÔNG VẬN TẢI</h3>
                     <h3 style="margin: 0;">ĐẠI HỌC CÔNG NGHỆ GIAO THÔNG VẬN TẢI</h2>
                        <h5 style="margin: 0;">UNIVERSITY OF TRANSPORT TECHNOLOGY
                  </h4>
               </td>
               <td id="status" style="width: 270px;"><span>

                     <table style="margin: 4px;">
                        <tr>
                           <td><input type="text" name="txtInfoAcc" style="border-style: none; width: 110px;" value="<?php if (isset($data['masinhvien']))
                              echo $data['masinhvien']; ?>" readonly></td>
                           <td style="width: 60px;">Vai trò:</td>
                           <td style="border-radius: 15px;"><input type="text" name="txtVaitro"
                                 style="border-style: none;width: 70px;" value="Sinh viên?>" readonly></td>
                        </tr>
                     </table>

                  </span></td>
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
               <span style="color: aliceblue;"><a href="http://localhost/BTL_QuanLyDiem/Home/TrangchuSV/<?php echo $data['masinhvien'] ?>"
                     style="color: aliceblue;">Trang
                     chủ</a> | <a href="http://localhost/BTL_QuanLyDiem/HomeLogin"
                     style="color: aliceblue;">Thoát</a></span>
            </td>
         </tr>
      </table>
      <div class="article">
         <div class="container mt-3">
            <h4 class="mb-1">Danh mục chính</h4>

            <div class="accordion" id="accordionExample">
               <div class="card" style="border: none;">
                  <div class="card-header" id="headingOne" style="border-radius: 15px; ">
                     <h6 class="mb-0">
                        <a href="http://localhost/BTL_QuanLyDiem/TraCuuDiem/Get_data/<?php echo  $data['masinhvien'] ?>"><b style="position: relative; left: 15px; top: -2px; color: black;">Tra cứu điểm</b></a>
                     </h6>
                  </div>
               </div>

               <div class="card" style="border: none;">
                  <div class="card-header" id="headingTwo" style="border-radius: 15px;">
                     <h6 class="mb-0">
                        <a href="http://localhost/BTL_QuanLyDiem/TraCuuDiemTongHop/<?php echo  $data['masinhvien'] ?>"><b style="position: relative; left: 15px; top: -2px; color: black;">Tra cứu điểm tổng hợp</b></a>
                     </h6>
                  </div>
               </div>
            </div>
         </div>
      </div>
      </div>
      <div class="aside">
         <?php
         include_once './MVC/Views/Pages/' . $data['page'] . '.php';
         ?>
      </div>
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</body>

</html>