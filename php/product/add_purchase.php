<?php
	include('../../db.php');

	

	
	$total = $_POST['total'];
	
	$pay = $_POST['pay'];
	$due = $_POST['due'];
	
	date_default_timezone_set("Asia/Dhaka");
	$date = date('Y-m-d');
	$month = date('m');
	$year = date('Y');


	

	$conn->query("INSERT INTO purchase(date,total,pay,due) VALUES('$date','$total','$pay','$due')");

	$last_id = $conn->insert_id;

	$relation_list = $_POST['data']; 

	for($i=0;$i<count($relation_list);$i++){
		$purchase_id = $last_id;
		$barcode = $relation_list[$i]['procode'];
		$buy_price = $relation_list[$i]['price'];
		$qty = $relation_list[$i]['qty'];
		$total = $relation_list[$i]['total_cost'];

		$dd = $conn-> query("SELECT * FROM product WHERE barcode='$barcode'");
		$ddd = $dd->fetch_assoc();
		$id = $ddd['product_id'];
		$name = $ddd['product_name'];

		$conn->query("INSERT INTO purchase_item(purchase_id,barcode,product_id,buy_price,qty,total,today_date,pur_month,pur_year) VALUES('$purchase_id','$barcode','$id','$buy_price','$qty','$total','$date','$month','$year')");
	}

	echo 1;
		

?>