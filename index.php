<?php
include("./layout/header.php");

if (isset($_POST['add'])){
  /// print_r($_POST['id']);
  if(isset($_SESSION['cart'])){

      $item_array_id = array_column($_SESSION['cart'], "id");

      if(in_array($_POST['id'], $item_array_id)){
          echo "<script>alert('Product is already added in the cart..!')</script>";
          echo "<script>window.location = 'index.php'</script>";
      }else{

          $count = count($_SESSION['cart']);
          $item_array = array(
              'id' => $_POST['id']
          );

          $_SESSION['cart'][$count] = $item_array;
          //print_r($_SESSION['cart']);
      }
      echo "<script>window.location = 'index.php'</script>";
  }else{

      $item_array = array(
              'id' => $_POST['id']
      );

      // Create new session variable
      $_SESSION['cart'][0] = $item_array;
      //print_r($_SESSION['cart']);
      echo "<script>window.location = 'index.php'</script>";
  }
}






// if(isset($_GET['id'])){
//   $id = $_GET['id'];
//   $_SESSION['cart'] = $id;
//   if(isset($_SESSION['cart'])){
//     $cart = [];
//     $car = $db->query("SELECT * FROM products WHERE id=$id");
//     $car->execute();
//     $row=$car->fetch(PDO::FETCH_ASSOC);
//     $count = $car->rowCount();
//     print_r($row['price']);
//   }else{
//     echo "Not set";
//   }
// }
if(!isset($_SESSION['payment_id'])):
?>


  <!-- Hero Section Begin -->
  <section class="hero">
    <div class="container">
      <div class="row">
        <div class="col-lg-3">
          <div class="hero__categories">
            <div class="hero__categories__all">
              <i class="fa fa-bars"></i>
              <span>All departments</span>
            </div>
            <ul>
              <li><a href="#">Men's Cloth</a></li>
              <li><a href="#">Women's cloth</a></li>
              <li><a href="#">Men's shoes</a></li>
              <li><a href="#">Women's shoes</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-9">
          <div class="hero__search">
            <div class="hero__search__form">
              <form action="#">
                <div class="hero__search__categories">
                  <?php if (isset($_SESSION['email'])):?>
                    <h5><?= $rows['firstname'] ?></h5>
                  <?php else: ?>
                    Categories
                  <?php endif ?>
                </div>
                <input type="text" placeholder="What do yo u need?">
                <button type="submit" class="site-btn">SEARCH</button>
              </form>
            </div>
            <div class="hero__search__phone">
              <div class="hero__search__phone__icon">
                <i class="fa fa-phone"></i>
              </div>
              <div class="hero__search__phone__text">
                <h5>+65 11.188.888</h5>
                <span>support 24/7 time</span>
              </div>
            </div>
          </div>
          <div class="hero__item set-bg" data-setbg="./assets/images/photo.jpg">
            <div class="hero__text">
              <span class="text-warning">AFRICAN STYLES</span>
              <h2 class="text-warning">100% <br/> Made in Africa</h2>
              <p class="text-white">Free Pickup and Delivery Available</p>
              <a href="./shop.php" class="primary-btn">SHOP NOW</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Hero Section End -->
  <!-- Categories Section Begin -->
  <section class="categories">
    <div class="container">
      <div class="row">
        <div class="categories__slider owl-carousel">
          <div class="col-lg-3">
            <div class="categories__item set-bg" data-setbg="./assets/images/men_c.jpg">
              <h5><a href="#">Men's Cloth</a></h5>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="categories__item set-bg" data-setbg="./assets/images/7.jpg">
              <h5><a href="#">
                  <h5><a href="#">Women's Cloth</a></h5>
                </a></h5>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="categories__item set-bg" data-setbg="./assets/images/women.jpg">
              <h5><a href="#">Women's Cloth</a></h5>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="categories__item set-bg" data-setbg="./assets/images/men_t.jpg">
              <h5><a href="#">Men's Cloth</a></h5>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="categories__item set-bg" data-setbg="./assets/images/5.jpg">
              <h5><a href="#">
                  <h5><a href="#">Women's Cloth</a></h5>
                </a></h5>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Categories Section End -->



  <!-- Featured Section Begin -->
  <section class="featured spad">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-title">
            <h2>Featured Product</h2>
          </div>
          <div class="featured__controls">
            <ul>
              <li class="active" data-filter="*">All(Popular 8)</li>
            </ul>
          </div>
        </div>
      </div>
      <div class="row featured__filter">
      <?php 
        $counter = 0;
        $max = 6;
        while($res = $data->fetch(PDO::FETCH_ASSOC)  AND ($counter < $max)): 
          $counter++;
      ?>

        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="featured__item">
            <div class="featured__item__pic set-bg" data-setbg="./assets/images/men_t.jpg">
              <ul class="featured__item__pic__hover">
              <li>
                <form action="" method="post">
                  <input type="hidden" name="id" value="<?= $res['id'] ?>">
                <button type="submit" name="add"><a><i class="fa fa-shopping-cart"></i></a></button>
                </form>
              </li>
                <!-- <li><a><i class="fa fa-shopping-cart"></i></a></li> -->
              </ul>
            </div>
            <div class="featured__item__text">
              <h6><a href="#"><?= $res['name'] ?></a></h6>
              <h5><?= $res['currency'] ?>&nbsp;<?= $res['price'] ?></h5>
            </div>
          </div>
        </div>
        <?php endwhile ?>

      </div>
    </div>
  </section>
  <!-- Featured Section End -->

<?php else: ?>

  <script LANGUAGE='JavaScript'>
alert("You have pending payment! lets remove it for you");
window.location.href='./logout.php';
</script>

<?php endif ?>

<?php include("./layout/footer.php"); ?>