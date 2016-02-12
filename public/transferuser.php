<?php
	session_start();
	$userid = $_SESSION['id'];
	
    if(isset($_GET['submit'])){
			$new = $_GET['newcard'];
			$date = date('Y-m-d H:i:s');
			$connection = mysqli_connect('localhost', 'root', '','bustapdb');

			if($new == $userid){
				echo "<script type=\"text/javascript\">".
					"alert('You cannot tranfer details to same card number!!');".
			        "location.replace('/deactivatecard');".
			        "</script>";
			}

			else{
			
			$selectcard = "SELECT * FROM card_register WHERE nfcUID = $new";
            $resselect = mysqli_query($connection, $selectcard);
	            if($resselect){
	                if(mysqli_num_rows($resselect) > 0) { 

					$updateuid = "UPDATE user_register SET user_uid='$new' WHERE user_uid=$userid" ;
					$resupdate = mysqli_query($connection, $updateuid);

					$deletecard = "DELETE FROM card_register WHERE nfcUID = $userid";
					$resdelete = mysqli_query($connection, $deletecard);

					$insertunknown = "INSERT INTO unknown_user(unknown_id,unknown_uid,unknown_date) VALUES('', '$userid', '$date')";
					$resinsert = mysqli_query($connection, $insertunknown);
						
					echo "<script type=\"text/javascript\">".
					"alert('Successfully Transferred User Details to a new card!');".
				    "location.replace('/deactivatecard');".
				    "</script>";
					}

				else{
						echo "<script type=\"text/javascript\">".
						"alert('Invalid Card Number');".
				        "location.replace('/deactivatecard');".
				        "</script>";
					}
				}
			}
	}
?>