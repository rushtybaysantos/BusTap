<?php
	$q = trim($_GET['q']);

	if($q == "driver"){
		?>
		<center>
			<div class="container">
				 
			</div>
			<form class="form-horizontal mypanel" method="GET" action="busdriver.php">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="form-group">
					<label class="col-sm-4 control-label">First Name:</label>
					<div class="col-sm-8 input-group">
						<input type="text" id="fname" name="bus_fname" class="form-control" required/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label">Middle Name:</label>
					<div class="col-sm-8 input-group">
						<input type="text" class="form-control" name="bus_mname" required/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label">Last Name:</label>
					<div class="col-sm-8 input-group">
						<input type="text" id="lname" class="form-control" name="bus_lname" required/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label">Enter Card Number:</label>
					<div class="col-sm-8 input-group">
						<input type="number" class="form-control" id="driverid" name="bus_card">
						<span class="input-group-btn">
					    	<button class="btn btn-default" type="button" onclick="checkcardnum(driverid.value,'drivercard')"><i class="glyphicon glyphicon-search"></i></button>
					    </span>
					</div>	
				</div>
				<div id="checkidfordriver" class="alert" role="alert"></div>
				<div class="form-group">
				    <div class="col-sm-offset-2 col-sm-11">
				      	<input type="submit" class="btn btn-mysubmit" name="submit" value="Submit">
				    </div>
				</div>
				<br>
			</form>
		</center>




	<?php
	}elseif ($q == "bus") {
		?>
		<form class="form-horizontal mypanel" method="GET" action="busplate.php">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="form-group">
					<label class="col-sm-6 control-label">Enter Bus Plate Number:</label>
					<div class="col-sm-6 input-group">
						<input type="text" id="plate_number" name="plate_number" class="form-control" required/>
					</div>
				</div>
				<div class="form-group">
				    <div class="col-sm-offset-6 col-sm-11">
				      	<input type="submit" class="btn btn-mysubmit" name="submit" value="Submit">
				    </div>
				</div>
				<br>
			</form>

		<?php
	}

?>
