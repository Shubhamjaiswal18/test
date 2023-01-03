<?php

include_once 'connection.php';
$msg = '';
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $c_password = $_POST['c_password'];
    $created_at = date("h:i:s");
    $update_at = date("h:i:s");

    if ($username != "" && $email != "" && $password != "" && $c_password != "") {
        if ($password == $c_password) {
            $sql = "SELECT email FROM register where email='".$email."'";
            $check_email = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($check_email);
            if ($count > 0) {
                $msg = "Email id allready registered.";
            } else {
                $query = "INSERT INTO register (name,email,password,created_at,updated_at) value('$username', '$email', '$password','$created_at','$update_at')";
                $data = mysqli_query($conn, $query);
                if ($data) {
                    $msg = "Register successs.";
                    header("Location:http://localhost/adminPanel/login.php");
                }else{
                    echo  $conn->error;
                }
            }
        } else {
            $msg = "Password not matched.";
        }
    } else {
        $msg = "All field is required.";
    }
}
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
				<h1 class="text-center text-primary">Register</h1>
				<!-- <a href="../../index.html" class="logo">
            <img src="assets/images/logo.svg" alt="logo" />
          </a> -->
			</div>
		</div>
		<div class="row">
			<div class="col-lg-5 col-md-7 col-sm-9 col-11 mx-auto">
				<div class="grid">
					<div class="grid-body">
						<div class="row">
							<div
								class="col-lg-7 col-md-8 col-sm-9 col-12 mx-auto form-wrapper text-center">
							
									<span style="color: red" class="pb-3"><?php echo $msg  ?></span>
								
								<form method="post">
									<div class="form-group input-rounded">
										<input type="text" class="form-control" name="username"
											id="username" placeholder="Username" />
									</div>
									<div class="form-group input-rounded">
										<input type="email" class="form-control" name="email"
											id="email" placeholder="User email" />
									</div>
									<div class="form-group input-rounded">
										<input type="password" class="form-control" name="password"
											id="password" placeholder="Password" />
									</div>
									<div class="form-group input-rounded">
										<input type="password" class="form-control" name="c_password"
											id="c_password" placeholder="Confirm Password" />
									</div>
									<div class="form-inline">
										<div class="checkbox">
											<label> <input type="checkbox" class="form-check-input" />Remember
												me <i class="input-frame"></i>
											</label>
										</div>
									</div>
									<button type="submit" name="submit"
										class="btn btn-primary btn-block">Register</button>
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