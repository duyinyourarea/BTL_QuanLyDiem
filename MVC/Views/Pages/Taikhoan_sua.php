<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Public/Css/style.css">
    <link rel="stylesheet" href="Public/Css/css_bootstrap.min.css">
    <base href="http://localhost/BTL_QuanLyDiem/">
    <title>Cập nhật tài khoản</title>
</head>

<body>
    <form action="http://localhost/BTL_QuanLyDiem/DanhSachTaiKhoan/Sua_taikhoan" method="post">
        <?php
        if (isset($data['dulieu'])) {
            $row = mysqli_fetch_assoc($data['dulieu']);
        ?>
            <table cellspacing="20" align="center" style="width: 35%;">
                <div class="input-group">
                    <tr>
                        <td colspan="2" style="text-align: center;">
                            <h2 style="font-family: 'Times New Roman', Times, serif;">CẬP NHẬT TÀI KHOẢN</h2>
                        </td>
                    </tr>

                    <tr>
                        <td class="input-group-text">Tài khoản</td>
                        <td>
                            <input class="form-control" type="text" name="txtTaikhoan" value="<?php echo $row['taikhoan']; ?>" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td class="input-group-text">Mật khẩu</td>
                        <td>
                            <input class="form-control" type="text" name="txtMatkhau" placeholder="Mật khẩu" value="<?php echo $row['matkhau']; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td class="input-group-text">Mã sinh viên</td>
                        <td>
                            <input class="form-control" type="text" name="txtMasinhvien" value="<?php echo $row['masinhvien']; ?>" readonly>
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