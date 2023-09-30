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
    <?php
    if (isset($data['dulieu'])) {
        $row = mysqli_fetch_assoc($data['dulieu']);
    ?>
        <table style="width: 100%;margin: 5px 0px;">
            <tr>
                <td style="width: 16%;">
                    <label for="">Lớp: <?php echo $row['tenlop']; ?></label>
                </td>
                <td style="width: 16%;">
                    <label for="">Khoa: <?php echo $row['makhoa']; ?></label>
                </td>
                <td style="width: 35%;"><select class="form-control" name="cbMalop" style="width: 100%;">
                        <option>Chọn môn học</option>
                        <?php
                        if (isset($data['dulieu_monhoc']) && $data['dulieu_monhoc'] != null) {

                            while ($row = mysqli_fetch_array($data['dulieu_monhoc'])) {
                                echo "<option value='" . $row['mamon'] . "'>" . $row['tenmon'] . "</option>";
                            }
                        }
                        ?>
                    </select></td>
                <td>
                    <form action="http://localhost/BTL_QuanLyDiem/DanhSachLop/Timkiem" method="post">
                        <div class="form-inline">
                            <input type="text" name="txtMasinhvien" class="form-control" placeholder="Mã sinh viên" value="<?php if (isset($data['masinhvien']))
                                                                                                                                echo $data['masinhvien'] ?>">
                            <input type="text" name="txtTensinhvien" class="form-control" placeholder="Tên sinh viên" value="<?php if (isset($data['tensinhvien']))
                                                                                                                            echo $data['tensinhvien'] ?>">
                            <input type="submit" class="btn btn-outline-primary" name="btnTimkiem" value="Tìm kiếm">
                        </div>

                </td>
            </tr>
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
                    <th>Điểm cuối kì</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($data['dulieu_sinhvien']) && $data['dulieu_sinhvien'] != null) {
                    $i = 1;
                    while ($row = mysqli_fetch_array($data['dulieu_sinhvien'])) {
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
                                <input class="form-control" type="number" name="txtDiemchuyencan" placeholder="Điểm chuyên cần">
                            </td>
                            <td>
                                <input class="form-control" type="number" name="txtDiemthuchanh" placeholder="Điểm thực hành/Thảo luận">
                            </td>
                            <td>
                                <input class="form-control" type="number" name="txtDiemgiuaki" placeholder="Điểm giữa kì">
                            </td>
                            <td>
                                <input class="form-control" type="number" name="txtDiemcuoiki" placeholder="Điểm cuối kì">
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
    <?php
    }
    ?>
</body>

</html>