<?php
include("./layout/header.php");
?>



  <!-- Breadcrumb Section Begin -->
  <section class="breadcrumb-section set-bg" data-setbg="./assets/images/5.jpg">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <div class="breadcrumb__text">
            <h2>AfricaXYZ Shop</h2>
            <div class="breadcrumb__option">
              <a href="./index.html">Home</a>
              <span>Shop</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Breadcrumb Section End -->

  <!-- Product Section Begin -->
  <section class="product spad">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-5">
          <div class="sidebar">
            <div class="sidebar__item">
              <h4>Department</h4>
              <ul>
                <li><a href="#">Men's Cloth</a></li>
                <li><a href="#">Women's cloth</a></li>
                <li><a href="#">Men's shoes</a></li>
                <li><a href="#">Women's shoes</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-9 col-md-7">
          <div class="filter__item">
            <div class="row">
              <div class="col-lg-6 col-md-7">
                <div class="filter__sort">
                  <span>Our Shop</span>
                </div>
              </div>
              <div class="col-lg-6 col-md-5">
                <div class="filter__found">
                  <h6><span><?= $countrow ?></span> Products found</h6>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
          <?php while($result = $data->fetch(PDO::FETCH_ASSOC)): ?>
            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="product__item">
                <div class="product__item__pic set-bg" data-setbg="./assets/images/women.jpg">
                  <ul class="product__item__pic__hover">
                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                  </ul>
                </div>
                <div class="product__item__text">
                  <h6><a href="#"><?= $result['name'] ?></a></h6>
                  <h5><?= $result['currency'] ?><?= $result['price'] ?></h5>
                </div>
              </div>
            </div>
            <?php endwhile ?>
          </div>
          <div class="product__pagination">
            <a href="#">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#"><i class="fa fa-long-arrow-right"></i></a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Product Section End -->





  <?php
include("./layout/footer.php");
?>