<?php

	include('../../db.php');
	$sl = $_POST['id'];
	$stmt = $conn->query("SELECT * FROM product WHERE product_id='$sl'");

	while($stmm = $stmt->fetch_assoc()){
		 $product_id = $stmm['product_id'];
			 $product_name = $stmm['product_name'];
			 $description = $stmm['description'];
			 $barcode = $stmm['barcode'];
			 $category_id = $stmm['category_id'];
			 
			 $price_retail = $stmm['price_retail'];
			 $price_cost = $stmm['price_cost'];
			 $reorderlevel = $stmm['reorderlevel'];
			
			 $status = $stmm['status'];
			$output = array("product_id"=> $product_id, "product_name"=> $product_name, "description"=> $description,"barcode"=> $barcode, "category_id"=> $category_id,  "price_retail"=> $price_retail, "price_cost"=> $price_cost,"reorderlevel"=> $reorderlevel,  "status"=> $status);
	}
	echo json_encode($output);

?>