<?php include('./layout/header.php'); ?>
<?php

if(isset($_POST['signin'])){
  $email = $_POST['email'];
  $password = $_POST['password'];
  $sqlQuery = "SELECT * FROM users WHERE email = :email LIMIT 1";
  $log = $db->prepare($sqlQuery);
  $log->execute(
      array(
          ':email' => $email
      )
  );
  echo "<script>alert('Email Not found');</script>";
  $output=$log->fetch(PDO::FETCH_ASSOC);
  if($log->rowCount() > 0){
    if(password_verify($password, $output['password'])){
      $id = $output['id'];
      $password = $output['password'];
      $email = $output['email'];
      $_SESSION['login'] = true;
      $_SESSION['id']=$id;
      $_SESSION['email']=$email;
      //echo "<script>alert('Working');</script>";
      header("location: ./index.php");
   }else{
    echo "<script>alert('password not match');</script>";
   }
      
  }else{
      // $result = "<p>Invalid credentials</p>";
      echo "<script>alert('credentials not match');</script>";
  }
}

?>

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="./assets/images/5.jpg">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<div class="breadcrumb__text">
					<h2>AfricaXYZ New Account</h2>
					<div class="breadcrumb__option">
						<a href="./index.php">Home</a>
						<span>Register Here</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Breadcrumb Section End -->



<!-- login Form Begin -->
<div class="contact-form spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="contact__form__title">
					<h2>Login</h2>
				</div>
			</div>
    </div>
    
		<div class="row">
			<div class="col-lg-12">
				<div class="contact__form__title">
					<div class="row">
						<div class="col-lg-4"></div>
						<div class="col-lg-4">
							<form method="POST" action="">
								<div class="row">
									<div class="col-lg-12">
										<input type="text" name="email" placeholder="Your Email" required>
									
                    <input type="password" name="password" placeholder="Your Password" required>
                    <button type="submit" name="signin" class="site-btn btn-block btn-sm">Signin</button>
									</div>
									
                </div>
                <div class="row">
                  <div class="col-lg-12 text-center">
                    <p>New account? <a href="./signup.php">Sign Up</a></p>
                  </div>
                </div>
							</form>
						</div>
						<div class="col-lg-4"></div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
<!-- login Form End -->

<?php include('./layout/footer.php'); ?>