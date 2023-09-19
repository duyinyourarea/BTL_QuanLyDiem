<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
      integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
   <base href="http://localhost/BTL_QuanLyDiem/">
   <title>Document</title>
</head>

<body>
   <form action="http://localhost/BTL_QuanLyDiem/DanhSachLop/Timkiem" method="post">
   <table style="width: 100%;">
      <tr>
         <td style="width: 65%;"><a href=""><button class="btn btn-outline-secondary" style="margin: 5px;">Thêm lớp</button></a></td>
         <td>
            <form>
               <div class="form-inline">
                  <input type="text" id="txtMalop" class="form-control" placeholder="Mã lớp">
                  <input type="text" id="txtTenlop" class="form-control" placeholder="Tên lớp">
                  <button type="submit" class="btn btn-primary" id="btnTimkiem">Tìm kiếm</button>
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
                     <a href=""><img class="icon" src="Public/Images/note.png" alt="trash"></a>
                     <a href=""><img class="icon" src="Public/Images/trash.png" alt="trash"></a>
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