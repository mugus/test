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



  <!-- signup Form Begin -->
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
        <form method="POST" action="">
          <div class="col-lg-12 col-md-12">
            <div class="row">
              <div class="col-lg-6 col-md-6">
                <p>Email<span>*</span></p>
                <input type="text" name="email" placeholder="Your Email">
              </div>
              <div class="col-lg-6 col-md-6">
                <p>Password<span>*</span></p>
                <input type="password" name="password" placeholder="Your Password">
              </div>
            </div>
            <button type="submit" name="signin" class="site-btn btn-block">Signin</button>
          </div>
        </form>
        </div>
    </div>
   
  </div>
  </div>
  <!-- signup Form End -->


<!-- <form action="./signin.php" method="POST">
<input type="text" name="email" placeholder="Your Email">
<input type="password" name="password" placeholder="Your Password">
<button type="submit" name="signin">Signin</button>
</form> -->


  <!-- Footer Section Begin -->
  <footer class="footer spad">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="footer__about">
            <div class="footer__about__logo">
              <a href="./index.html"><img src="./assets/images/logo.png" alt=""></a>
            </div>
            <ul>
              <li>Address: 60-49 Road 11378 Kigali</li>
              <li>Phone: +65 11.188.888</li>
              <li>Email: africaxyz@info.com</li>
            </ul>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
          <div class="footer__widget">
            <h6>Useful Links</h6>
            <ul>
              <li><a href="#">About Us</a></li>
              <li><a href="#">Secure Shopping</a></li>
              <li><a href="#">Delivery infomation</a></li>
              <li><a href="#">Privacy Policy</a></li>
              <li><a href="#">Our Sitemap</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-4 col-md-12">
          <div class="footer__widget">
            <h6>Join Our Newsletter Now</h6>
            <p>Get E-mail updates about our latest shop and special offers.</p>
            <form action="#">
              <input type="text" placeholder="Enter your mail">
              <button type="submit" class="site-btn">Subscribe</button>
            </form>
            <div class="footer__widget__social">
              <a href="#"><i class="fa fa-facebook"></i></a>
              <a href="#"><i class="fa fa-instagram"></i></a>
              <a href="#"><i class="fa fa-twitter"></i></a>
              <a href="#"><i class="fa fa-pinterest"></i></a>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="footer__copyright">
            <div class="footer__copyright__text">
              <p> Copyright &copy;
                <script>document.write(new Date().getFullYear());</script> All rights reserved by <a
                  href="https://africa.xyz" target="_blank">AfricaXYZ</a></p>
            </div>
            <div class="footer__copyright__payment"><img src="./assets/images/payment-item.png" alt=""></div>
          </div>
        </div>
      </div>
    </div>
  </footer>



  <!-- Js Plugins -->
  <script src="./assets/js/jquery-3.3.1.min.js"></script>
  <script src="./assets/js/bootstrap.min.js"></script>
  <script src="./assets/js/jquery.nice-select.min.js"></script>
  <script src="./assets/js/jquery-ui.min.js"></script>
  <script src="./assets/js/jquery.slicknav.js"></script>
  <script src="./assets/js/mixitup.min.js"></script>
  <script src="./assets/js/owl.carousel.min.js"></script>
  <script src="./assets/js/main.js"></script>

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag() { dataLayer.push(arguments); }
    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
  </script>

</body>

</html>