<?php
	$id = trim($_GET['id']);
	$type = trim($_GET['type']);
	$connection = mysqli_connect('localhost', 'root', '','bustapdb');
	if($type == 'drivercard'){
		$checkquery = "SELECT * FROM card_register WHERE nfcUID='$id'";
		// $checkquery = "SELECT nfcUID,nfcCard,user_username
		// 					FROM `user_register`
		// 					RIGHT JOIN `card_register`
		// 					ON user_register.user_uid = card_register.nfcUID
		// 					WHERE user_register.user_username IS NULL AND card_register.nfcUID = '$id'";
		$rescheck = mysqli_query($connection, $checkquery);
		if($rescheck){
			if(mysqli_num_rows($rescheck) > 0){
				echo '<div id="checkidfordriver" class="alert alert-success col-md-offset-2" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<strong>Success!</strong>
						 Card number exists!
					</div>';
			}else{
				echo '<div id="checkidfordriver" class="alert alert-danger col-md-offset-2" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<strong>Fail!</strong>
						 Card number does not exist!
					</div>';
			}
		}	
	}elseif ($type == 'loadcard') {
		$checkquery = "SELECT * FROM `card_register` WHERE nfcUID = '$id'";
		$rescheck = mysqli_query($connection, $checkquery);
		if($rescheck){
			if(mysqli_num_rows($rescheck) > 0){
				// echo '<div id="displayloaddiv" class="alert alert-success col-md-offset-4 col-md-5" role="alert">
				// 		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				// 		<strong>Success!</strong>
				// 		 Card number exists!
				// 	</div>';
				include "loaduser.php";
			}else{
				echo '<div id="displayloaddiv" class="alert alert-danger col-md-offset-4 col-md-5" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<strong>Fail!</strong>
						 Card number does not exist!
					</div>';
			}
		}	
	}
?>

