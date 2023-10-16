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
    <div>
        <form action="http://localhost/BTL_QuanLyDiem/DanhSachKhoa/khoa_import" method="post" enctype = "multipart/form-data">
            <h2>
                Nhập file
            </h2>
            <div class="mb-3">
                <label for="formFile" class="form-label">Chọn file dữ liệu muốn nhập</label>
                <input class="form-control" type="file" id="formFile" name="fileimport" style="width: 600px;">
            </div>

            <button type="submit" name="btnCancel">Cancel</button>
            <button type="submit" name="btnImport">Import</button>
        </form>
    </div>
</body>

</html>