<?php
	include('../../db.php');

	

	
	$total = $_POST['total'];
	$lifting_value_id = $_POST['vendor'];
	
	
	
	date_default_timezone_set("Asia/Dhaka");
	$date = date('Y-m-d');
	$month = date('m');
	$year = date('Y');


	

	$conn->query("INSERT INTO lifting(lifting_value_id,date,total) VALUES('$lifting_value_id','$date','$total')");

	$last_id = $conn->insert_id;

	$relation_list = $_POST['data']; 

	for($i=0;$i<count($relation_list);$i++){
		$purchase_id = $last_id;
		$barcode = $relation_list[$i]['procode'];
		
		$sell_price = $relation_list[$i]['price'];
		$qty = $relation_list[$i]['qty'];
		$total = $relation_list[$i]['total_cost'];

		$dd = $conn-> query("SELECT * FROM product WHERE barcode='$barcode'");
		$ddd = $dd->fetch_assoc();
		$id = $ddd['product_id'];
		$pur_price = $ddd['price_cost'];
		$profi = $sell_price- $pur_price;
		$profit = $profi * $qty;
		$name = $ddd['product_name'];

		$conn->query("INSERT INTO lifting_item(lifting_id,lifting_value_id,barcode,product_id,sell_price,profit,qty,total,today_date,pur_month,pur_year) VALUES('$purchase_id','$lifting_value_id','$barcode','$id','$sell_price','$profit','$qty','$total','$date','$month','$year')");
	}

	echo 1;
		

?>