<?php
include("./layout/header.php");
?>
<?php if(isset($_SESSION['cart'])):?>

<!-- Set up a container element for the button -->
<div class="container">
  <div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
      <div id="paypal-button-container"></div>
    </div>
    <div class="col-sm-4"></div>
  </div>
</div>


<!-- Include the PayPal JavaScript SDK -->
<script src="https://www.paypal.com/sdk/js?client-id=ATY6Ki_DVMfu87sD5r7YD4AtMyAZZyfUvVcMT5uqb1Q7AecJA4R312jq86dhVSyp3-Q7O37S1BM8hXpv&currency=USD"></script>
<?php 
    $total = 0;
    if (isset($_SESSION['cart'])):
    $product_id = array_column($_SESSION['cart'], "id");
    while($res = $data->fetch(PDO::FETCH_ASSOC)): ?>
    <?php foreach($product_id as $id): ?>
    <?php if($res['id'] == $id):
    $total = $total + (int)$res['price']; ?>
<script>
    // Render the PayPal button into #paypal-button-container
    paypal.Buttons({

        // Set up the transaction
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: '<?= $total;?>'
                    }
                }]
            });
        },

        // Finalize the transaction
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(details) {
                // Show a success message to the buyer
                //alert('Transaction completed by ' + details.payer.name.given_name + '!');
                window.location.href = './logout.php';
            });
        }


    }).render('#paypal-button-container');
</script>
<?php endif ?>
    <?php endforeach ?>
    <?php endwhile ?>
<?php endif ?>
<?php else: ?>

<script>
alert("Please select product");
window.location.href = './index.php';
</script>

<?php endif?>
<?php
include("./layout/footer.php");
?>