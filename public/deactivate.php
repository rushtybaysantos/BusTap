<?php
	$q = trim($_GET['q']);
	session_start();
   	$_SESSION['id'] = $q;
	$connection = mysqli_connect('localhost', 'root', '','bustapdb');

    $getuid = "SELECT * from user_register where user_uid = $q";
    $resuid = mysqli_query($connection, $getuid);

    if($resuid) {		
	   if (mysqli_num_rows($resuid) > 0) {
        	while($row = mysqli_fetch_assoc($resuid)) {
        	$GLOBALS['firstname'] = $row["user_firstname"];
        	$GLOBALS['middlename'] = $row["user_middlename"];
	        $GLOBALS['lastname'] = $row["user_lastname"];
	        $GLOBALS['username'] = $row["user_username"];
	        $GLOBALS['uid'] = $row["user_uid"];
	    	}
?>
			<center>
			<form class="form-horizontal mypanel" method="GET" action="transferuser.php">
				<div class="form-group">
					<label class="col-sm-4 control-label">UID:</label>
					<div class="col-sm-8 input-group">
						<?php echo $uid; ?>
					</div>
				</div>
<!-- 				<div class="form-group">
					<label class="col-sm-4 control-label">First Name:</label>
					<div class="col-sm-8 input-group">
						<?php echo $firstname; ?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label">Middle Name:</label>
					<div class="col-sm-8 input-group">
						<?php echo $middlename; ?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label">Last Name:</label>
					<div class="col-sm-8 input-group">
						<?php echo $lastname; ?>
					</div>
				</div> -->
				<div class="form-group">
					<label class="col-sm-4 control-label">Username:</label>
					<div class="col-sm-8 input-group">
						<?php 
						if($username == ""){
							echo 'Not Registered to BusTap User';
						}
						else{
							echo $username;
						}
						?>
						
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label">Balance:</label>
					<div class="col-sm-8 input-group">
						<?php 
							$getuid = "SELECT * from balance_table where balance_UID = '$q'";
   							$resuid = mysqli_query($connection, $getuid);

   							if($resuid) {		
	   							if (mysqli_num_rows($resuid) > 0) {
	   								while($row = mysqli_fetch_assoc($resuid)) {
	   									 $GLOBALS['balance'] = $row["user_balance"];
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
						<?php 
							$getuid = "SELECT * from balance_table where balance_UID = '$q'";
   							$resuid = mysqli_query($connection, $getuid);

   							if($resuid) {		
	   							if (mysqli_num_rows($resuid) > 0) {
	   								while($row = mysqli_fetch_assoc($resuid)) {
									     $GLOBALS['credit'] = $row["user_credit"];
									     echo $credit;
									}
	   							}
	   							else{
	   								echo 0;
	   							}
	   						} 
	   					?>
					</div>
				</div>
				<label>Transfer user details to...</label>
				<div class="form-group">
					<label class="col-sm-4 control-label">New Card Number:</label>
					<div class="col-sm-8 input-group">
						<input type="number" id="newcnum" class="form-control" name="newcard">
					</div>
				</div>
				<div class="form-group">
				    <div class="col-sm-offset-1 col-sm-11">
				      	<input type="submit" class="btn btn-mysubmit" name="submit" value="Submit">
				    </div>
				</div>
			</form>				
			</center>
	    	<?php
	    	
    	}

    	else{
			 echo '<div class="alert alert-danger col-md-offset-4 col-md-5" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<center>
							<strong>Fail!</strong>
						 	Card number does not exist!
						</center>
					</div>';
    	}
    }
?>

