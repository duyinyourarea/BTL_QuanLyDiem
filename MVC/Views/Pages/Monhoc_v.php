<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="http://localhost/BTL_QuanLyDiem/">
    <link rel="stylesheet" href="Public/Css/style.css">
    <link rel="stylesheet" href="Public/Css/css_bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <title>Document</title>
</head>

<body>
    <table style="width: 100%;">
        <tr>
            <td style="width: 57%;"><a href="http://localhost/BTL_QuanLyDiem/DanhSachMonHoc/Them"><button
                        class="btn btn-outline-secondary" name="btnThemlop" style="margin: 5px;">Thêm
                        môn</button></a></td>
            <td align="center">
                <div class="form-inline" >
                    <form action="http://localhost/BTL_QuanLyDiem/DanhSachMonHoc/Timkiem" method="post">

                        <input type="text" name="txtMamon" class="form-control" placeholder="Mã môn" value="<?php if (isset($data['mm']))
                            echo $data['mm'] ?>" >
                            <input type="text" name="txtTenmon" class="form-control" placeholder="Tên môn" value="<?php if (isset($data['tm']))
                            echo $data['tm'] ?>" >
                            <!-- <button type="submit" class="btn btn-primary" name="btnTimkiem" id="btnTimkiem">Tìm kiếm</button> -->
                            <input type="submit" class="btn btn-primary" name="btnTimkiem" value="Tìm kiếm">
                        </form>
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" style="position: relative; left: 9px; top: -1px;">
                            Thêm
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item"
                                href="http://localhost/BTL_QuanLyDiem/DanhSachMonHoc/ImportExcel">Import Excel</a>
                            <a class="dropdown-item"
                                href="http://localhost/BTL_QuanLyDiem/DanhSachMonHoc/ExportExcel">Export
                                Excel</a>
                        </div>
                    </div>
                </td>
            </tr>
        </table>
        <form action="http://localhost/BTL_QuanLyDiem/DanhSachMonHoc/Timkiem" method="post">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>STT</th>
                        <th>Mã môn</th>
                        <th>Tên môn</th>
                        <th>Số tín chỉ</th>
                        <th>Kì</th>
                        <th>Giảng viên</th>
                        <th>CT tính điểm</th>
                        <th>Mã ngành</th>
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
                                <?php echo $row['giangvien'] ?>
                            </td>
                            <td>
                                <?php echo $row['phuongthuctinhdiem'] ?>
                            </td>
                            <td>
                                <?php echo $row['manganh'] ?>
                            </td>
                            <td>
                                <a href="http://localhost/BTL_QuanLyDiem/DanhSachMonHoc/Sua/<?php echo $row['mamon'] ?>"><img
                                        class="icon" src="Public/Images/note.png" alt="note"></a>
                                <a href="http://localhost/BTL_QuanLyDiem/DanhSachMonHoc/Xoa/<?php echo $row['mamon'] ?>"><img
                                        class="icon" src="Public/Images/trash.png" alt="trash"></a>
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