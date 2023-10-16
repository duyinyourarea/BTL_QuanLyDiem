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
         <td style="width: 45%;"><a href="http://localhost/BTL_QuanLyDiem/DanhSachNganh/Them"><button
                  class="btn btn-outline-secondary" name="btnThemnganh" style="margin: 5px;">Thêm
                  ngành</button></a></td>
         <td>
            <form action="http://localhost/BTL_QuanLyDiem/DanhSachNganh/Timkiem" method="post">
               <div class="form-inline">
                  <form>
                     <input type="text" name="txtManganh" class="form-control" placeholder="Mã ngành" value="<?php if (isset($data['mn']))
                        echo $data['mn'] ?>" style="position: relative; left: -17px; top: -1px;">
                        <input type="text" name="txtTennganh" class="form-control" placeholder="Tên ngành" value="<?php if (isset($data['tn']))
                        echo $data['tn'] ?>" style="position: relative; left: -14px; top: -1px;">
                        <input type="text" name="txtMakhoa" class="form-control" placeholder="Mã khoa" value="<?php if (isset($data['mk']))
                        echo $data['mk'] ?>" style="position: relative; left: -11px; top: -1px;">
                        <!-- <button type="submit" class="btn btn-primary" name="btnTimkiem" id="btnTimkiem">Tìm kiếm</button> -->
                        <input type="submit" class="btn btn-primary" name="btnTimkiem" value="Tìm kiếm" style="position: relative; left: -6px; top: -1px;">
                     </form>
                     <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" style="position: relative; left: -3px; top: -1px;">
                        Thêm
                     </button>
                     <div class="dropdown-menu">
                        <a class="dropdown-item" href="http://localhost/BTL_QuanLyDiem/DanhSachNganh/ImportExcel">Import
                           Excel</a>
                        <a class="dropdown-item" href="http://localhost/BTL_QuanLyDiem/DanhSachNganh/ExportExcel">Export
                           Excel</a>
                     </div>
                  </div>
            </td>
         </tr>
      </table>

      <table class="table">
         <thead class="thead-dark">
            <tr>
               <th>STT</th>
               <th>Mã ngành</th>
               <th>Tên ngành</th>
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
                     <?php echo $row['manganh'] ?>
                  </td>
                  <td>
                     <?php echo $row['tennganh'] ?>
                  </td>
                  <td>
                     <?php echo $row['makhoa'] ?>
                  </td>
                  <td>
                     <a href="http://localhost/BTL_QuanLyDiem/DanhSachNganh/Sua/<?php echo $row['manganh'] ?>"><img
                           class="icon" src="Public/Images/note.png" alt="note"></a>
                     <a href="http://localhost/BTL_QuanLyDiem/DanhSachNganh/Xoa/<?php echo $row['manganh'] ?>"><img
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