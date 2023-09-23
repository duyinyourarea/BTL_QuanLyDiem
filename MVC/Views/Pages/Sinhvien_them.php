<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Public/Css/style.css">
    <link rel="stylesheet" href="Public/Css/css_bootstrap.min.css">
    <base href="http://localhost/BTL_QuanLyDiem/">
    <title>Thêm sinh viên</title>
</head>

<body>
    <form action="http://localhost/BTL_QuanLyDiem/ThemSinhVien/sinhvien_them" method="post">
        <table cellspacing="20" align="center" style="width: 35%">
            <tr>
                <td colspan="2" style="text-align: center;">
                    <h2 style="font-family: 'Times New Roman', Times, serif;">THÊM SINH VIÊN</h2>
                </td>
            </tr>
            <div class="input-group">
                <tr>
                    <td class="input-group-text">Mã sinh viên</td>
                    <td>
                        <input class="form-control" type="text" name="txtMasinhvien" placeholder="Mã sinh viên" value="<?php echo $data['masinhvien'] ?>">
                    </td>
                </tr>
                <tr>
                    <td class="input-group-text">Tên sinh viên</td>
                    <td>
                        <input class="form-control" type="text" name="txtTenloai" placeholder="Tên sinh viên" value="<?php echo $data['tensinhvien'] ?>">
                    </td>
                </tr>
                <tr>
                    <td class="input-group-text">Giới tính</td>
                    <td>
                        <input class="form-control" type="text" name="txtGioitinh" placeholder="Giới tính" value="<?php echo $data['gioitinh'] ?>">
                    </td>
                </tr>
                <tr>
                    <td class="input-group-text">Số điện thoại</td>
                    <td>
                        <input class="form-control" type="text" name="txtSodienthoai" placeholder="Số điện thoại" value="<?php echo $data['sodienthoai'] ?>">
                    </td>
                </tr>
                <tr>
                    <td class="input-group-text">Email</td>
                    <td>
                        <input class="form-control" type="text" name="txtEmail" placeholder="Email" value="<?php echo $data['email'] ?>">
                    </td>
                </tr>
                <tr>
                    <td class="input-group-text">Mã lớp</td>
                    <td>
                        <select class="form-control" name="cbMalop" style="width: 100%;">
                            <option value="">--Chọn loại sách--</option>
                            <?php
                            $con = mysqli_connect('localhost', 'root', '', 'quanly_thuvien');
                            $sql = "SELECT DISTINCT tenloai FROM loaisach";
                            $dt = mysqli_query($con, $sql);
                            while ($row = mysqli_fetch_array($dt)) {
                                echo "<option value='" . $row['tenloai'] . "'>" . $row['tenloai'] . "</option>";
                            }
                            mysqli_close($con);
                            ?>

                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input class="btn btn-primary" type="submit" name="btnLuu" value="Lưu">
                        <a href="http://localhost/BTL_QuanLyDiem/DanhSachSinhVien/"><button class="btn btn-warning" name="btnHuy">Hủy</button></a>
                    </td>
                </tr>
            </div>
        </table>
    </form>
</body>

</html>