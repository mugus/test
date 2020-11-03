<?php include("./layout/header.php"); ?>

<?php if (isset($_SESSION['email'])): ?>


<div class="container">
	<div class="row">
		<div class="col-sm-12">
		<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" data-toggle="tab" href="#transaction">Transactions</a>
  </li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane container active" id="transaction">
		
	<table id="table_id" class="display">
    <thead>
        <tr>
            <th>Product name</th>
						<th>Total Amount Payed</th>
						<th>Date</th>
        </tr>
    </thead>
    <tbody>
		<?php while($result = $payment->fetch(PDO::FETCH_ASSOC)): ?>
        <tr>
            <td>test</td>
						<td><?= $result['total'] ?></td>
						<td><?= $result['date'] ?></td>
				</tr>
				<?php endwhile ?>
    </tbody>
</table>

	</div>
</div>
		</div>
	</div>
</div>







<?php else:?>

<script>
window.location.href='./signin.php';
alert('Login first');
</script>

<?php endif ?>


<?php include("./layout/footer.php"); ?>
<script>
	$(document).ready( function () {
    $('#table_id').DataTable();
} );
</script>