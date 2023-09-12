
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./TM22_MVC/MVC/Public/Css/css_bootstrap.min.css">
    <title>CẬP NHẬT LOẠI SÁCH</title>
</head>
<body>
    
    <form action="http://localhost/TM22_MVC/CapNhatLoaiSach/themmoi" method="post">
        <table>
            <tr>
                <td colspan="2" style="text-align: center;">
                    <h2>CẬP NHẬT THÔNG TIN LOẠI SÁCH</h2>
                </td>
            </tr>
            <tr>
                <td class="col1">Nhập mã loại sách:</td>
                <td class="col2">
                    <input class="dd1" type="text" name="txtMaloai" value="<?php echo $data['ml'] ?>">
                </td>
            </tr>
            <tr>
                <td class="col1">Nhập tên loại sách:</td>
                <td class="col2">
                    <input class="dd1" type="text" name="txtTenloai" value="<?php echo $data['tl'] ?>">
                </td>
            </tr>
            <tr>
                <td class="col1">Nhập mô tả:</td>
                <td class="col2">
                    <input class="dd1" type="text" name="txtMota" value="<?php echo $data['mt'] ?>">
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="btnThem" value="Thêm">
                    <input type="submit" name="btnSua" value="Sửa">
                    <input type="submit" name="btnXoa" value="Xóa">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>