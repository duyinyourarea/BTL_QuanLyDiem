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
<form action="http://localhost/MVC/DanhSachMonhoc/Sua_monhoc" method="post">
        <?php
            if(isset($data['dulieu'])){
                $row = mysqli_fetch_assoc($data['dulieu']);
        ?>
        <table cellspacing="20" align="center" >
            <tr>
                <td colspan="2" class="col1" style="text-align: center;"><h2>CẬP NHẬT THÔNG TIN MÔN HỌC</h2></td>
            </tr>
            <tr>
                <td >Mã môn</td>
                <td >
                    <input  class="form-control" type="text" name="txtMamon" value="<?php echo $row['mamon']; ?>" disabled>
                </td>
            </tr>
            <tr>
                <td >Tên môn</td>
                <td >
                    <input class="form-control" type="text" name="txtTenmon" value="<?php echo $row['tenmon']; ?>">
                </td>
            </tr>
            <tr>
                <td >Số tín chỉ</td>
                <td >
                    <input class="form-control" type="number" name="txtSotinchi" value="<?php echo $row['sotinchi']; ?>">
                </td>
            </tr>
            <tr>
                <td >Mã khoa</td>
                <td >
                <select class="custom-select" id="txtMakhoa" name="txtMakhoa"
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
                <td >Kì</td>
                <td >
                    <input class="form-control" type="number" name="txtSiso" value="<?php echo $row['ki']; ?>">
                </td>
            </tr>
            <tr>
                <td >Giảng viên</td>
                <td >
                    <input class="form-control" type="text" name="txtSiso" value="<?php echo $row['giangvien']; ?>">
                </td>
            </tr>
            <tr>
                <td >Phương thức tính điểm</td>
                <?php 
                ?>
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
                            placeholder="Thảo luận/Thực hành" style="left: 0px; top: 7px;"
                            value="<?php if (isset($data['dtl_th'])) {
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
                <?php ?>
            </tr>
            <tr>
                
                <td colspan="2" align = center>
                    <input class="btn btn-primary" type="submit" name="btnLuu" value="Lưu">
                </td>
                
            </tr>
        </table>
        
    </form>
    <?php
            }
        ?>
</body>
</html>