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
    <form action="http://localhost/BTL_QuanLyDiem/DanhSachLop/Sua_lop" method="post">
        <table cellspacing="20" align="center" style="width: 500px;">
            <tr>
                <td colspan="2" class="col1" style="text-align: center;">
                    <h2>CẬP NHẬT THÔNG TIN LỚP</h2>
                </td>
            </tr>
            <tr>
                <td>Mã lớp</td>
                <td>
                    <input class="form-control" type="text" name="txtMalop" value="<?php if (isset($data['dulieu'])) {
                        $row = mysqli_fetch_assoc($data['dulieu']);
                        echo $row['malop'];
                    } ?>" readonly>
                </td>
            </tr>
            <tr>
                <td>Tên lớp</td>
                <td>
                    <input class="form-control" type="text" name="txtTenlop" value="<?php echo $row['tenlop']; ?>">
                </td>
            </tr>
            <tr>
                <td>Sĩ số</td>
                <td>
                    <input class="form-control" type="text" name="txtSiso" value="<?php echo $row['siso']; ?>" readonly>
                </td>
            </tr>
            <tr>
                <td>Mã ngành</td>
                <td>
                    <select class="custom-select" id="txtMakhoa" name="txtMakhoa"
                        style="left: 1px; top: 9px; transition: none 0s ease 0s; cursor: move;">
                        <option value="">--Chọn ngành--</option>
                        <?php
                        if (isset($data['data_nganh']) && $data['data_nganh'] != null) {
                            while ($row_of_khoa = mysqli_fetch_array($data['data_nganh'])) {
                                ?>
                                <option value="<?php echo $row_of_khoa['manganh'] ?>" <?php if ($row_of_khoa['manganh'] == $row['manganh'])
                                       echo ' selected = "selected"'; ?>>
                                    <?php echo $row_of_khoa['tennganh'] ?>
                                </option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>

                <td colspan="2" align=center>
                    <input class="btn btn-primary" type="submit" name="btnLuu" value="Lưu">
                    <input class="btn btn-warning" type="submit" name="btnHuy" value="Hủy">
                </td>

            </tr>
        </table>
    </form>
</body>

</html>