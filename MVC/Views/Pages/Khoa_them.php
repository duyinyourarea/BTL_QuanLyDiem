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
<form action="http://localhost/BTL_QuanLyDiem/DanhSachKhoa/Them_khoa" method="post">
        <table cellspacing="20" align="center" style="width: 35%;">
            <div class="input-group">
                <tr>
                    <td colspan="2" style="text-align: center;">
                        <h2 style="font-family: 'Times New Roman', Times, serif;">THÊM KHOA</h2>
                    </td>
                </tr>

                <tr>
                    <td class="input-group-text">Mã khoa</td>
                    <td>
                        <input class="form-control" type="text" name="txtMakhoa" placeholder="Mã khoa">
                    </td>
                </tr>
                <tr>
                    <td class="input-group-text">Tên khoa</td>
                    <td>
                        <input class="form-control" type="text" name="txtTenkhoa" placeholder="Tên khoa">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td class="col2" colspan="2" align=center>
                    <input class="btn btn-primary" type="submit" name="btnLuu" value="Lưu">
                    <input class="btn btn-warning" type="submit" name="btnHuy" value="Hủy">
                </td>

            </tr>
        </table>
    </form>
</body>

</html>