<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Public/Css/style.css">
    <link rel="stylesheet" href="Public/Css/css_bootstrap.min.css">
    <base href="http://localhost/BTL_QuanLyDiem/">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <title>Thống kê sinh viên thi lại</title>
</head>

<body>

    <table style="text-align: center; margin-top: 15px;" align="center">
        <tr>
            <form action="http://localhost/BTL_QuanLyDiem/ThongKeSinhVien/Timkiem_thilai" method="post">
                <td>
                    <select class="form-control" name="cbMalop" style="width: 220px;">
                        <option value="">Chọn lớp</option>
                        <?php
                        if (isset($data['dulieu_lop']) && $data['dulieu_lop'] != null) {

                            while ($row = mysqli_fetch_array($data['dulieu_lop'])) {
                                echo "<option value='" . $row['malop'] . "'>" . $row['tenlop'] . "</option>";
                            }
                        }
                        ?>
                    </select>
                </td>
                <td>
                    <select class="form-control" name="cbMamon" style="width: 220px;">
                        <option value="">Chọn môn học</option>
                        <?php
                        if (isset($data['dulieu_monhoc']) && $data['dulieu_monhoc'] != null) {

                            while ($row = mysqli_fetch_array($data['dulieu_monhoc'])) {
                                echo "<option value='" . $row['mamon'] . "'>" . $row['tenmon'] . "</option>";
                            }
                        }
                        ?>
                    </select>
                </td>

                <td>
                    <input type="submit" class="btn btn-outline-primary" name="btnTimkiem" value="Tìm kiếm">
                </td>
            </form>
        </tr>
    </table>
    <?php
    if (isset($data['dulieu_count'])) {
        $row_count = mysqli_fetch_assoc($data['dulieu_count']);
    ?>
        <h5 style="text-align: center;margin-top: 20px;">TỔNG SỐ SINH VIÊN THI LẠI CÁC MÔN: <?php echo $row_count['count']; ?></h5>
        <h3 style="text-align: center;">DANH SÁCH CHI TIẾT SINH VIÊN THI LẠI</h3>
        <table class="table table-bordered table-hover" style="text-align: center;">
            <thead class="thead-dark">
                <tr>
                    <th>STT</th>
                    <th>Mã sinh viên</th>
                    <th>Tên sinh viên</th>
                    <th>Lớp</th>
                    <th>Mã môn</th>
                    <th>Tên môn</th>
                    <th>Điểm cuối kì</th>
                    <th>Tổng kết HP</th>
                    <th>Điểm chữ</th>
                    <th>Trạng thái</th>
                </tr>
            </thead>
            <tbody>

                <?php
                if (isset($data['dulieu_thilai']) && $data['dulieu_thilai'] != null) {
                    $i = 1;
                    while ($row = mysqli_fetch_array($data['dulieu_thilai'])) {
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
                                <?php echo $row['tenlop'] ?>
                            </td>
                            <td>
                                <?php echo $row['mamon'] ?>
                            </td>
                            <td>
                                <?php echo $row['tenmon'] ?>
                            </td>
                            <td>
                                <?php echo $row['diemcuoiki_l1'] ?>
                            </td>
                            <td>
                                <?php echo $row['diemtb_he10'] ?>
                            </td>
                            <td>
                                <?php echo $row['diemtb_word'] ?>
                            </td>
                            <td>
                                <?php echo $row['trangthai'] ?>
                            </td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
    <?php
    }
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>

</html>