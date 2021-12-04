<?php


	include('../../db.php');

	$stmt = $conn->query("SELECT * FROM lifting_value  ORDER BY sl ASC");
	

	

		//while($statt = $stmt -> fetch_assoc()){
			while($statt = $stmt->fetch_assoc()){

			 $id = $statt['sl'];
			 $vname = $statt['lift_name'];
			
			$output[] = array("vendor_id"=> $id, "vname"=> $vname);
		}

		echo json_encode($output);
	
	//$stmt->close();

?>