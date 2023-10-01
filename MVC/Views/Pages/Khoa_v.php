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
   
      <table style="width: 100%;">
         <tr>
            <td style="width: 64%;"><a href="http://localhost/BTL_QuanLyDiem/DanhSachKhoa/Them"><button class="btn btn-outline-secondary" name="btnThemlop"
                     style="margin: 5px;">Thêm
                     khoa</button></a></td>
            <td>
            <form action="http://localhost/BTL_QuanLyDiem/DanhSachKhoa/Timkiem" method="post">
               <form >
                  <div class="form-inline">
                     <input type="text" name="txtMakhoa" class="form-control" placeholder="Mã khoa" value="<?php if (isset($data['mk']))
                        echo $data['mk'] ?>">
                        <input type="text" name="txtTenkhoa" class="form-control" placeholder="Tên khoa" value="<?php if (isset($data['tk']))
                        echo $data['tk'] ?>">
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
                  <th>Mã khoa</th>
                  <th>Tên khoa</th>
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
                        <?php echo $row['makhoa'] ?>
                     </td>
                     <td>
                        <?php echo $row['tenkhoa'] ?>
                     </td>
                     <td>
                        <a href="http://localhost/BTL_QuanLyDiem/DanhSachKhoa/Sua/<?php echo $row['makhoa'] ?>"><img class="icon" src="Public/Images/note.png" alt="note"></a>
                        <a href="http://localhost/BTL_QuanLyDiem/DanhSachKhoa/Xoa/<?php echo $row['makhoa'] ?>"><img
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