<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Public/Css/style.css">
    <link rel="stylesheet" href="Public/Css/css_bootstrap.min.css">
    <base href="http://localhost/BTL_QuanLyDiem/">
    <title>Cập nhật thông tin sinh viên</title>
</head>

<body>
    <form action="http://localhost/BTL_QuanLyDiem/DanhSachSinhVien/Sua_sinhvien" method="post">
        <input type="text" name="txtInfoAcc" hidden value="<?php if (isset($data['info']))
                                    echo $data['info']; ?>">
        <?php
        if (isset($data['dulieu'])) {
            $row = mysqli_fetch_assoc($data['dulieu']);
        ?>
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
                            <input class="form-control" type="text" name="txtMasinhvien" value="<?php echo $row['masinhvien']; ?>" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td class="input-group-text">Tên sinh viên</td>
                        <td>
                            <input class="form-control" type="text" name="txtTensinhvien" placeholder="Tên sinh viên" value="<?php echo $row['tensinhvien']; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td class="input-group-text">Giới tính</td>
                        <td>
                            <input class="form-control" type="text" name="txtGioitinh" placeholder="Giới tính" value="<?php echo $row['gioitinh']; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td class="input-group-text">Số điện thoại</td>
                        <td>
                            <input class="form-control" type="text" name="txtSodienthoai" placeholder="Số điện thoại" value="<?php echo $row['sodienthoai']; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td class="input-group-text">Email</td>
                        <td>
                            <input class="form-control" type="text" name="txtEmail" placeholder="Email" value="<?php echo $row['email']; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td class="input-group-text">Mã lớp</td>
                        <td>
                            <select class="form-control" name="cbMalop" style="width: 100%;">
                                <option value="">Chọn lớp</option>
                                <?php
                                if (isset($data['dulieu_malop']) && $data['dulieu_malop'] != null) {

                                    while ($row_malop = mysqli_fetch_array($data['dulieu_malop'])) {
                                ?>
                                        <option value="<?php echo $row_malop['malop'] ?>" <?php if ($row_malop['malop'] == $row['malop']) echo ' selected = "selected"'; ?>>
                                            <?php echo $row_malop['tenlop'] ?>
                                        </option>
                                <?php
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
<?php
        }
?>
</body>

</html>