<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>EasyBuy</title>
  <link rel="icon" href="assets/image/Vector.svg">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/plugins/iCheck/square/blue.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,600,700,300italic,400italic,600italic">
</head>
<body class=" bg-primary">
	<div class="container">
		<div class="login-box">

			<center>
				<?php 
				if(isset($_GET['alert'])){
					if($_GET['alert'] == "gagal"){
						echo "<div class='alert alert-danger'>Login Gagal! Username dan Password tidak sesuai</div>";
					}else if($_GET['alert'] == "logout"){
						echo "<div class='alert alert-success'>Anda Berhasil Logout</div>";
					}else if($_GET['alert'] == "belum_login"){
						echo "<div class='alert alert-warning'>Anda Harus Login untuk Mengakses Dashboard</div>";
					}
				}
				?>
			</center>

			<center>
					<img src="../easybuy/assets/image/easybuy admins.png"
					style="height: 200px; width: 200px">
			</center>

			<br>

			<div class="login-box-body">
				<h4 class="login-box-msg">Login Pengguna</h4>

				<form action="periksa_login.php" method="POST">
					<div class="form-group has-feedback">
						<input type="text" class="form-control" placeholder="Username" name="username" required="required" autocomplete="off">
						<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
					</div>
					<div class="form-group has-feedback">
						<input type="password" class="form-control" placeholder="Password" name="password" required="required" autocomplete="off">
						<span class="glyphicon glyphicon-lock form-control-feedback"></span>
					</div>
					<div class="row">
						<div class="col-xs-offset-8 col-xs-4">
							<button type="submit" class="btn btn-primary btn-block btn-flat">Masuk</button>
						</div>
					</div>
				</form>

			</div>
		</div>
	</div>


<script src="assets/bower_components/jquery/dist/jquery.min.js"></script>
<script src="assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

</body>
</html>
