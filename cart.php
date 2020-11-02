<?php
include("./layout/header.php");

if(isset($_GET['remove'])){
  $remove = $_GET['remove'];
  foreach ($_SESSION['cart'] as $key => $value){
    if($value["product_id"] == $_GET['id']){
        unset($_SESSION['cart'][$key]);
        echo "<script>alert('Product has been Removed...!')</script>";
        echo "<script>window.location = 'cart.php'</script>";
    }
  }
}

// if (isset($_POST['remove'])){
//   if ($_GET['action'] == 'remove'){
//       foreach ($_SESSION['cart'] as $key => $value){
//           if($value["product_id"] == $_GET['id']){
//               unset($_SESSION['cart'][$key]);
//               echo "<script>alert('Product has been Removed...!')</script>";
//               echo "<script>window.location = 'cart.php'</script>";
//           }
//       }
//   }
// }

?>



  <!-- Breadcrumb Section Begin -->
  <section class="breadcrumb-section set-bg" data-setbg="./assets/images/5.jpg">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <div class="breadcrumb__text">
            <h2>AfricaXYZ Check-Out</h2>
            <div class="breadcrumb__option">
              <a href="./index.html">Home</a>
              <span>Check-Out</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Breadcrumb Section End -->





  <!-- Shoping Cart Section Begin -->
  <section class="shoping-cart spad">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="shoping__cart__table">
            <table>
              <thead>
                <tr>
                  <th class="shoping__product">Products</th>
                  <th>Price</th>
                  <!-- <th>Quantity</th>
                  <th>Total</th>
                  <th></th> -->
                </tr>
              </thead>
              <tbody>
                
              <?php 
              $total = 0;
              
              if (isset($_SESSION['cart'])):
                $product_id = array_column($_SESSION['cart'], "id");
                while($res = $data->fetch(PDO::FETCH_ASSOC)):
                ?>
                <form action="" method="POST">
                <?php foreach($product_id as $id): ?>
                  <?php if($res['id'] == $id):
                    $total = $total + (int)$res['price'];
                    
                    ?>
                
                <tr>
                  <td class="shoping__cart__item">
                    <img src="img/cart/cart-1.jpg" alt="">
                    <h5><?= $res['name'] ?></h5>
                  </td>
                  <td class="shoping__cart__price">
                  <?= $res['price'] ?>
                  </td>
                  <!-- <td class="shoping__cart__quantity">
                    <div class="quantity">
                      <div class="pro-qty">
                      <input type="text" value="1" name="qty">
                      </div>
                    </div>
                  </td>
                  <td class="shoping__cart__total">
                  <?= $total ?>
                  </td> -->
                </tr>
                
                <?php endif ?>
                </form>
                <?php endforeach ?>
                <?php endwhile ?>
                <?php else: ?>
                  <tr>
                    <td colspan="4"><div class="alert alert-warning alert-sm"><p>No Product added to cart</p></div></td>
                  </tr>
                
                <?php endif ?>
              </tbody>
            </table>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="shoping__cart__btns">
                <a href="./" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                <a href="./logout.php" type="submit" name="updatecart" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                  Clear Cart</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <?php if(isset($_SESSION['cart'])): 
            $count = count($_SESSION['cart']);
          ?>
          <div class="shoping__checkout">
          
            <h5>Cart Total (<?= $count ?> items)</h5>
            <ul>
              <li>Subtotal <span>$<?= $total;?></span></li>
              <li>Delivery  <span class="text-success">Free</span></li>
              <li>Total <span>$<?= $total;?></span></li>
            </ul>
            <a href="./checkout.php" class="primary-btn">PROCEED TO CHECKOUT</a>
          </div>
          <?php endif ?>
        </div>
      </div>
    </div>
  </section>
  <!-- Shoping Cart Section End -->




  <?php include("./layout/footer.php"); ?>