<?php include("header.php");?>
	
<main>
		<?php
			foreach($_SESSION['cart'] as $item){
				echo $item->itemName;
			}
		?>
</main>
	
<?php include("footer.php");?>