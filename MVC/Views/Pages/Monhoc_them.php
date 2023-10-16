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
    <form action="http://localhost/BTL_QuanLyDiem/DanhSachMonhoc/Them_monhoc" method="post">
        <table cellspacing="20" align="center">
            <tr>
                <td colspan="2" class="col1" style="text-align: center;">
                    <h2>THÊM MÔN HỌC</h2>
                </td>
            </tr>
            <tr>
                <td>Mã môn</td>
                <td>
                    <input class="form-control" type="text" name="txtMamon" value="<?php if (isset($data['mm'])) {
                        echo $data['mm'];
                    } ?>">
                </td>
            </tr>
            <tr>
                <td>Tên môn</td>
                <td>
                    <input class="form-control" type="text" name="txtTenmon" value="<?php if (isset($data['tm'])) {
                        echo $data['tm'];
                    } ?>">
                </td>
            </tr>
            <tr>
                <td>Số tín chỉ</td>
                <td>
                    <input class="form-control" type="number" name="txtSotinchi" value="<?php if (isset($data['stc'])) {
                        echo $data['stc'];
                    } ?>">
                </td>
            </tr>
            <tr>
                <td>Ngành</td>
                <td>
                    <select class="custom-select" id="txtManganh" name="txtManganh"
                        style="left: 1px; top: 9px; transition: none 0s ease 0s; cursor: move;">
                        <option value="">--Chọn ngành--</option>
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

                </td>
            </tr>
            <tr>
                <td>Kì</td>
                <td>
                    <input class="form-control" type="number" name="txtKi" value="<?php if (isset($data['k'])) {
                        echo $data['k'];
                    } ?>">
                </td>
            </tr>
            <tr>
                <td>Giảng viên</td>
                <td>
                    <input class="form-control" type="text" name="txtGiangvien" value="<?php if (isset($data['gv'])) {
                        echo $data['gv'];
                    } ?>">
                </td>
            </tr>
            <tr>
                <td>Phương thức tính điểm</td>
                <td>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"
                                style="padding-bottom: 6px; position: relative; left: 0px; top: 7px;">CC</span>
                        </div>
                        <input type="number" name="txtDiemcc" min="0" class="form-control" placeholder="Chuyên cần"
                            style="padding-bottom: 6px; left: 1px; top: 7px; transition: none 0s ease 0s; cursor: move;"
                            value="<?php if (isset($data['dcc'])) {
                                echo $data['dcc'];
                            } ?>">
                        <span class="input-group-text"
                            style="padding-bottom: 6px; position: relative; left: 0px; top: 7px;">%</span>
                        <div class="input-group-prepend">
                            <span class="input-group-text" style="position: relative; left: 0px; top: 7px;">TL/TH</span>
                        </div>
                        <input type="number" name="txtDiemtl_th" min="0" class="form-control"
                            placeholder="Thảo luận/Thực hành" style="left: 0px; top: 7px;" value="<?php if (isset($data['dtl_th'])) {
                                echo $data['dtl_th'];
                            } ?>">
                        <span class="input-group-text"
                            style="padding-bottom: 6px; position: relative; left: 0px; top: 7px;">%</span>
                        <div class="input-group-prepend">
                            <span class="input-group-text" style="position: relative; left: -1px; top: 7px;">GK</span>
                        </div>
                        <input type="number" name="txtDiemgk" min="0" class="form-control" placeholder="Giữa kì"
                            style="left: 0px; top: 7px;" value="<?php if (isset($data['dgk'])) {
                                echo $data['dgk'];
                            } ?>">
                        <span class="input-group-text"
                            style="padding-bottom: 6px; position: relative; left: 0px; top: 7px;">%</span>
                        <div class="input-group-prepend">
                            <span class="input-group-text" style="position: relative; left: -1px; top: 7px;">CK</span>
                        </div>
                        <input type="number" name="txtDiemck" min="0" class="form-control" placeholder="Cuối kì"
                            style="left: 0px; top: 7px;" value="<?php if (isset($data['dck'])) {
                                echo $data['dck'];
                            } ?>">
                        <span class="input-group-text"
                            style="padding-bottom: 6px; position: relative; left: 0px; top: 7px;">%</span>
                    </div>
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