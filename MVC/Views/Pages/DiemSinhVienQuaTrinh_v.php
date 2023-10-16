<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Public/Css/style.css">
    <link rel="stylesheet" href="Public/Css/css_bootstrap.min.css">
    <base href="http://localhost/BTL_QuanLyDiem/">
    <title>Nhập điểm sinh viên</title>
</head>

<body>
    <form action="http://localhost/BTL_QuanLyDiem/NhapDiemSinhVien/Luudiemquatrinh" method="post">
    <table style="width: 100%;margin: 5px 0px;">
        <tr>
            <td style="width: 16%;">
                <label for="malop">Lớp:</label>
                <input type="text" id="malop" name="txtmalop" value="<?php if(isset($data['malop'])) echo $data['malop'] ?>" readonly>
            </td>
            <td style="width: 16%;">
                <label for="mamon">Môn:</label>
                <input type="text" id="mamon" name="txtmamon" value="<?php if(isset($data['mamon'])) echo $data['mamon'] ?>" readonly>
            </td>
    </table>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>STT</th>
                <th>Mã sinh viên</th>
                <th>Tên sinh viên</th>
                <th>Điểm chuyên cần</th>
                <th>Điểm thực hành/Thảo luận</th>
                <th>Điểm giữa kì</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($data['ds_ndqt']) && $data['ds_ndqt'] != null) {
                $i = 1;
                while ($row = mysqli_fetch_array($data['ds_ndqt'])) {
                    ?>
                    <tr>
                        <td>
                            <?php echo $i++ ?>
                        </td>
                        <td>
                            <?php echo $row['masinhvien'] ?>
                        </td>
                        <td>
                            <?php echo $row['tensinhvien'] ?>
                        </td>
                        <td>
                            <input class="form-control" type="number" name="DCC<?php echo $row['masinhvien'] ?>" placeholder="Điểm chuyên cần" max="10" min="0">
                        </td>
                        <td>
                            <input class="form-control" type="number" name="DTH<?php echo $row['masinhvien'] ?>"
                                placeholder="Điểm thực hành/Thảo luận" max="10" min="0">
                        </td>
                        <td>
                            <input class="form-control" type="number" name="DGK<?php echo $row['masinhvien'] ?>" placeholder="Điểm giữa kì" max="10" min="0">
                        </td>
                    </tr>
                    <?php
                }
            }
            ?>
            <tr>
                <td colspan="7" align="center">
                    <input type="submit" class="btn btn-outline-success" name="btnLuu" value="Lưu">
                </td>
            </tr>
        </tbody>
    </table>
    </form>
</body>

</html>