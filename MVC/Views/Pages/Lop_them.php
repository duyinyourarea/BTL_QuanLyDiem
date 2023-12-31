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
    <form action="http://localhost/BTL_QuanLyDiem/DanhSachLop/Them_lop" method="post">
        <table cellspacing="20" align="center">
            <tr>
                <td colspan="2" class="col1" style="text-align: center;">
                    <h2>THÊM LỚP</h2>
                </td>
            </tr>
            <tr>
                <td class="col1" style="width: 100px;"><b>Mã lớp</b></td>
                <td class="col2" style="width: 600px;">
                    <input class="form-control" type="text" name="txtMalop">
                </td>
            </tr>
            <tr>
                <td class="col1"><b>Tên lớp</b></td>
                <td class="col2">
                    <input class="form-control" type="text" name="txtTenlop">
                </td>
            </tr>
            <tr>
                <td class="col1"><b>Sĩ số</b></td>
                <td class="col2">
                    <input class="form-control" type="text" name="txtSiso">
                </td>
            </tr>
            <tr>
                <td class="col1"><label for="sel1"><b>Ngành: </b></label></td>
                <td class="col2">
                    <div class="form-group">
                        <select class="form-control" id="sel1" name="txtManganh">
                            <option>--Chọn ngành--</option>
                            <?php
                            if (isset($data['data_nganh']) && $data['data_nganh'] != null) {
                                while ($row_of_khoa = mysqli_fetch_array($data['data_nganh'])) {
                                    ?>
                                    <option value="<?php echo $row_of_khoa['manganh'] ?>">
                                        <?php echo $row_of_khoa['tennganh'] ?>
                                    </option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
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