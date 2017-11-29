<?php include("header.php");?>

<main>

	<table id="cart-table" cellpadding="12">
		<tr>
			<th>Item</th>
			<th>Quantity</th>
			<th>Price</th>
		</tr>
		<tr>
			<?php
			$total = 0.00;
				foreach($_SESSION['cart'] as $item){
					echo "<td> " . ucfirst($item->itemSize) . " ";
					if($item->itemCrust=="pan"){
						echo "Pan ";
					} else{
						echo "Hand-Tossed ";
					}
					echo " " .$item->itemName . "</td> ";
					echo "<td>" . $item->itemQuantity . "</td> ";
					echo "<td>$" . $item->itemPrice . "</td><br>";
					echo "</tr>";
					$total = $total + $item->itemPrice;
				}
			?>
		<td>
			<b>Total</b>
		</td>
		<td colspan=2 style="text-align: right;">
			<?php
				echo "$ " . $total;
			?>
		</td>
	</table>
	<br>
	<br>
	<div id="cart-buttons">
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
			<?php
				if ($_SESSION['cart'] !empty ) {
					echo "<button type='submit' id="clearCart" name='clearCart'>Clear Cart</button>";
					echo "<button type='submit' id="checkout" name='checkout'>Checkout</button>";
				}
			?>
		</form>

		<?php
				if(isset($_POST['clearCart'])){
					unset($_SESSION['cart']);
					header('Refresh: 0; URL = cart.php');
				}

				if(isset($_POST['checkout'])) {
					unset($_SESSION['cart']);
					header('Refresh: 0; URL = pizzatracker.php');
				}
		?>
	</div>
</main>

<?php include("footer.php");?>
