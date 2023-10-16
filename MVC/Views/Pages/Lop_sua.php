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
<form action="http://localhost/MVC/DanhSachLop/Sua_lop" method="post">
        <table cellspacing="20" align="center" >
            <tr>
                <td colspan="2" class="col1" style="text-align: center;"><h2>CẬP NHẬT THÔNG TIN LỚP</h2></td>
            </tr>
            <tr>
                <td >Mã lớp</td>
                <td >
                    <input  class="form-control" type="text" name="txtMalop" value="<?php if(isset($data['dulieu'])){ $row = mysqli_fetch_assoc($data['dulieu']); echo $row['malop'];} ?>">
                </td>
            </tr>
            <tr>
                <td >Tên lớp</td>
                <td >
                    <input class="form-control" type="text" name="txtTenlop" value="<?php if(isset($data['dulieu'])){ $row = mysqli_fetch_assoc($data['dulieu']); echo $row['tenlop'];} ?>">
                </td>
            </tr>
            <tr>
                <td >Sĩ số</td>
                <td >
                    <input class="form-control" type="text" name="txtSiso" value="<?php if(isset($data['dulieu'])){ $row = mysqli_fetch_assoc($data['dulieu']); echo $row['siso'];} ?>">
                </td>
            </tr>
            <tr>
                <td >Mã ngành</td>
                <td >
                    <input class="form-control" type="text" name="txtManganh" value="<?php if(isset($data['dulieu'])){ $row = mysqli_fetch_assoc($data['dulieu']); echo $row['manganh'];} ?>">
                </td>
            </tr>
            <tr>
                
                <td colspan="2" align = center>
                    <input class="btn btn-primary" type="submit" name="btnLuu" value="Lưu">
                </td>
                
            </tr>
        </table>
    </form>
</body>
</html>