<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport"
	content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Label - Premium Responsive Bootstrap 4 Admin & Dashboard Template</title>
<!-- plugins:css -->
<link rel="stylesheet"
	href="assets/vendors/iconfonts/mdi/css/materialdesignicons.css" />
<link rel="stylesheet" href="assets/vendors/css/vendor.addons.css" />
<!-- endinject -->
<!-- vendor css for this page -->
<!-- End vendor css for this page -->
<!-- inject:css -->
<link rel="stylesheet" href="assets/css/shared/style.css" />
<!-- endinject -->
<!-- Layout style -->
<link rel="stylesheet" href="assets/css/demo_1/style.css">
<!-- Layout style -->
<link rel="shortcut icon" href="assets/images/favicon.ico" />
</head>
<body>
	<div class="authentication-theme auth-style_1">
		<div class="row">
			<div class="col-12 logo-section">
				<a href="../../index.html" class="logo"> <img
					src="assets/images/logo.svg" alt="logo" />
				</a>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-5 col-md-7 col-sm-9 col-11 mx-auto">
				<div class="grid">
					<div class="grid-body">
						<div class="row">
							<div
								class="col-lg-7 col-md-8 col-sm-9 col-12 mx-auto form-wrapper">

								<form method="post" action="#">
									<div class="form-group input-rounded">
										<input type="text" class="form-control" placeholder="Username"
											name="email" />
									</div>
									<div class="form-group input-rounded">
										<input type="password" class="form-control"
											placeholder="Password" name="password" />
									</div>
									<div class="form-inline">
										<div class="checkbox">
											<label> <input type="checkbox" class="form-check-input" />Remember
												me <i class="input-frame"></i>
											</label>
										</div>
									</div>
									<button type="submit" name="login" value="Login"
										class="btn btn-primary btn-block">Login</button>
								</form> 
								<div class="signup-link">
									<p>Don't have an account yet?</p>
									<a href="#">Sign Up</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="auth_footer">
			<p class="text-muted text-center">© Label Inc 2019</p>
		</div>
	</div>
	<!--page body ends -->
	<!-- SCRIPT LOADING START FORM HERE /////////////-->
	<!-- plugins:js -->
	<script src="assets/vendors/js/core.js"></script>
	<script src="assets/vendors/js/vendor.addons.js"></script>
	<!-- endinject -->
	<!-- Vendor Js For This Page Ends-->
	<!-- Vendor Js For This Page Ends-->
	<!-- build:js -->
	<script src="assets/js/template.js"></script>
	<!-- endbuild -->
</body>
</html>


<?php
include ('connection.php');

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $pwd = $_POST['password'];

    $query = "SELECT * FROM register WHERE email = '$email' && password = '$pwd'";
    $data = mysqli_query($conn, $query);
    $total = mysqli_num_rows($data);
    echo "$total";

    if ($total == 1) {
        $_SESSION['email'] = $email;
        header("Location: http://localhost/adminPanel/dashboard.php");
    } else {
        echo 'login failed';
    }
}
?>