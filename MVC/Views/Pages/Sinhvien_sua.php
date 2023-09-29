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
    <form action="http://localhost/BTL_QuanLyDiem/DanhSachSinhVien/Sua_sinhvien" method="post">
        <table cellspacing="20" align="center" style="width: 35%;">
            <div class="input-group">
                <tr>
                    <td colspan="2" style="text-align: center;">
                        <h2 style="font-family: 'Times New Roman', Times, serif;">SỬA THÔNG TIN SINH VIÊN</h2>
                    </td>
                </tr>

                <tr>
                    <td class="input-group-text">Mã sinh viên</td>
                    <td>
                        <input class="form-control" type="text" name="txtMasinhvien" placeholder="Mã sinh viên" value="<?php if(isset($data['dulieu'])){ $row = mysqli_fetch_assoc($data['dulieu']); echo $row['masinhvien'];} ?>" disabled>
                    </td>
                </tr>
                <tr>
                    <td class="input-group-text">Tên sinh viên</td>
                    <td>
                        <input class="form-control" type="text" name="txtTensinhvien" placeholder="Tên sinh viên" value="<?php if(isset($data['dulieu'])){ $row = mysqli_fetch_assoc($data['dulieu']); echo $row['tensinhvien'];} ?>">
                    </td>
                </tr>
                <tr>
                    <td class="input-group-text">Giới tính</td>
                    <td>
                        <input class="form-control" type="text" name="txtGioitinh" placeholder="Giới tính" value="<?php if(isset($data['dulieu'])){ $row = mysqli_fetch_assoc($data['dulieu']); echo $row['gioitinh'];} ?>">
                    </td>
                </tr>
                <tr>
                    <td class="input-group-text">Số điện thoại</td>
                    <td>
                        <input class="form-control" type="text" name="txtSodienthoai" placeholder="Số điện thoại" value="<?php if(isset($data['dulieu'])){ $row = mysqli_fetch_assoc($data['dulieu']); echo $row['sodienthoai'];} ?>">
                    </td>
                </tr>
                <tr>
                    <td class="input-group-text">Email</td>
                    <td>
                        <input class="form-control" type="text" name="txtEmail" placeholder="Email" value="<?php if(isset($data['dulieu'])){ $row = mysqli_fetch_assoc($data['dulieu']); echo $row['email'];} ?>">
                    </td>
                </tr>
                <tr>
                    <td class="input-group-text">Mã lớp</td>
                    <td>
                        <select class="form-control" name="cbMalop" style="width: 100%;">
                            <option value="<?php if(isset($data['dulieu'])){ $row = mysqli_fetch_assoc($data['dulieu']); echo $row['tenlop'];} ?>">Chọn lớp</option>
                            <?php
                            if (isset($data['dulieu']) && $data['dulieu'] != null) {

                                while ($row = mysqli_fetch_array($data['dulieu'])) {
                                    echo "<option value='" . $row['malop'] . "'>" . $row['tenlop'] . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input class="btn btn-primary" type="submit" name="btnLuu" value="Lưu">
                        <input class="btn btn-warning" type="submit" name="btnHuy" value="Hủy">
                    </td>
                </tr>
            </div>
        </table>
    </form>

</body>

</html>