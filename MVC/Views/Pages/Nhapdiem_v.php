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
    <form action="" method="post">
        <table style="border: 1px solid black; width: 100%; height: 300px; background-color: aquamarine; margin: 5px;">
            <tr style="height: 100px;">
                <td colspan="5" style="padding-left: 10px;">
                    <h2>
                        Nhập điểm
                    </h2>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Chọn thông tin điểm muốn nhập: </label>
                    </div>
                </td>
            </tr>
            <tr>
                <td style="width: 60px;"></td>
                <td>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Lớp</label>
                        </div>
                        <select class="custom-select" id="inputGroupSelect01" name="selectedMonHoc">
                            <option value="0" selected>--Chọn lớp--</option>
                            <?php
                            if (isset($data['data_lop']) && $data['data_lop'] != null) {
                                while ($row_monhoc = mysqli_fetch_array($data('data_lop'))) {
                                    ?>
                                    <option value="<?php echo $row_monhoc['malop'] ?>">
                                        <?php echo $row_monhoc['tenlop'] ?>
                                    </option>
                                <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                </td>
                <td style="width: 60px;"></td>
                <td>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Môn học</label>
                        </div>
                        <select class="custom-select" id="inputGroupSelect01" name="selectedLop">
                            <option value="0" selected>--Chọn môn--</option>
                            <?php
                            if (isset($data['data_monhoc']) && $data['data_monhoc'] != null) {
                                while ($row_monhoc = mysqli_fetch_array($data('data_monhoc'))) {
                                    ?>
                                    <option value="<?php echo $row_monhoc['mamon'] ?>">
                                        <?php echo $row_monhoc['tenmon'] ?>
                                    </option>
                                <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                </td>
                <td style="width: 60px;"></td>
                <td>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Loại điểm</label>
                        </div>
                        <select class="custom-select" id="inputGroupSelect01" name="selectedLoaiDiem">
                            <option value="0" selected>--Loại điểm--</option>
                            <option value="1">Điểm quá trình</option>
                            <option value="2">Điểm thi cuối kì lần 1</option>
                            <option value="3">Điểm thi cuối kì lần 2</option>
                        </select>
                    </div>
                </td>
                <td style="width: 90px;"></td>
            </tr>
            <tr colspan="7">
                <td><button class="btn btn-secondary" style="position: relative; left: 640px; top: -9px;">Tiếp
                        theo</button></td>
            </tr>
        </table>
    </form>
</body>

</html>