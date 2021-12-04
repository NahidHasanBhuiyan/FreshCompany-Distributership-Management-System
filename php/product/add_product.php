<?php
	include('../../db.php');

	$stmt = $conn->query("SELECT * FROM product ORDER BY product_id DESC");

	$bar = $conn->query("SELECT MAX(barcode) AS max FROM product");
	$code = $bar->fetch_assoc();
	$barCode = $code['max']+1;

	$productName = $_POST['productName'];
	$productDescription = $_POST['productDescription'];
	
	$category = $_POST['category'];
	
	
	$retailPrice = $_POST['retailPrice'];
	$costPrice = $_POST['costPrice'];
	$reorderLevel = $_POST['reorderLevel'];
	
	$status = $_POST['status'];

	$conn->query("INSERT INTO product(product_name,description,barcode,category_id,price_retail,price_cost,reorderlevel,status) VALUES('$productName','$productDescription','$barCode','$category','$retailPrice','$costPrice','$reorderLevel','$status')");

	echo 1;
		

?>