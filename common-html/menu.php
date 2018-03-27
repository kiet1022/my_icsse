<?php
if(isset($_POST['user']) || isset($_POST['pass'])) {
	$username = $_POST['user'];
	$password = $_POST['pass'];

	if($username == 'kiet' && $password == '1234') {
		$_SESSION['LOGIN'] = true;
		$_POST = array();
		header("Location: ../admin/admin.php"); 
	} else {
		$error = 'Tai khoan hoac mat khau khong dung';
	}
} 
?>
<nav class="navbar navbar-expand-sm bg-info navbar-dark">
			<!-- Brand -->
			<a class="navbar-brand" href="../pages/index.php">HOME</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
				<span class="navbar-toggler-icon"></span>
			</button>
			<!-- Links -->

			<div class="collapse navbar-collapse" id="collapsibleNavbar">
				<ul class="navbar-nav">
					<!-- Dropdown -->
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
							ABOUT
						</a>
						<div class="dropdown-menu">
							<a class="dropdown-item" href="#">ICSSE</a>
							<a class="dropdown-item" href="#">HCMUTE</a>
							<a class="dropdown-item" href="#">COMMITTES</a>
						</div>
					</li>

					<!-- Dropdown -->
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
							FOR AUTHOR
						</a>
						<div class="dropdown-menu">
							<a class="dropdown-item" href="#">CALL PAPERS</a>
							<a class="dropdown-item" href="#">SUBMISSION</a>
							<a class="dropdown-item" href="#">REGISTRATION</a>
						</div>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="KeynoteSpeaker.html">KEYNOTE SPEAKER</a>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="#">PROGRAM</a>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="#">PUBLICATION</a>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="#">VENUE & HOTEL</a>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="#">GALARY</a>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="#">CONTACT</a>
					</li>
					<li class="nav-item">
						<?php
						if(isset($_SESSION['LOGIN']) && $_SESSION['LOGIN']) {
							?>
							<a class="nav-link" href="../helpers/logout.php"><i class="material-icons" style="vertical-align: -14%; ">person</i>Log out</a>
							<?php
						} else {
							?>
							<a class="nav-link" href="#" style="padding-top: 2px" data-toggle="modal" data-target="#myModal"><i class="material-icons" style="vertical-align: -14%; ">person</i>Log in</a>
							<?php

						}
						?>
						
					</li>
				</ul>
			</div>
		</nav>

		<!-- The Modal -->
	<div class="modal fade <?php if(isset($error) && $error != '') { echo 'show'; } ?>" id="myModal" style="<?php if(isset($error) && $error != '') { echo 'display: block;'; } ?>">
		<div class="modal-dialog modal-dialog-centered">
			<form action="#" method="POST">
				<div class="modal-content">

					<!-- Modal Header -->
					<div class="modal-header bg-primary">
						<h4 class="modal-title text-center">Đăng nhập</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>

					<!-- Modal body -->
					<div class="modal-body">

						<?php
						if(isset($error) && $error != '') {
							?>
							<div class="form-group">
								<span style="color: red;"><?php echo $error ?></span>
							</div>
							<?php
						}
						?>
						<div class="form-group">
							<label for="usr">Username:</label>
							<input type="text" class="form-control" name="user" id="usr">
						</div>
						<div class="form-group">
							<label for="pwd">Password:</label>
							<input type="password" class="form-control" name="pass" id="pwd">
						</div>

					</div>

					<!-- Modal footer -->
					<div class="modal-footer">
						<button type="submit" class="btn btn-secondary">Đăng nhập</button>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>

				</div>
			</form>
		</div>
	</div>
