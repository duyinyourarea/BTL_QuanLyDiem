<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Public/Css/style.css">
    <link rel="stylesheet" href="Public/Css/css_bootstrap.min.css">
    <base href="http://localhost/BTL_QuanLyDiem/">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <title>Thống kê sinh viên đạt học bổng</title>
</head>

<body>

    <table style="text-align: center; margin-top: 15px;" align="center">
        <tr>
            <form action="http://localhost/BTL_QuanLyDiem/ThongKeSinhVien/Timkiem_hocbong" method="post">
                <td>
                    <select class="form-control" name="cbMalop" style="width: 220px;">
                        <option>Chọn lớp</option>
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
                    <input type="submit" class="btn btn-outline-primary" name="btnTimkiem" value="Tìm kiếm">
                </td>
            </form>
            <td><a href="http://localhost/BTL_QuanLyDiem/ThongKeSinhVien/ExportExcel_hocbong"><button class="btn btn-outline-primary" name="btnExportExcel" style="margin-left: 5px;">ExportExcel</button></a></td>
        </tr>
    </table>
    <?php
    if (isset($data['dulieu_count'])) {
        $row_count = mysqli_fetch_assoc($data['dulieu_count']);
    ?>
        <h5 style="text-align: center;margin-top: 20px;">TỔNG SỐ SINH VIÊN ĐẠT HỌC BỔNG: <?php echo $row_count['count']; ?></h5>
        <h3 style="text-align: center;">DANH SÁCH CHI TIẾT SINH VIÊN ĐẠT HỌC BỔNG</h3>
        <table class="table table-bordered table-hover" style="text-align: center;">
            <thead class="thead-dark">
                <tr>
                    <th>STT</th>
                    <th>Mã sinh viên</th>
                    <th>Tên sinh viên</th>
                    <th>Lớp</th>
                    <th>Ngành</th>
                    <th>Khoa</th>
                    <th>Kì</th>
                    <th>Tổng kết HP</th>
                    <th>Tổng kết hệ 4</th>
                </tr>
            </thead>
            <tbody>

                <?php
                if (isset($data['dulieu_hocbong']) && $data['dulieu_hocbong'] != null) {
                    $i = 1;
                    while ($row = mysqli_fetch_array($data['dulieu_hocbong'])) {
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
                                <?php echo $row['tennganh'] ?>
                            </td>
                            <td>
                                <?php echo $row['tenkhoa'] ?>
                            </td>
                            <td>
                                <?php echo $row['ki'] ?>
                            </td>
                            <td>
                                <?php echo $row['diemtb_he10'] ?>
                            </td>
                            <td>
                                <?php echo $row['diemtb_he4'] ?>
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