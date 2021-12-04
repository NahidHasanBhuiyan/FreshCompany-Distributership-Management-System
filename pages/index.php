<?php

	include('../db.php');

	date_default_timezone_set('ASIA/DHAKA');
	$date = date('Y-m-d');

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Fresh Management Software</title>

	<link rel="stylesheet" href="../components/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../components/bootstrap/dist/css/bootstrap.css">
	<link rel="stylesheet" href="../components/jquery-confirm-master/css/jquery-confirm.css">
	<link rel="stylesheet" href="http://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">

	</style>   <link href="https://fonts.googleapis.com/css?family=Patua+One&display=swap" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js" integrity="sha384-FzT3vTVGXqf7wRfy8k4BiyzvbNfeYjK+frTVqZeNDFl8woCbF0CYG6g2fMEFFo/i" crossorigin="anonymous"></script>
</head>
<body>

		<?php
 			include('../header.php');

 		?>

 		
		

		
 		
 	<div class="container" >
 		<div class="row">
 			<div class="col-md-12">
 				<p style="background-color: #00bfff; width: 100%" class="alert bg-success text-right">Date:  <?php echo $date?></p>
 			</div>
 		</div>
		<div class="panel" >
			<div class="row">
				<div class="col-md-12">
					<div class="row">
						
	    				<div class="col-md-3">
						<div class="panel panel-success"> 
				    		  
				    		  <div class="panel-body bg-success">
				    		  	<p class="panel-heading "><strong>Lifting (1st Teep)</strong></p>

				    		  	<?php
				    		  		$lift = $conn-> query("SELECT SUM(total) as total1 from lifting_item WHERE lifting_value_id='2' AND today_date='$date'");
				    		  		$liftt = $lift->fetch_assoc();
				    		  		$lift_first = $liftt['total1'];

				    		  	?>
				    		  	
				    		  	
				    		      
				    		  </div> 
				    		  <div class="panel-footer" style="background-color: #00bfff; color: #fff">
				    		      <h4 class="text-right " >BDT <span class="counter"><?php echo $lift_first;?></span></h4>
				    		  </div>
				    	</div> 
	    				</div>
	    				<div class="col-md-3">
							<div class="panel panel-success"> 
					    		  
					    		  <div class="panel-body bg-success">
					    		  	<p class="panel-heading"><strong>Lifting (2nd Teep)</strong></p>

					    		  	<?php
					    		  		$lift = $conn-> query("SELECT SUM(total) as total1 from lifting_item WHERE lifting_value_id='3' AND today_date='$date'");
					    		  		$liftt = $lift->fetch_assoc();
					    		  		$lift_second = $liftt['total1'];

				    		  		?>
					    		  	
					    		      
					    		  </div> 
					    		  <div class="panel-footer" style="background-color: #00bfff; color: #fff">
					    		      <h4 class="text-right " >BDT <span class="counter"><?php echo $lift_second?></span></h4>
					    		  </div>
					    	</div> 
	    				</div>
	    				<div class="col-md-3">
							<div class="panel panel-success"> 
					    		  
					    		  <div class="panel-body bg-success">
					    		  	<p class="panel-heading"><strong>Lifting (Counter)</strong></p>
					    		  	<?php
					    		  		$lift = $conn-> query("SELECT SUM(total) as total1 from lifting_item WHERE lifting_value_id='1' AND today_date='$date'");
					    		  		$liftt = $lift->fetch_assoc();
					    		  		$lift_count = $liftt['total1'];

				    		  		?>
					    		      
					    		  </div> 
					    		  <div class="panel-footer" style="background-color: #00bfff; color: #fff">
					    		      <h4 class="text-right " >BDT <span class="counter"><?php echo $lift_count;?></span></h4>
					    		  </div>
					    	</div> 
	    				</div>
	    				<div class="col-md-3">
							<div class="panel panel-success"> 
				    		  
				    		  <div class="panel-body bg-success">
				    		  	<p class="panel-heading "><strong>Purchase Value</strong></p>

				    		  	<?php
					    		  		$pur = $conn-> query("SELECT SUM(total) as total1 from purchase_item WHERE today_date='$date'");
					    		  		$purch = $pur->fetch_assoc();
					    		  		$purchase = $purch['total1'];

				    		  	?>
				    		  	

				    		  	
				    		      
				    		      
				    		  </div> 
				    		  <div class="panel-footer" style="background-color: #00bfff; color: #fff">
				    		      <h4 class="text-right " >BDT <span class="counter"><?php echo $purchase;?></span></h4>
				    		  </div>
				    		</div> 
	    				</div>
					</div>
				

					<div class="row">
						<div class="col-md-3">
							<div class="panel panel-success"> 
				    		  
				    		  <div class="panel-body bg-success">
				    		  	<p class="panel-heading"><strong>Return (1st Teep)</strong></p>
				    		  	
				    		  	<?php
				    		  		$ret = $conn-> query("SELECT SUM(total) as total1 from return_item WHERE return_value_id='2' AND today_date='$date'");
				    		  		$return = $ret->fetch_assoc();
				    		  		$ret_first = $return['total1'];

				    		  	?>
				    		      
				    		      
				    		  </div> 
				    		  <div class="panel-footer" style="background-color: #00bfff; color: #fff">
				    		      <h4 class="text-right " >BDT <span class="counter"><?php echo $ret_first;?></span></h4>
				    		  </div>
				    		</div> 
	    				</div>
	    				<div class="col-md-3">
							<div class="panel panel-success"> 
					    		  
					    		  <div class="panel-body bg-success">
					    		  	<p class="panel-heading"><strong>Return (2nd Teep)</strong></p>
					    		  	
					    		  	<?php
					    		  		$ret = $conn-> query("SELECT SUM(total) as total1 from return_item WHERE return_value_id='3' AND today_date='$date'");
					    		  		$return = $ret->fetch_assoc();
					    		  		$ret_second = $return['total1'];

				    		  		?>
					    		      
					    		  </div> 
					    		  <div class="panel-footer" style="background-color: #00bfff; color: #fff">
					    		      <h4 class="text-right " >BDT <span class="counter"><?php echo $ret_second?></span></h4>
					    		  </div>
					    	</div> 
	    				</div>
	    				<div class="col-md-3">
							<div class="panel panel-success"> 
					    		  
					    		  <div class="panel-body bg-success">
					    		  	<p class="panel-heading"><strong>Return (Counter)</strong></p>
					    		  	<?php
					    		  		$ret = $conn-> query("SELECT SUM(total) as total1 from return_item WHERE return_value_id='1' AND today_date='$date'");
					    		  		$return = $ret->fetch_assoc();
					    		  		$ret_count = $return['total1'];

				    		  		?>
					    		      
					    		  </div> 
					    		  <div class="panel-footer" style="background-color: #00bfff; color: #fff">
					    		      <h4 class="text-right " >BDT <span class="counter"><?php echo $ret_count;?></span></h4>
					    		  </div>
					    	</div> 
	    				</div>

	    				<div class="col-md-3">
							<div class="panel panel-success"> 
					    		  
					    		  <div class="panel-body bg-success">
					    		  	<p class="panel-heading"><strong>Profit</strong></p>
					    		  	
					    		  	<?php
					    		  		$lift = $conn-> query("SELECT SUM(profit) as profitLift from lifting_item WHERE today_date='$date'");
					    		  		$liftpro = $lift->fetch_assoc();
					    		  		$lift_profit = $liftpro['profitLift'];


					    		  		$ret = $conn-> query("SELECT SUM(profit) as profitLift from return_item WHERE today_date='$date'");
					    		  		$retpro = $ret->fetch_assoc();
					    		  		$ret_profit = $retpro['profitLift'];

					    		  		$profit = $lift_profit-$ret_profit;

				    		  		?>
					    		      
					    		  </div> 
					    		  <div class="panel-footer" style="background-color: #00bfff; color: #fff">
					    		      <h4 class="text-right " >BDT <span class="counter"><?php echo $profit;?></span></h4>
					    		  </div>
					    	</div> 
	    				</div>
	    				
					</div>

								<div class="row">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-3">
							<div class="panel panel-success"> 
				    		  
				    		  <div class="panel-body bg-success">
				    		  	<p class="panel-heading "><strong>Sell (1st Teep)</strong></p>


				    		  	<?php
					    		  		$lift = $conn-> query("SELECT SUM(total) as total1 from lifting_item WHERE today_date='$date' AND lifting_value_id='2'");
					    		  		$liftsell = $lift->fetch_assoc();
					    		  		$lift_sell = $liftsell['total1'];


					    		  		$ret = $conn-> query("SELECT SUM(total) as total2 from return_item WHERE today_date='$date' AND return_value_id='2'");
					    		  		$retsell = $ret->fetch_assoc();
					    		  		$ret_sell = $retsell['total2'];

					    		  		$sell = $lift_sell-$ret_sell;

				    		  		?>
				    		  	
				    		      
				    		      
				    		  </div> 
				    		  <div class="panel-footer" style="background-color: #00bfff; color: #fff">
				    		      <h4 class="text-right " >BDT <span class="counter"><?php echo $sell;?></span></h4>
				    		  </div>
				    		</div> 
	    				</div>
	    				<div class="col-md-3">
						<div class="panel panel-success"> 
				    		  
				    		  <div class="panel-body bg-success">
				    		  	<p class="panel-heading "><strong>Sell (2st Teep)</strong></p>
				    		  	
				    		  	<?php
					    		  		$lift = $conn-> query("SELECT SUM(total) as total1 from lifting_item WHERE today_date='$date' AND lifting_value_id='3'");
					    		  		$liftsell = $lift->fetch_assoc();
					    		  		$lift_sell = $liftsell['total1'];


					    		  		$ret = $conn-> query("SELECT SUM(total) as total2 from return_item WHERE today_date='$date' AND return_value_id='3'");
					    		  		$retsell = $ret->fetch_assoc();
					    		  		$ret_sell = $retsell['total2'];

					    		  		$sell = $lift_sell-$ret_sell;

				    		  		?>
				    		      
				    		  </div> 
				    		  <div class="panel-footer" style="background-color: #00bfff; color: #fff">
				    		      <h4 class="text-right " >BDT <span class="counter"><?php echo $sell?></span></h4>
				    		  </div>
				    	</div> 
	    				</div>
	    				<div class="col-md-3">
							<div class="panel panel-success"> 
					    		  
					    		  <div class="panel-body bg-success">
					    		  	<p class="panel-heading"><strong>Sell (Counter)</strong></p>
					    		  	<?php
					    		  		$lift = $conn-> query("SELECT SUM(total) as total1 from lifting_item WHERE today_date='$date' AND lifting_value_id='1'");
					    		  		$liftsell = $lift->fetch_assoc();
					    		  		$lift_sell = $liftsell['total1'];


					    		  		$ret = $conn-> query("SELECT SUM(total) as total2 from return_item WHERE today_date='$date' AND return_value_id='1'");
					    		  		$retsell = $ret->fetch_assoc();
					    		  		$ret_sell = $retsell['total2'];

					    		  		$sell = $lift_sell-$ret_sell;

				    		  		?>
					    		      
					    		  </div> 
					    		  <div class="panel-footer" style="background-color: #00bfff; color: #fff">
					    		      <h4 class="text-right " >BDT <span class="counter"><?php echo $sell?></span></h4>
					    		  </div>
					    	</div> 
	    				</div>
	    				<div class="col-md-3">
							<div class="panel panel-success"> 
					    		  
					    		  <div class="panel-body bg-success">
					    		  	<p class="panel-heading"><strong>Stock Value</strong></p>

					    		  	<?php

											


											
											
												$dd = $conn-> query("SELECT * FROM product ORDER BY product_id ASC");
											
												
												$sum = 0;
												while($ddd = $dd->fetch_assoc()){

													$product_id = $ddd['product_id'];
													$current_rate = $ddd['price_retail'];
													$comp_rate = $ddd['price_cost']; 
													$purch = $conn->query("SELECT SUM(qty) as quantity3 from purchase_item WHERE product_id='$product_id'");
													$purchase = $purch->fetch_assoc();

													$pur_qty = $purchase['quantity3'];
													

													$lift = $conn-> query("SELECT SUM(qty) as quantity, SUM(total) as total from lifting_item WHERE product_id='$product_id'");
													$lift_qt = $lift->fetch_assoc();

													$lift_qty = $lift_qt['quantity'];
													$lift_total = $lift_qt['total'];

													$ret = $conn->query("SELECT SUM(qty) as quantity1,SUM(total) as total1 from return_item WHERE product_id='$product_id'");
													$return_qt = $ret->fetch_assoc();

													$return_qty = $return_qt['quantity1'];
													$return_total = $return_qt['total1'];

													$stock = $pur_qty - ($lift_qty- $return_qty);
													$market_value = $stock*$current_rate;
													
													$sum = $sum + $market_value;
												
												}
													

											?>
					    		  	
					    		      
					    		  </div> 
					    		  <div class="panel-footer" style="background-color: #00bfff; color: #fff">
					    		      <h4 class="text-right " >BDT <span class="counter"><?php echo $sum?></span></h4>
					    		  </div>
					    	</div> 
	    				</div>
					</div>

				</div>
    			

    		</div>
    	</div>
    </div>	
		
	





		

		

 

	

	

	<!-- counter-->

	<script src="../components/counter/js/jquery.min.js"></script>
	<script src="../components/counter/js/jquery.counterup.js"></script>
	<script src="../components/counter/js/waypoints.js"></script>
	<script src="../components/counter/js/bootstrap.min.js"></script>
	<script src="../components/counter/js/custom.js"></script>
	
	<script src="../components/counter/js/slick.js"></script>

<!-- counter end-->
	
</body>
</html>