<?php include("./layout/header.php") ?>

  <!-- Breadcrumb Section Begin -->
  <section class="breadcrumb-section set-bg" data-setbg="./assets/images/5.jpg">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <div class="breadcrumb__text">
            <h2>Thank You! AfricaXYZ</h2>
            <div class="breadcrumb__option">
              <a href="./index.php">Home</a>
              <span>Success</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php
if(isset($_SESSION['payment_id'])):
  $id = $_SESSION['payment_id'];
  $sqlQuery = "SELECT * FROM payments WHERE payment_id = :payment_id";
      $statement = $db->prepare($sqlQuery);
      $statement->execute(
          array(
              ':payment_id' => $id
          )
      );			
      $row=$statement->fetch(PDO::FETCH_ASSOC);
?>
<div class="container">
  <div class="row">
      <div class="col-sm-4"></div>
      <div class="col-sm-4">
        <h4>Hi <?= $row['firstname'] ?> <?= $row['lastname'] ?>,</h4>
        <p>We got your order! We will let you know when it ships and is headed your way</p>
        <p>You payed $<?= $row['total'] ?></p>
        <hr>
        <a href="./logout.php" class="btn btn-primary btn-sm btn-block">Back to Shop</a>
<br>
      </div>
      <div class="col-sm-4"></div>
  </div>
</div>

<?php else: ?>
  <script>
  window.location.href='./logout.php';
  alert('No payment');
  </script>";
<?php endif ?>

  <!-- Breadcrumb Section End -->

<?php include("./layout/footer.php") ?>