 <?php include("./layout/header.php"); ?>

<?php
if(isset($_POST['checkout'])): 
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
	$country = $_POST['country'];
  $total = $_POST['total'];
  
  try{
    $sql = "INSERT INTO payments (firstname,lastname,email, phone, country, total) 
            VALUES (:firstname,:lastname,:email, :phone, :country, :total)";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':firstname', $firstname);
    $stmt->bindParam(':lastname', $lastname);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':country', $country);
    $stmt->bindParam(':total', $total);
    $stmt->execute();


    if($stmt->rowCount()==1){
      $id = $db->lastInsertId();
      $to=$email;
      $subject="Thanks to shop with us";
      $from = 'AfricaXYZ';
      $message = "<h1>Confirmation of purchase</h1>";
      $message .= '<p>Thank for choosing us!</p>';
      $headers = "From:".$from;
      $headers .= "MIME-Version: 1.0\r\n";
      $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
      mail($to,$subject,$message,$headers);

      echo "<script LANGUAGE='JavaScript'> window.location.href = './paypal.php';</script>";
      
      // header("location: ./verify.php");
    }else{
      echo "<script>alert('not added');</script>";
    }
}catch(PDOException $ex){
    $result = "<p>Error occured: ".$ex->getMessage()."</p>";
}
?>
  
<?php
endif
?>













<?php if (isset($_SESSION['cart'])): ?>


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
        <h4>Billing Details</h4>
        <form method="POST" action="">
          <div class="row">
            <div class="col-lg-8 col-md-6">
              <div class="row">
                <div class="col-lg-6">
                  <div class="checkout__input">
                    <p>Fist Name<span>*</span></p>
                    <input type="text" name="firstname" required>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="checkout__input">
                    <p>Last Name<span>*</span></p>
                    <input type="text" name="lastname" required>
                  </div>
                </div>
              </div>
              <div class="checkout__input">
                <p>Country<span>*</span></p>
                <input type="text" name="country" required>
              </div>
              <div class="checkout__input">
                <p>Address<span>*</span></p>
                <input type="text" placeholder="Street Address" class="checkout__input__add">
                <input type="text" placeholder="Apartment, suite, unite ect (optinal)">
              </div>
              <div class="checkout__input">
                <p>Town/City<span>*</span></p>
                <input type="text" name="city">
              </div>
              <div class="checkout__input">
                <p>Postcode / ZIP<span>*</span></p>
                <input type="text" name="zipcode">
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="checkout__input">
                    <p>Phone<span>*</span></p>
                    <input type="text" name="phone" required>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="checkout__input">
                    <p>Email<span>*</span></p>
                    <input type="text" name="email" required>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
         
              <div class="checkout__order">
                <h4>Your Order</h4>
                <div class="checkout__order__products">Products <span>Total</span></div>
                
                <?php 
                $total = 0;
                if (isset($_SESSION['cart'])):
                $product_id = array_column($_SESSION['cart'], "id");
                while($res = $data->fetch(PDO::FETCH_ASSOC)):
                  foreach($product_id as $id):
                    if($res['id'] == $id):
                      $total = $total + (int)$res['price']; ?>
                      <ul>
                        <li><?= $res['name']; ?> <span>$<?= $res['price']; ?></span></li>
                      </ul>
                    <?php endif ?>
                    <?php endforeach ?>
                  <?php endwhile ?>
                <?php endif ?>
                <?php if(isset($_SESSION['cart'])): 
                //$count = count($_SESSION['cart']);
                  ?>
                <div class="checkout__order__total">Total <span>$<?= $total; ?></span></div>
                <p>Proceed payment using PayPal.</p>
                <input type="hidden" name="total" value="<?= $total; ?>">
                <button type="submit" class="site-btn" name="checkout">Continue Check out</button>
                <?php endif ?>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
  <!-- Checkout Section End -->

  <?php else: ?>

<script>
alert("Please select product");
window.location.href = './index.php';
</script>

<?php endif?>
 <?php include("./layout/footer.php"); ?>