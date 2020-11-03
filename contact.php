<?php include("./layout/header.php"); ?>

  <!-- Breadcrumb Section Begin -->
  <section class="breadcrumb-section set-bg" data-setbg="./assets/images/5.jpg">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <div class="breadcrumb__text">
            <h2>AfricaXYZ contacts</h2>
            <div class="breadcrumb__option">
              <a href="./index.html">Home</a>
              <span>Contact</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Breadcrumb Section End -->


    <!-- Contact Section Begin -->
    <section class="contact spad">
      <div class="container">
          <div class="row">
              <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                  <div class="contact__widget">
                      <h4>Phone</h4>
                      <p>+01-3-8888-6868</p>
                  </div>
              </div>
              <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                  <div class="contact__widget">
                      <h4>Address</h4>
                      <p>KG 622</p>
                  </div>
              </div>
              <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                  <div class="contact__widget">
                      <h4>Open time</h4>
                      <p>24/7</p>
                  </div>
              </div>
              <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                  <div class="contact__widget">
                      <h4>Email</h4>
                      <p>AfricaXYZ@info.com</p>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!-- Contact Section End -->



    <!-- Contact Form Begin -->
    <div class="contact-form spad">
      <div class="container">
          <div class="row">
              <div class="col-lg-12">
                  <div class="contact__form__title">
                      <h2>Leave Message</h2>
                      <p>
                      
                      </p>
                  </div>
              </div>
          </div>
          <form method="POST" action="#">
              <div class="row">
                  <div class="col-lg-6 col-md-6">
                    <input
                      type="text"
                      name="name"
                      placeholder="Your name"
                      value="<?php if(isset($_SESSION['email'])){ echo $rows['firstname']." ".$rows['lastname']; }else{echo ""; } ?>"
                      <?php if(isset($_SESSION['email'])){ echo "disabled"; }else{echo ""; } ?>
                    >
                  </div>
                  <div class="col-lg-6 col-md-6">
                    <input 
                      type="text"
                      name="email"
                      placeholder="Your Email"
                      value="<?php if(isset($_SESSION['email'])){ echo $rows['email']; }else{echo ""; } ?>"
                      <?php if(isset($_SESSION['email'])){ echo "disabled"; }else{echo ""; } ?>
                      
                      >
                  </div>
                  <div class="col-lg-12 text-center">
                      <textarea name="message" placeholder="Your message"></textarea>
                      <button type="submit" name="send" class="site-btn">SEND MESSAGE</button>
                  </div>
              </div>
          </form>
      </div>
  </div>
  <!-- Contact Form End -->





  <?php include("./layout/footer.php"); ?>