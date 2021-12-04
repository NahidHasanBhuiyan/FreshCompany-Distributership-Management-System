<?php


	include('../../db.php');

	$stmt = $conn->query("SELECT * FROM product ORDER BY product_id DESC");

	
	

	

		//while($statt = $stmt -> fetch_assoc()){
			while($statt = $stmt->fetch_assoc()){

			 $product_id = $statt['product_id'];
			 $product_name = $statt['product_name'];
			 $description = $statt['description'];
			 $barcode = $statt['barcode'];
			 $category_id = $statt['category_id'];
			 
			 
			 $dd_rate = $statt['price_cost'];
			 $tp_rate = $statt['price_retail'];
			 $commission = $tp_rate-$dd_rate;
			 $reorderlevel = $statt['reorderlevel'];
			 $qty = $statt['qty'];
			 
			 $status = $statt['status'];
			$output[] = array("product_id"=> $product_id, "product_name"=> $product_name, "description"=> $description,"barcode"=> $barcode, "category_id"=> $category_id,  "price_cost"=> $dd_rate, "commission"=> $commission, "price_retail"=> $tp_rate,"reorderlevel"=> $reorderlevel,"qty"=> $qty,  "status"=> $status);
		}

		echo json_encode($output);
	
	//$stmt->close();

?>