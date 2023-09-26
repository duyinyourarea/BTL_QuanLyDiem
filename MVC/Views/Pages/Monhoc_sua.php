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
        <table cellspacing="20" align="center" >
            <tr>
                <td colspan="2" class="col1" style="text-align: center;"><h2>CẬP NHẬT THÔNG TIN MÔN HỌC</h2></td>
            </tr>
            <tr>
                <td >Mã môn</td>
                <td >
                    <input  class="form-control" type="text" name="txtMalop" value="<?php if(isset($data['dulieu'])){ $row = mysqli_fetch_assoc($data['dulieu']); echo $row['mamon'];} ?>" disabled>
                </td>
            </tr>
            <tr>
                <td >Tên môn</td>
                <td >
                    <input class="form-control" type="text" name="txtTenlop" value="<?php if(isset($data['dulieu'])){ $row = mysqli_fetch_assoc($data['dulieu']); echo $row['tenlop'];} ?>">
                </td>
            </tr>
            <tr>
                <td >Số tín chỉ</td>
                <td >
                    <input class="form-control" type="number" name="txtSiso" value="<?php if(isset($data['dulieu'])){ $row = mysqli_fetch_assoc($data['dulieu']); echo $row['siso'];} ?>">
                </td>
            </tr>
            <tr>
                <td >Mã khoa</td>
                <td >
                <select class="custom-select" id="txtMakhoa" name="txtMakhoa"
                        style="left: 1px; top: 9px; transition: none 0s ease 0s; cursor: move;" >
                        <option value="">--Chọn khoa--</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <?php
                        if (isset($data['data_khoa']) && $data['data_khoa'] != null) {
                            while ($row_of_khoa = mysqli_fetch_array($data['data_khoa'])) {
                                ?>
                                <option value="<?php echo $row_of_khoa['makhoa'] ?>">
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
                    <input class="form-control" type="number" name="txtSiso" value="<?php if(isset($data['dulieu'])){ $row = mysqli_fetch_assoc($data['dulieu']); echo $row['siso'];} ?>">
                </td>
            </tr>
            <tr>
                <td >Giảng viên</td>
                <td >
                    <input class="form-control" type="text" name="txtSiso" value="<?php if(isset($data['dulieu'])){ $row = mysqli_fetch_assoc($data['dulieu']); echo $row['siso'];} ?>">
                </td>
            </tr>
            <tr>
                <td >Phương thức tính điểm</td>
                <td >
                    <input class="form-control" type="number" name="txtSiso" value="<?php if(isset($data['dulieu'])){ $row = mysqli_fetch_assoc($data['dulieu']); echo $row['siso'];} ?>">
                </td>
            </tr>
            <tr>
                
                <td colspan="2" align = center>
                    <input class="btn btn-primary" type="submit" name="btnLuu" value="Lưu">
                </td>
                
            </tr>
        </table>
    </form>
    <script>
        function selectElement(valueToSelect) {    
        let element = document.getElementById('txtMakhoa');
        element.value = valueToSelect;
        }
        // selectElement(1);
    </script>
</body>
</html>