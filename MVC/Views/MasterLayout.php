<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css">
		/* *{margin: 0;}	
		.wrapper{
			width: 960px;
			margin: 0px auto;
			background: #DBDBDB;
			font-size: 14px;
			line-height: 1.5 line;
		}
		header{
			height: 100px;
			background: 	#5121c5; ;
		}
		h1{text-align: center;}
		.nav-menu ul{
			height: 40px;
			background: #4f3590;
		}
		a{text-decoration: none; 
			color: white;}
		.nav-menu>ul>li{
			float: left;
			list-style: none;
			padding: 10px 60px;
		} 
		.nav-menu>ul>li:hover{
			display: block;
			background: #939393;
		}
		.article{
			width: 20%;
			background-color: #211161;
			float: left;
			height: 400px;
		}
		.article>ul{padding: 0px;}
		.article>ul>li{
			list-style: none;
			padding: 10px 5px;
			border: #B1B1B1 dotted 1px;
			
		}
		.article>ul>li:hover{
			display: block;
			background: #939393;
		}
		table{width: 80%;padding-top: 20px;
		}
		.col1{
			width: 20%;
			text-align: left;
			height: 25px;
			padding: 5px 35px;
		}
		.col2{
			width: 55%;
			text-align: left;
			height: 25px;
			padding: 5px;
		}
		.aside{
			height: 400px;
			background-color: #f3f1f0;
		}
		footer{
			height: 70px;
			background: #4f3590;
		}
		.dd1{
			width: 250px;
			height: 20px;
		}
		tr{height: 40px}
		.dd2{
			width: 30%;
			padding-left: 80px;
			font-size: 18px;
		}
		.dd3{
			width: 70%;
		}
		.imgremove{
			width: 30px;
			height: 30px;
		} */
	</style>
	<link rel="stylesheet" href="/TM22_MVC/MVC/Public/Css/css_bootstrap.min.css">
</head>
<body>
		<header>
			<img src="../../Public/Images/logo.png">
			<div class = "status" ><div>
		</header>
		<nav class="nav-menu">
			<ul >
				<li><a href="">Trang chủ</a></li>
				<li><a href="">Đăng nhập</a></li>
				<li><a href="">Chức năng</a></li>
				<li><a href="">Thoát</a></li>
				<li><a href="">Liên hệ</a></li>
			</ul>
		</nav>
		<div class="article">
			<ul>
				<li><a href="http://localhost/72DCTM22/ThemMoiLoaiSach.php">Cập nhật loại sách</a></li>
				<li><a href="http://localhost/72DCTM22/DanhSachLoaiSach.php">Danh sách loại sách</a></li>
				<li><a href="http://localhost/72DCTM22/ThemMoiTacGia.php">Cập nhật tác giả</a></li>
				<li><a href="http://localhost/72DCTM22/DanhSachTacGia.php">Danh sách tác giả</a></li>
				<li><a href="http://localhost/72DCTM22/Sach.php">Sách</a></li>
				<li><a href="http://localhost/72DCTM22/Khoa.php">Khoa</a></li>
				<li><a href="http://localhost/72DCTM22/TimKiemKhoas.php">Tìm Kiếm Khoa</a></li>
			</ul>
		</div>
        <div class = "aside">
            <?php 
                include_once './MVC/Views/Pages/'.$data['page'].'.php';
            ?>
        </div>
</body>
</html>