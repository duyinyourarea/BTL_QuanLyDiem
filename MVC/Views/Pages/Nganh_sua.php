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
<form action="http://localhost/BTL_QuanLyDiem/DanhSachNganh/Sua_nganh" method="post">
        <table cellspacing="20" align="center" >
            <tr>
                <td colspan="2" class="col1" style="text-align: center;"><h2>CẬP NHẬT THÔNG TIN NGÀNH</h2></td>
            </tr>
            <tr>
                <td class="col1">Mã ngành</td>
                <td class="col2">
                    <input  class="form-control" type="text" name="txtManganh" value="<?php if(isset($data['dulieu'])){ $row = mysqli_fetch_assoc($data['dulieu']); echo $row['manganh'];} ?>" readonly>
                </td>
            </tr>
            <tr>
                <td class="col1">Tên ngành</td>
                <td class="col2">
                    <input class="form-control" type="text" name="txtTennganh" value="<?php echo $row['tennganh']; ?>">
                </td>
            </tr>
            <tr>
                <td class="col1">Mã khoa</td>
                <td class="col2">
                <select class="custom-select" id="txtManganh" name="txtManganh"
                        style="left: 1px; top: 9px; transition: none 0s ease 0s; cursor: move;">
                        <option value="">--Chọn khoa--</option>
                        <?php
                        if (isset($data['data_khoa']) && $data['data_khoa'] != null) {
                            while ($row_of_khoa = mysqli_fetch_array($data['data_khoa'])) {
                                ?>
                                <option value="<?php echo $row_of_khoa['makhoa'] ?>" <?php if($row_of_khoa['makhoa'] == $row['makhoa']) echo ' selected = "selected"'; ?>>
                                    <?php echo $row_of_khoa['tenkhoa'] ?>
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
                <td class="col2" colspan="2" align = center>
                    <input class="btn btn-primary" type="submit" name="btnLuu" value="Lưu">
                    <input class="btn btn-warning" type="submit" name="btnHuy" value="Hủy">
                </td>
                
            </tr>
        </table>
    </form>
</body>
</html>