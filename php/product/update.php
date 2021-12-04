<?php

	include('../../db.php');

	$sl = $_POST['id'];
	$productName = $_POST['productName'];
	$productDescription = $_POST['productDescription'];
	$barcode = $_POST['barcode'];
	$category = $_POST['category'];
	
	$retailPrice = $_POST['retailPrice'];
	$costPrice = $_POST['costPrice'];
	$reorderLevel = $_POST['reorderLevel'];
	
	$status = $_POST['status'];

	$conn->query("UPDATE product set product_name='$productName', description='$productDescription',barcode='$barcode', category_id='$category',price_retail='$retailPrice',price_cost='$costPrice', reorderlevel='$reorderLevel',status='$status' WHERE product_id='$sl'");

	

	echo 1;
	
?>