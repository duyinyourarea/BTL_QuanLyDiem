<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Public/Css/style.css">
    <link rel="stylesheet" href="Public/Css/css_bootstrap.min.css">
    <base href="http://localhost/BTL_QuanLyDiem/">
    <title>Danh sách sinh viên</title>
</head>

<body>

    <table style="width: 100%; margin: 5px 0px;">
        <tr>
            <td style="width: 61%;"></td>
            <td>
                <form action="http://localhost/BTL_QuanLyDiem/DanhSachTaiKhoan/Timkiem" method="post">
                    <div class="form-inline">
                        <input type="text" name="txtTaikhoan" class="form-control" placeholder="Tài khoản" value="<?php if (isset($data['taikhoan']))
                                                                                                                        echo $data['taikhoan'] ?>">
                        <input type="text" name="txtMatkhau" class="form-control" placeholder="Mật khẩu" value="<?php if (isset($data['matkhau']))
                                                                                                                    echo $data['matkhau'] ?>">
                        <input type="submit" class="btn btn-outline-primary" name="btnTimkiem" value="Tìm kiếm">
                </form>
                <button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" style="position: relative; left: 10px; top: 0px;">
                    Thêm
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="http://localhost/BTL_QuanLyDiem/DanhSachTaiKhoan/ExportExcel">Export Excel</a>
                </div>
                </div>

            </td>
        </tr>
    </table>
    <form action="http://localhost/BTL_QuanLyDiem/DanhSachTaiKhoan/Timkiem" method="post">

        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>STT</th>
                    <th>Tài khoản</th>
                    <th>Mật khẩu</th>
                    <th>Vai trò</th>
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
                                <?php echo $row['taikhoan'] ?>
                            </td>
                            <td>
                                <?php echo $row['matkhau'] ?>
                            </td>
                            <td>
                                <?php echo $row['vaitro'] ?>
                            </td>
                            <td>
                                <a href="http://localhost/BTL_QuanLyDiem/DanhSachTaiKhoan/Sua/<?php echo $row['taikhoan'] ?>"><img class="icon" src="Public/Images/note.png" alt="note"></a>
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