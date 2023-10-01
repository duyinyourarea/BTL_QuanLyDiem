<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Public/Css/style.css">
    <link rel="stylesheet" href="Public/Css/css_bootstrap.min.css">
    <base href="http://localhost/BTL_QuanLyDiem/">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <title>Thông tin bảng điểm</title>
</head>

<body>
    <table style="width: 100%;">
        <tr>
            <td style="width: 57%;"></td>
            <td>
                <form action="http://localhost/BTL_QuanLyDiem/TraCuuDiem/Timkiem" method="post">
                    <div class="form-inline">
                        <input type="text" name="txtHocki" class="form-control" placeholder="Học kì" value="<?php if (isset($data['ki']))
                                                                                                                echo $data['ki'] ?>">
                        <input type="text" name="txtTenmon" class="form-control" placeholder="Tên môn" value="<?php if (isset($data['tenmon']))
                                                                                                                    echo $data['tenmon'] ?>">
                        <input type="submit" class="btn btn-outline-primary" name="btnTimkiem" value="Tìm kiếm">
                </form>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="http://localhost/BTL_QuanLyDiem/TraCuuDiem/ExportExcel">Export
                        Excel</a>
                </div>
                </div>

            </td>
        </tr>
    </table>
    <table class="table table-bordered table">
        <thead class="table-primary">
            <tr style="text-align: center;">
                <th>Mã sinh viên</th>
                <th>Họ tên</th>
                <th>Lớp</th>
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
                                <?php echo $row['masinhvien'] ?>
                            </td>
                            <td>
                                <?php echo $row['tensinhvien'] ?>
                            </td>
                            <td>
                                <?php echo $row['tenlop'] ?>
                            </td>
                            <td>
                                <?php echo $row['makhoa'] ?>
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
                            <td>
                                <a href="http://localhost/BTL_QuanLyDiem/DanhSachSinhVien/Sua/<?php echo $row['masinhvien'] ?>"><img class="icon" src="Public/Images/note.png" alt="note"></a>
                                <a href="http://localhost/BTL_QuanLyDiem/DanhSachSinhVien/Xoa/<?php echo $row['masinhvien'] ?>"><img class="icon" src="Public/Images/trash.png" alt="trash"></a>
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