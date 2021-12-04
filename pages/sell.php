<?php

	include('../db.php');


	
		
	

	



	

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Fresh:: Sell Analysis</title>

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

	<div class="container">
	
			<form action="" method="POST">
				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<label for="">Sell At</label>
							<select name="lifting" id="" class="form-control">
								<option value="">--select--</option>
								<?php

									$lift = $conn-> query("SELECT * FROM lifting_value");
									while($lifting = $lift->fetch_assoc()):
								?>
								<option value="<?php echo $lifting['sl']?>"><?php echo $lifting['lift_name']?></option>
							<?php endwhile;?>
							</select>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="">From</label>
							<input name="from" class="form-control" type="date">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="">To</label>
							<input name="to" class="form-control" type="date">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="">Search Here</label>
							<input name="search" class="form-control" type="submit" value="Search">
						</div>
					</div>
			</div>
		</form>
	</div>
	<div class="panel panel-info" style="margin-top: 20px">
			 <!-- Static Table Start -->
        <div class="data-table-area mg-tb-15" style="margin-top: 15px;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                	
                                    <h3 class="alert bg-success"><b>Sell List 
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
                                                <th data-field="Sell In">Sell In</th>
                                                <th data-field="Qty">Qty</th>
                                                <th data-field="Amount">Amount</th>
                                                <th data-field="Profit">Profit</th>
                                                
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                			<?php

											if(isset($_POST['search'])){

												$from = $_POST['from'];
											$to = $_POST['to'];
											$liftii = $_POST['lifting'];

											
											
												$dd = $conn-> query("SELECT * FROM product ORDER BY product_id ASC");
											
												
												$sum = 0;
												while($ddd = $dd->fetch_assoc()):

													$product_id = $ddd['product_id'];

													if($liftii!=NULL){
														$lift = $conn-> query("SELECT SUM(qty) as quantity, SUM(total) as total,SUM(profit) as prof1 from lifting_item WHERE today_date between '$from' AND '$to' AND product_id='$product_id' AND lifting_value_id='$liftii'");
													$lift_qt = $lift->fetch_assoc();

													$lift_qty = $lift_qt['quantity'];
													$lift_total = $lift_qt['total'];
													$lift_profit = $lift_qt['prof1'];

													$ret = $conn->query("SELECT SUM(qty) as quantity1,SUM(total) as total1,SUM(profit) as prof2 from return_item WHERE today_date between '$from' AND '$to' AND product_id='$product_id' AND return_value_id='$liftii'");
													$return_qt = $ret->fetch_assoc();

													$return_qty = $return_qt['quantity1'];
													$return_total = $return_qt['total1'];
													$return_profit = $return_qt['prof2']; 
													$sell = $lift_qty- $return_qty;
													$total = $lift_total- $return_total;
													$profit = $lift_profit- $return_profit;
													$profit_total = $lift_profit- $return_profit;
													 
													$sum = $sum + $total;
													$selll= $conn-> query("SELECT * FROM lifting_value WHERE sl='$liftii'");
													$sellll = $selll->fetch_assoc();
													$sellin = $sellll['lift_name'];
												}else{
													$lift = $conn-> query("SELECT SUM(qty) as quantity, SUM(total) as total,SUM(profit) as prof1 from lifting_item WHERE today_date between '$from' AND '$to' AND product_id='$product_id'");
													$lift_qt = $lift->fetch_assoc();

													$lift_qty = $lift_qt['quantity'];
													$lift_total = $lift_qt['total'];
													$lift_profit = $lift_qt['prof1'];
													$ret = $conn->query("SELECT SUM(qty) as quantity1,SUM(total) as total1,SUM(profit) as prof2 from return_item WHERE today_date between '$from' AND '$to' AND product_id='$product_id'");
													$return_qt = $ret->fetch_assoc();

													$return_qty = $return_qt['quantity1'];
													$return_total = $return_qt['total1'];
													$return_profit = $return_qt['prof2'];
													

													$sell = $lift_qty- $return_qty;
													$total = $lift_total- $return_total;
													$profit_total = $lift_profit- $return_profit;
													


													$sum = $sum + $total;

													$sellin = "All";
												}
													

											?>
											<tr>
												<td></td>
												<td><?php echo $ddd['product_name']?></td>
												<td><?php echo $sellin?></td>
												<td><?php echo $sell?></td>
												<td><?php echo $total?></td>
												<td><?php echo $profit_total?></td>
												

											
											</tr>
											<?php endwhile; ?>
												}
											
			                                
                                		</tbody>

                                    </table>

                                    <h1 class="text-right">Total: <?php echo $sum; }?> Taka</h1>
                                   
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

