
<?php
include "../helpers/dbConnect.php";
$id = $_GET['id'];
$query = "select * from post where id=$id";
$stmt = $conn->prepare($query);
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_ASSOC); 
$result= $stmt->fetchAll();
$result=$result[0];

$query2 ="select * from post group by id desc";
$stmt2 = $conn->prepare($query2);
$stmt2->execute();
$stmt2->setFetchMode(PDO::FETCH_ASSOC); 
$result2 = $stmt2->fetchAll();
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
	<div class="container content">
		<div class="row">
			<div class="col-8 noidung1">
				<div class="inside">
					<p style="text-align: center;font-size: 20px;padding-top: 20px;color: blue;font-family: initial;">
				<?php echo $result['title'] ?>
				</p>

				<p style="font-family: initial;margin-top: 20px;font-size: 15px; text-align: justify;">
					<?php echo $result['content']; ?>
				</p>
				</div>
				<p style="font-family: fantasy;font-size: 20px;">SPONSORED BY</p>
				<div class="image">
					<table style="width: 100%">
						<thead></thead>
						<tbody>
							<tr>
								<td>
								<a href="http://hcmute.edu.vn"><img src="../images/logo HCMUTE.png" style="width: 80px; vertical-align: middle;"></a>
								</td>
								<td><a href="https://www.ieee.org/index.html"><img src="../images/IEEEpng.png" style="width: 200px; vertical-align: middle;"></a></td>
								<td><a href="https://www.ieeesmc.org/"><img src="../images/logo-ieee-smc-and.png" style="width: 180px; vertical-align: middle;"></a></td>
							</tr>

							<tr>
								<td><a href="http://www.twtasse.org/system_en/"><img src="../images/TASSE LOGO.jpg" style="width: 180px; vertical-align: middle;"></a></td>
								<td><a href="http://www.dost.hochiminhcity.gov.vn/default.aspx"><img src="../images/logo_so_en.jpg" style="width: 120px; vertical-align: middle;"></a></td>
								<td><a href="http://www.daikin.com.vn/en/index.html"><img src="../images/daikin_logo_dowanload.png" style="width: 200px; vertical-align: middle;"></a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="col-4 ">
				<div class="noidung2">
				<div class="vien w3-light-blue"><p style="font-size: 20px;color: white;font-family: fantasy;">
				LATEST NEWS</p></div>
				<div class="side">
						<ul>
						<?php
						foreach ($result2 as $key ) {
							?>
							<li>
								<p>Create Date <?php echo $key['createDate'] ?></p>
								<a href="../pages/detail.php?id=<?php echo $key['id'] ?>"><?php echo $key['title'] ?></a>
							</li>
							<?php
						}
						?>
						</ul>
					</div>
				</div>
			</div>

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
</html>
<?php
include "../helpers/closeConnect.php";
?>