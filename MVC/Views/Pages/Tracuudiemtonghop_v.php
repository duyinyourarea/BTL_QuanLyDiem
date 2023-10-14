<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Public/Css/style.css">
    <link rel="stylesheet" href="Public/Css/css_bootstrap.min.css">
    <base href="http://localhost/BTL_QuanLyDiem/">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <title>Tra cứu điểm tổng hợp</title>
</head>

<body>
    <h4 style="text-align: center;">THÔNG TIN SINH VIÊN</h4>
    <table class="table table-bordered table">
        <thead class="table-primary">
            <tr style="text-align: center;">
                <th>Kì</th>
                <th>Họ tên</th>
                <th>Lớp</th>
                <th>Khoa</th>
                <th>Ngành</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($data['dulieu_sinhvien']) && $data['dulieu_sinhvien'] != null) {
                while ($row = mysqli_fetch_array($data['dulieu_sinhvien'])) {
            ?>
                    <tr>

                    
                        <td>
                            <select class="form-control" name="cbMalop" style="width: 100%;">
                                <option>Chọn kì</option>
                                <?php
                                if (isset($data['dulieu_malop']) && $data['dulieu_malop'] != null) {

                                    while ($row = mysqli_fetch_array($data['dulieu_malop'])) {
                                        echo "<option value='" . $row['malop'] . "'>" . $row['tenlop'] . "</option>";
                                    }
                                }
                                ?>
                            </select>
                        </td>
                        <td>
                            <select class="form-control" name="cbMalop" style="width: 100%;">
                                <option>Chọn kì</option>
                                <?php
                                if (isset($data['dulieu_malop']) && $data['dulieu_malop'] != null) {

                                    while ($row = mysqli_fetch_array($data['dulieu_malop'])) {
                                        echo "<option value='" . $row['malop'] . "'>" . $row['tenlop'] . "</option>";
                                    }
                                }
                                ?>
                            </select>
                        </td>
                        <td>
                            <?php echo $row['tenlop'] ?>
                        </td>
                        <td>
                            <?php echo $row['makhoa'] ?>
                        </td>
                        <td>
                            <?php echo $row['nganh'] ?>
                        </td>
                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
    <h4 style="text-align: center;">BẢNG ĐIỂM CHI TIẾT</h4>
    <form action="http://localhost/BTL_QuanLyDiem/TraCuuDiem/Timkiem" method="post">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>STT</th>
                    <th>Mã môn</th>
                    <th>Tên môn</th>
                    <th>Số tín chỉ</th>
                    <th>Học kì</th>
                    <th>Lần thi</th>
                    <th>Đánh giá</th>
                    <th>Chuyên cần</th>
                    <th>Kiểm tra GK</th>
                    <th>Thực hành/Thảo luận</th>
                    <th>Thi kết thúc</th>
                    <th>Tổng kết HP</th>
                    <th>Điểm chữ</th>
                </tr>
            </thead>
            <tbody>

                <?php
                if (isset($data['dulieu']) && $data['dulieu'] != null) {
                    $i = 1;
                    while ($row = mysqli_fetch_array($data['dulieu'])) {
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
                                <?php echo $row['gioitinh'] ?>
                            </td>
                            <td>
                                <?php echo $row['sodienthoai'] ?>
                            </td>
                            <td>
                                <?php echo $row['email'] ?>
                            </td>
                            <td>
                                <?php echo $row['malop'] ?>
                            </td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>

</html>