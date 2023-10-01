<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Public/Css/style.css">
    <link rel="stylesheet" href="Public/Css/css_bootstrap.min.css">
    <base href="http://localhost/BTL_QuanLyDiem/">
    <title>Danh sách sinh viên</title>
</head>

<body>

    <table style="width: 100%;">
        <tr>
            <td style="width: 57%;"><a href="http://localhost/BTL_QuanLyDiem/DanhSachSinhVien/Them"><button class="btn btn-outline-success" name="btnThemsinhvien" style="margin: 5px;">Thêm
                        sinh viên</button></a></td>
            <td>
                <form action="http://localhost/BTL_QuanLyDiem/DanhSachSinhVien/Timkiem" method="post">
                    <div class="form-inline">
                        <input type="text" name="txtMasinhvien" class="form-control" placeholder="Mã sinh viên" value="<?php if (isset($data['masinhvien']))
                                                                                                                            echo $data['masinhvien'] ?>">
                        <input type="text" name="txtTensinhvien" class="form-control" placeholder="Tên sinh viên" value="<?php if (isset($data['tensinhvien']))
                                                                                                                                echo $data['tensinhvien'] ?>">
                        <input type="submit" class="btn btn-outline-primary" name="btnTimkiem" value="Tìm kiếm">
                </form>
                <button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" style="position: relative; left: 10px; top: 0px;">
                    Thêm
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="http://localhost/BTL_QuanLyDiem/DanhSachSinhVien/ImportExcel">Import Excel</a>
                    <a class="dropdown-item" href="http://localhost/BTL_QuanLyDiem/DanhSachSinhVien/ExportExcel">Export
                        Excel</a>

                </div>
                </div>

            </td>
        </tr>
    </table>
    <form action="http://localhost/BTL_QuanLyDiem/DanhSachSinhVien/Timkiem" method="post">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>STT</th>
                    <th>Mã sinh viên</th>
                    <th>Tên sinh viên</th>
                    <th>Giới tính</th>
                    <th>Số điện thoại</th>
                    <th>Email</th>
                    <th>Mã lớp</th>
                    <th>Tác vụ</th>
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
<<<<<<< Updated upstream
                                <a href="http://localhost/BTL_QuanLyDiem/DanhSachSinhVien/Sua/<?php echo $row['masinhvien'] ?>"><img class="icon" src="Public/Images/note.png" alt="note"></a>
                                <a href="http://localhost/BTL_QuanLyDiem/DanhSachSinhVien/Xoa/<?php echo $row['masinhvien'] ?>"><img class="icon" src="Public/Images/trash.png" alt="trash"></a>
=======
                                <a href="http://localhost/BTL_QuanLyDiem/DanhSachSinhVien/Sua/<?php echo $row['masinhvien'] ?>&<?php if (isset($data['info']))
                            echo $data['info']; ?>"><img class="icon" src="Public/Images/note.png" alt="note"></a>
                                <a href="http://localhost/BTL_QuanLyDiem/DanhSachSinhVien/Xoa/<?php echo $row['masinhvien'] ?>"><img
                                        class="icon" src="Public/Images/trash.png" alt="trash"></a>
>>>>>>> Stashed changes
                            </td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </form>
</body>

</html>