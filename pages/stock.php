<?php

	include('../db.php');


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Fresh :: Update Stock</title>

	<link rel="stylesheet" href="../components/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../components/bootstrap/dist/css/bootstrap.css">
	<link rel="stylesheet" href="../components/jquery-confirm-master/css/jquery-confirm.css">
	<!-- data-table CSS
		============================================ -->
    <link rel="stylesheet" href="../components/data-table/bootstrap-table.css">
    <link rel="stylesheet" href="../components/data-table/bootstrap-editable.css">
    <link rel="stylesheet" href="../components/data-table/style.css">
</head>
<body>

	<?php
		include('../header.php');
	?>

	
	<div class="panel panel-info" style="margin-top: 20px">
			 <!-- Static Table Start -->
        <div class="data-table-area mg-tb-15" style="margin-top: 15px;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                	
                                    <h3 class="alert bg-success"><b>Stock List 
                                    	<?php
                                		if(isset($_POST['search'])){

												$from = $_POST['from'];
											$to = $_POST['to'];
										
                                	?> From :
                                    	<?php echo $from?> To <?php echo $to; }?></b></h3>
                                </div>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    
                                  
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                <th data-field="state" data-checkbox="true"></th>
                                                <th data-field="Product Name">Product Name</th>
                                                
                                                <th data-field="Qty">Qty</th>
                                                <th data-field="Company Value">Company Value</th>
                                                <th data-field="Market Value">Market Value</th>
                                                
                                                
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                			<?php

											


											
											
												$dd = $conn-> query("SELECT * FROM product ORDER BY product_id ASC");
											
												
												$sum = 0;
												while($ddd = $dd->fetch_assoc()):

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
													$company_value = $stock*$comp_rate;
													
												
													

											?>
											<tr>
												<td></td>
												<td><?php echo $ddd['product_name']?></td>
												<td><?php echo $stock?></td>
												<td><?php echo $company_value?></td>
												<td><?php echo $market_value?></td>
												

											
											</tr>
											<?php endwhile; ?>
												
											
			                                
                                		</tbody>

                                    </table>

                                    
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Static Table End -->
	</div>


	<script src="../components/jquery/dist/jquery.js"></script>
	<script src="../components/jquery/dist/jquery.min.js"></script>
	
	<script src="../components/bootstrap/dist/js/bootstrap.js"></script>
	
	
	<!-- data-table CSS
		============================================ -->
    <script src="../components/data-table/bootstrap-table.js"></script>
    <script src="../components/data-table/tableExport.js"></script>
    <script src="../components/data-table/data-table-active.js"></script>
    <script src="../components/data-table/bootstrap-table-editable.js"></script>
    <script src="../components/data-table/bootstrap-editable.js"></script>
    <script src="../components/data-table/bootstrap-table-resizable.js"></script>
    <script src="../components/data-table/colResizable-1.5.source.js"></script>
    <script src="../components/data-table/bootstrap-table-export.js"></script>

	<script src="../components/jquery-confirm-master/js/jquery-confirm.js"></script>
</body>
</html>

