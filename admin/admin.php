<?php
session_start();


if (!isset($_SESSION['LOGIN'])) die ('The request not found');

include "../helpers/dbConnect.php";

$query = "select * from post order by id desc";
$stmt = $conn->prepare($query);
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_ASSOC); 

$result = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome to ICSSE 2018</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="../css/styles.css">
</head>
<body>
	<!--head-->
	<div class="container" id="head">
		<img class="img-fluid" src="../images/banner.jpg" alt="Không hiển thị được hình ảnh" width="1100" height="200">
	</div>
	<!--slide bar-->
	<div class="container slidebar">
		<div id="demo" class="carousel slide" data-ride="carousel">

			<!-- Indicators -->
			<ul class="carousel-indicators">
				<li data-target="#demo" data-slide-to="0" class="active"></li>
				<li data-target="#demo" data-slide-to="1"></li>
				<li data-target="#demo" data-slide-to="2"></li>
			</ul>

			<!-- The slideshow -->
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img src="../images/slide1.jpg" alt="Los Angeles" width="1100" height="500">
				</div>
				<div class="carousel-item">
					<img src="../images/slide2.jpeg" alt="Chicago" width="1100" height="500">
				</div>
				<div class="carousel-item">
					<img src="../images/slide3.jpg" alt="New York" width="1100" height="500">
				</div>
			</div>

			<!-- Left and right controls -->
			<a class="carousel-control-prev" href="#demo" data-slide="prev">
				<span class="carousel-control-prev-icon"></span>
			</a>
			<a class="carousel-control-next" href="#demo" data-slide="next">
				<span class="carousel-control-next-icon"></span>
			</a>
		</div>
	</div>

	<!--nav bar-->
	<div class="container menu">
		<?php include "../common-html/menu.php" ?>
	</div>

	<!--Content-->
	<div class="container">
		<div class="jumbotron text-center">
			<h1>Trang Admin</h1>      
			<p>Thêm, xóa, sửa tin tức</p>
		</div>
		<table class="table table-hover table-primary">
			<thead>
				<tr>
					<th>ID</th>
					<th>Tiêu Đề</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach($result as $item) {
					?>
					<tr class="text-primary">
						<td>
							<?php echo $item['id'] ?>
						</td>
						<td><a href="../pages/detail.php?id=<?php echo $item['id'] ?>">
							<?php echo $item['title'] ?>
						</a></td>
						<td><a title="chỉnh sửa bài đăng" href="../admin/edit_page.php?id=<?php echo $item['id'] ?>">
							<i class="material-icons">edit</i></a></td>
							<td><a title="Xóa bài đăng" href="../helpers/delete_post.php?id=<?php echo $item['id'] ?>">
								<i class="material-icons">delete</i>
							</a></td>
						</tr>
						<?php
					}
					?>
				</tbody>
			</table>

			<a href="../admin/post.php"><button style="margin-bottom: 15px;" class="btn btn-primary">Đăng bài mới</button>  </a>   
		</div>
	</div>

	<div class="container footer">
		<p>4th International Conference on Green Technology and Sustainable Development</p>
		<p>HCMC University of Technology and Education</p>
		<p>Add: No 1 Vo Van Ngan Street, Linh Chieu Ward, Thu Duc District, Ho Chi Minh City</p>
		<p>Tel: (+84.8) 37 221 223 - Ext: 8161 or 8443 </p>
		<p>E-mail: gtsd2018@hcmute.edu.vn </p>
	</div>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="//cdn.ckeditor.com/4.9.0/full/ckeditor.js"></script>
<script>
	CKEDITOR.replace( 'content');
</script>
</html>
<?php
include "../helpers/closeConnect.php";
?>