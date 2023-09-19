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
   <form action="http://localhost/BTL_QuanLyDiem/DanhSachLop/Timkiem" method="post">
      <table style="width: 100%;">
         <tr>
            <td style="width: 64%;"><a href=""><button class="btn btn-outline-secondary" name="btnThemlop"
                     style="margin: 5px;">Thêm
                     lớp</button></a></td>
            <td>
               <form>
                  <div class="form-inline">
                     <input type="text" name="txtMalop" class="form-control" placeholder="Mã lớp" value="<?php if (isset($data['ml']))
                        echo $data['ml'] ?>">
                        <input type="text" name="txtTenlop" class="form-control" placeholder="Tên lớp" value="<?php if (isset($data['tl']))
                        echo $data['tl'] ?>">
                        <!-- <button type="submit" class="btn btn-primary" name="btnTimkiem" id="btnTimkiem">Tìm kiếm</button> -->
                        <input type="submit" class="btn btn-primary" name="btnTimkiem" value="Tìm kiếm">
                     </div>
                  </form>
               </td>
            </tr>
         </table>

         <table class="table">
            <thead class="thead-dark">
               <tr>
                  <th>STT</th>
                  <th>Mã lớp</th>
                  <th>Tên lớp</th>
                  <th>Sĩ số</th>
                  <th>Mã khoa</th>
                  <th>Tác vụ</th>
               </tr>
            </thead>
            <tbody>

               <?php
                     if (isset($data['dulieu']) && $data['dulieu'] != null) {
                        $i = 1;
                        while ($row = mysqli_fetch_array($data['dulieu'])) {
                           ?>
                  <tr>
                     <td>
                        <?php echo $i++ ?>
                     </td>
                     <td>
                        <?php echo $row['malop'] ?>
                     </td>
                     <td>
                        <?php echo $row['tenlop'] ?>
                     </td>
                     <td>
                        <?php echo $row['siso'] ?>
                     </td>
                     <td>
                        <?php echo $row['makhoa'] ?>
                     </td>

                     <td>
                        <a href="http://localhost/BTL_QuanLyDiem/DanhSachLop/Sua/<?php echo $row['malop'] ?>"><img class="icon" src="Public/Images/note.png" alt="note"></a>
                        <a href="http://localhost/BTL_QuanLyDiem/DanhSachLop/Xoa/<?php echo $row['malop'] ?>"><img
                              class="icon" src="Public/Images/trash.png" alt="trash"></a>
                     </td>
                  </tr>
                  <?php
                        }
                     }
                     ?>


         </tbody>
      </table>
   </form>
</body>

</html>