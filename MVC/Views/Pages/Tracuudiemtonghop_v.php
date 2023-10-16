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
    <table style="text-align: center; margin-top: 15px;" align="center">
        <tr>
            <form action="http://localhost/BTL_QuanLyDiem/TraCuuDiemTongHopSinhVien/Timkiem" method="post">
                <td>
                    <select class="form-control" name="cbMasinhvien" style="width: 220px;">
                        <option>Chọn sinh viên</option>
                        <?php
                        if (isset($data['dulieu_sinhvien_lop']) && $data['dulieu_sinhvien_lop'] != null) {

                            while ($row = mysqli_fetch_array($data['dulieu_sinhvien_lop'])) {
                                echo "<option value='" . $row['masinhvien'] . "'>" . $row['tensinhvien'] . "</option>";
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
    <h4 style="text-align: center; margin-top: 15px;">THÔNG TIN SINH VIÊN</h4>
    <table class="table table-bordered" style="text-align: center;">
        <thead class="table-primary">
            <tr>
                <th>Họ tên</th>
                <th>Lớp</th>
                <th>Ngành</th>
                <th>Khoa</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($data['dulieu_sinhvien']) && $data['dulieu_sinhvien'] != null) {
                while ($row = mysqli_fetch_array($data['dulieu_sinhvien'])) {
            ?>
                    <tr>
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
                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
    <h4 style="text-align: center;">BẢNG ĐIỂM TRUNG BÌNH HỌC TẬP THEO HỌC KỲ</h4>
    <table class="table table-bordered table-hover" style="text-align: center;">
        <thead class="thead-dark">
            <tr>
                <th>Học kỳ</th>
                <th>TBTL Hệ 10</th>
                <th>TBTL Hệ 4</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($data['dulieu_ki']) && $data['dulieu_ki'] != null) {
                while ($row = mysqli_fetch_array($data['dulieu_ki'])) {
            ?>
                    <tr>

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
    <h4 style="text-align: center;">BẢNG ĐIỂM CHI TIẾT MÔN HỌC</h4>
    <table class="table table-bordered table-hover" style="text-align: center;">
        <thead class="thead-dark">
            <tr>
                <th>STT</th>
                <th>Mã môn</th>
                <th>Tên môn</th>
                <th>Số tín chỉ</th>
                <th>Học kì</th>
                <th>Đánh giá</th>
                <th>Tổng kết HP</th>
                <th>Điểm chữ</th>
            </tr>
        </thead>
        <tbody>

            <?php
            if (isset($data['dulieu_chitiet']) && $data['dulieu_chitiet'] != null) {
                $i = 1;
                while ($row = mysqli_fetch_array($data['dulieu_chitiet'])) {
            ?>
                    <tr>
                        <td>
                            <?php echo $i++ ?>
                        </td>
                        <td>
                            <?php echo $row['mamon'] ?>
                        </td>
                        <td>
                            <?php echo $row['tenmon'] ?>
                        </td>
                        <td>
                            <?php echo $row['sotinchi'] ?>
                        </td>
                        <td>
                            <?php echo $row['ki'] ?>
                        </td>
                        <td>
                            <?php echo $row['trangthai'] ?>
                        </td>
                        <td>
                            <?php echo $row['diemtb_he10'] ?>
                        </td>
                        <td>
                            <?php echo $row['diemtb_word'] ?>
                        </td>
                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>

</html>