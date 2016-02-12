<?php
	session_start();
	$userid = $_SESSION['id'];
    if(isset($_GET['submit'])){
			$amt = $_GET['amount'];
			$date = date('Y-m-d H:i:s');
			$connection = mysqli_connect('localhost', 'root', '','bustapdb');
			
			$checkbal = "SELECT * FROM balance_table WHERE balance_UID='$userid'";
			$resbal = mysqli_query($connection, $checkbal);
			if($resbal){
				if(mysqli_num_rows($resbal) > 0){
					while($row = mysqli_fetch_assoc($resbal)){
							$bal = $row["balance"];
							$total = $bal + $amt;

							$updateuid = "UPDATE balance_table SET balance='$total', credit='0' WHERE balance_UID='$userid'";
							$resupdate = mysqli_query($connection, $updateuid);

							$insertload = "INSERT INTO balance_history(load_id, load_UID, load_balance, load_date) VALUES('','$userid','$amt','$date')";
							$resinsert = mysqli_query($connection, $insertload);

							echo "<script type=\"text/javascript\">".
							"alert('Successfully Load update!');".
					        "location.replace('/load');".
					        "</script>";
					    	
					}
				}

				else{
					$insertbt = "INSERT INTO balance_table(balance_id, balance_UID, balance, credit) VALUES('','$userid','$amt','0')";
					$resbt = mysqli_query($connection, $insertbt);

					$insertbh = "INSERT INTO balance_history(load_id, load_UID, load_balance, load_date) VALUES('','$userid','$amt','$date')";
					$resbh = mysqli_query($connection, $insertbh);

					echo "<script type=\"text/javascript\">".
							"alert('Successfully Load update!');".
					        "location.replace('/load');".
					        "</script>";
				}
			}
		
				echo "<script type=\"text/javascript\">".
					"alert('Error!');".
			        "location.replace('/load');".
			        "</script>";
	}
?>

<!-- $insertbt = "INSERT INTO balance_table(balance_id, balance_UID, balance, credit) VALUES('','$userid','$amt','0')";
							$resbt = mysqli_query($connection, $insertbt);

							$insertbh = "INSERT INTO balance_history(load_id, load_UID, load_balance, load_date) VALUES('','$userid','$amt','$date')";
							$resbh = mysqli_query($connection, $insertbh);

							echo "<script type=\"text/javascript\">".
							"alert('Successfully Load!');".
					        "location.replace('/load');".
					        "</script>"; -->