<?php 
	function checkDiscount($purchaseValue){
		$amount = $purchaseValue;
		$discountPercentage = "";
		$discountDesc = "";
		$totalPrice = "";
		$discountActive = false;
		if($amount >= 500.00){
			$discountPercentage = 10;
			$discountActive = true;
		}else if($amount >= 100.00 && $amount <= 499.99){
			$discountPercentage = 5;
			$discountActive = true;
		}else if($amount < 100){
			$discountActive = false;
		}

		if($discountActive){
			$totalPrice = $amount - ($amount * $discountPercentage / 100);
			$discountDesc = "Purchase Value is $amount, discount is ".$discountPercentage."%";
		}else{
			$totalPrice = $amount;
			$discountDesc = "Purchase Value is $amount, there are no discount.";
		}                         
			
		echo $discountDesc;
        echo "<br>";
        echo "Grand Total: ".$totalPrice;
	}
?>

<html>
    <head>
        <title>Question 2</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body>

        <div class="container" style="margin-top:60px;text-align:center;">
            <form action="index.php" method="GET">
                <input type="number" name="amount" value="<?php echo (!empty($_GET['amount'])) ? $_GET['amount']: '';?>">
                <input type="submit" value="Check Discount">
            </form>

            <?php
                if(isset($_GET["amount"])){
                    if(!empty($_GET["amount"])){
                        checkDiscount($_GET["amount"]);
                    }
                }
            ?>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>

    </body>
</html>