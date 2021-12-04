<?php
	include('../db.php');
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Fresh :: Add Lifting</title>

	<link rel="stylesheet" href="../components/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../components/bootstrap/dist/css/bootstrap.css">
	<link rel="stylesheet" href="../components/jquery-confirm-master/css/jquery-confirm.css">
	<link rel="stylesheet" href="http://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
</head>
<body>

		<?php
 			include('../header.php');

 		?>

 

	<div class="container">
		<div class="row">
			<div class="col-md-10">
				<table class="table table-bordered">
					<tr>
						<th>Product Name</th>
						<th>Product Quantity</th>
					</tr>
					<tr>
						<td>
							<input class="form-control" type="text" value="Oil 5 Litre" disabled>

						</td>
						<td>
							
							<input class="form-control" type="number" minimum='0'>
						</td>
					</tr>
					<tr>
						<td>
							<input class="form-control" type="text" value="Oil 2 Litre" disabled>

						</td>
						<td>
							
							<input class="form-control" type="number" minimum='0'>
						</td>
					</tr>
					<tr>
						<td>
							<input class="form-control" type="text" value="Oil 1 Litre" disabled>

						</td>
						<td>
							
							<input class="form-control" type="number" minimum='0'>
						</td>
					</tr>
					<tr>
						<td>
							<input class="form-control" type="text" value="Oil .5 Litre" disabled>

						</td>
						<td>
							
							<input class="form-control" type="number" minimum='0'>
						</td>
					</tr>
					<tr>
						<td></td>
						<td>
							<input class="btn btn-success" type="text" value="ADD" >

						
							
							<input class="btn btn-warning" type="text" value="RESET" >
						</td>
					</tr>
					
				</table>
			</div>
		</div>
	</div>

	<script src="../components/jquery/dist/jquery.js"></script>
	<script src="../components/jquery/dist/jquery.min.js"></script>
	<script src="../components/jquery.validate.min.js"></script>
	<script src="../components/bootstrap/dist/js/bootstrap.js"></script>
	<script src="../components/bootstrap/dist/js/bootstrap.min.js"></script>
	
	<script src="http://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

	<script src="../components/jquery-confirm-master/js/jquery-confirm.js"></script>

	
	
</body>
</html>