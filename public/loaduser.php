<?php
	$id = trim($_GET['id']);
	session_start();
   	$_SESSION['id'] = $id;
?>

<center>
<!-- 3407254052 -->
	<form role="form" class="form-horizontal loadpanel" id="panelforload" method="GET" action="load.php">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="form-group">
			<label class="col-sm-4 control-label">UID:</label>
			<div class="col-sm-8 input-group">
				<?php
					$connection = mysqli_connect('localhost', 'root', '','bustapdb');

				    $seluid = "SELECT * FROM user_register WHERE user_uid='$id'";
					$resuid = mysqli_query($connection, $seluid);
					if($resuid) {
						
					   if (mysqli_num_rows($resuid) > 0) {
				        	while($row = mysqli_fetch_assoc($resuid)) {
					        $GLOBALS['uid'] = $row["user_uid"];
					        
					    	}
				    	}
				    	echo $id;
				    }
				?>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-4 control-label">Last Name:</label>
			<div class="col-sm-8 input-group">
				Mr./Ms. <?php 
				$connection = mysqli_connect('localhost', 'root', '','bustapdb');

			    $seluid = "SELECT * FROM user_register WHERE user_uid='$id'";
				$resuid = mysqli_query($connection, $seluid);
				if($resuid) {
					
				   if (mysqli_num_rows($resuid) > 0) {
			        	while($row = mysqli_fetch_assoc($resuid)) {
				        $GLOBALS['lastname'] = $row["user_lastname"];
				    	}
			    	}

			    	else{
			    		$GLOBALS['lastname'] = 'BusTap';
			    	}

			    	echo $lastname;
			    }
 ?>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-4 control-label">Current Balance:</label>
			<div class="col-sm-8 input-group">
				P<?php 
				$btuid = "SELECT * FROM balance_table WHERE balance_UID='$id'";
				$resbtuid = mysqli_query($connection, $btuid);

			    if($resbtuid) {
					
				   if (mysqli_num_rows($resbtuid) > 0) {
			        	while($row = mysqli_fetch_assoc($resbtuid)) {
				        $balance = $row["balance"];
				        echo $balance;
				    	}
			    	}
			    	else{
			    		echo 0;
			    	}
			    }
				?>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-4 control-label">Credit:</label>
			<div class="col-sm-8 input-group">
				P<label id="creditbalance" style="font-weight: normal;">
				<?php
				$btuid = "SELECT * FROM balance_table WHERE balance_UID='$id'";
				$resbtuid = mysqli_query($connection, $btuid);

			    if($resbtuid) {
					
				   if (mysqli_num_rows($resbtuid) > 0) {
			        	while($row = mysqli_fetch_assoc($resbtuid)) {
				        $GLOBALS['credit'] = $row["credit"];
				        echo $credit;
				    	}
			    	}
			    	else{
			    		echo 0;
			    	}
			    }
				?></label>.00
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-4 control-label">Amount:</label>
			<div class="col-sm-8 input-group">
				<select style="width: 100%; padding: 2%;" class="form-control" id="accttype" id="amount" name="amount" onchange="calculatetotalpayment(this.value)" required>
					<?php //retrieval code for different types of account ?>
					<option value="" disabled selected>Select amount</option>
					<option value="20">20</option>
					<option value="50">50</option>
					<option value="100">100</option>
					<option value="150">150</option>
					<option value="200">200</option>
					<option value="250">250</option>
					<option value="300">300</option>
				</select>
			</div>
		</div>
		<div class="form-group">

			<label class="col-sm-4 control-label">Total Payment:</label>
			<div class="col-sm-8 input-group">
				P<label id="totalpayment" style="font-weight: normal;">0</label>.00
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<!-- <button type="submit" class="btn btn-mysubmit" name="Submit" id="Submit">Submit</button> -->
				<input type="submit" class="btn btn-mysubmit" name="submit" value="Submit">
			</div>
		</div>
	</form>

</center>