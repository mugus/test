<?php
include("./layout/header.php");
?>















  <!-- Breadcrumb Section Begin -->
  <section class="breadcrumb-section set-bg" data-setbg="./assets/images/5.jpg">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <div class="breadcrumb__text">
            <h2>AfricaXYZ Checkout</h2>
            <div class="breadcrumb__option">
              <a href="./index.html">Home</a>
              <span>Checkout</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Breadcrumb Section End -->

  <!-- Checkout Section Begin -->
  <section class="checkout spad">
    <div class="container">
      <div class="checkout__form">
        <h4>Add Product</h4>
        <form action="#">
          <div class="row">
            <div class="col-lg-8 col-md-6">
              <div class="row">
                <div class="col-lg-6">
                  <div class="checkout__input">
                    <p>Product Name<span>*</span></p>
                    <input type="text">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="checkout__input">
                    <p>Product Price<span>*</span></p>
                    <input type="text">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-6">
                  <div class="checkout__input">
                    <p>Product Size<span>*</span></p>
                    <input type="text" name="size" placeholder="Product size">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="checkout__input">
                    <p>Product Quantity<span>*</span></p>
                    <input type="number" name="quantity" placeholder="Quantity(Stock)">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12">
                  <div class="checkout__input">
                    <textarea class="form-control" name="" id="" cols="10" rows="4" placeholder="Product Description ...."></textarea>
                  </div> 
                </div>
                <div class="col-lg-12">
                  <div class="checkout__input">
                    <button type="submit"  class="site-btn">Add Product</button>
                  </div> 
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
  <!-- Checkout Section End -->

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