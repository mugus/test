<?php 
session_start();
include("./Config/db.php");
include("./config.php");
$data = $db->query("SELECT * FROM products ORDER BY id, id DESC");
$data->execute();
$countrow = $data->rowCount();

$payment = $db->query("SELECT * FROM payments");
$payment->execute();

if (isset($_SESSION['cart'])){
  $count = count($_SESSION['cart']);
}else{
  $zero = 0;
}

if (isset($_SESSION['email'])){
  $em = $_SESSION['email'];
  $sqlQuery = "SELECT * FROM users WHERE email=:email";
  $statement = $db->prepare($sqlQuery);
  $statement->execute(
      array(
          ':email' => $em
      )
  );			
  $rows=$statement->fetch(PDO::FETCH_ASSOC);
}



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
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta charset="UTF-8">
  <meta name="description" content="Ogani Template">
  <meta name="keywords" content="Ogani, unica, creative, html">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>AfricaXYZ | E-commerce</title>

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

  <!-- Css Styles -->
  <link rel="stylesheet" href="./assets/css/bootstrap.min.css" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- <link rel="stylesheet" href="./assets/css/font-awesome.min.css" type="text/css"> -->
  <link rel="stylesheet" href="./assets/css/elegant-icons.css" type="text/css">
  <link rel="stylesheet" href="./assets/css/nice-select.css" type="text/css">
  <link rel="stylesheet" href="./assets/css/jquery-ui.min.css" type="text/css">
  <link rel="stylesheet" href="./assets/css/owl.carousel.min.css" type="text/css">
  <link rel="stylesheet" href="./assets/css/slicknav.min.css" type="text/css">
  <link rel="stylesheet" href="./assets/css/style.css" type="text/css">
</head>

<body>
  <!-- Page Preloder -->
  <div id="preloder">
    <div class="loader"></div>
  </div>

  <!-- Humberger Begin -->
  <div class="humberger__menu__overlay"></div>
  <div class="humberger__menu__wrapper">
    <div class="humberger__menu__logo">
      <a href="#"><img src="./assets/images/logo.png" alt=""></a>
    </div>
    <div class="humberger__menu__widget">
      <div class="header__top__right__auth">
        <?php if (isset($_SESSION['email'])):?>
          <a href="./logout.php"><i class="fa fa-user"></i> Logout</a>
        <?php else: ?>
          <a href="./signin.php"><i class="fa fa-user"></i> Login</a>
        <?php endif ?>
        
      </div>
    </div>
    <nav class="humberger__menu__nav mobile-menu">
      <ul>
        <li class="active"><a href="./index.php">Home</a></li>
        <li><a href="./shop.php">Shop</a></li>  
        <li><a href="./add_product.php">Add Product</a></li>
        <li><a href="./contact.php">Contact</a></li>
      </ul>
    </nav>
    <div id="mobile-menu-wrap"></div>
    <div class="header__top__right__social">
      <a href="#"><i class="fa fa-facebook"></i></a>
      <a href="#"><i class="fa fa-twitter"></i></a>
      <a href="#"><i class="fa fa-linkedin"></i></a>
      <a href="#"><i class="fa fa-pinterest-p"></i></a>
    </div>
  </div>
  <!-- Humberger End -->

  <!-- Header Section Begin -->
  <header class="header">
    <div class="container">
      <div class="row">
        <div class="col-lg-3">
          <div class="header__logo">
            <a href="./index.php"><img src="./assets/images/logo.png" alt=""></a>
          </div>
        </div>
        <div class="col-lg-6">
          <nav class="header__menu">
            <ul>
              <li class="active"><a href="./index.php">Home</a></li>
              <li><a href="./shop.php">Shop</a></li>
              <li><a href="./add_product.php">Add Product</a></li>
              <li><a href="./contact.php">Contact</a></li>
            </ul>
          </nav>
        </div>
        <div class="col-lg-3">
          <div class="header__cart">
            <ul>
              <li><a href="./cart.php"><i class="fa fa-shopping-bag"></i> <span>
                <?php if (isset($_SESSION['cart'])): ?>
                    <?= $count ?>
                <?php else: ?>
                  <?= $zero ?>
                <?php endif ?>
                  </span></a></li>
            </ul>
            <div class="header__cart__price">
              <?php if (isset($_SESSION['email'])):?>
                <a href="./logout.php" class="site-btn">Sign Out</a>
              <?php else: ?>
                <a href="./signup.php" class="site-btn">Get An Account</a>
              <?php endif ?>
            </div>
          </div>
        </div>
      </div>
      <div class="humberger__open">
        <i class="fa fa-bars"></i>
      </div>
    </div>
  </header>
  <!-- Header Section End -->