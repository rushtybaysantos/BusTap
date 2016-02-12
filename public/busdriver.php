<?php
	if(isset($_GET['submit'])){
		$busfname = $_GET['bus_fname'];
		$busmname = $_GET['bus_mname'];
		$buslname = $_GET['bus_lname'];
		$buscard = $_GET['bus_card'];
		$today = date("Y-m-d H:i:s");

		$connection = mysqli_connect('localhost', 'root', '','bustapdb');

		$selectcard = "SELECT * FROM bus_driver WHERE bus_card = $buscard";
        $resselect = mysqli_query($connection, $selectcard);
	        if($resselect){
	        	if(mysqli_num_rows($resselect) > 0) { 
	        		echo "<script type=\"text/javascript\">".
						"alert('Bus Card already registred!');".
				        "location.replace('/bus');".
				        "</script>";
	        	}

	        	else{
	        		$searchcard = "SELECT * FROM card_register WHERE nfcUID='$buscard'";
	        		$research = mysqli_query($connection, $searchcard);
	        			if($research){
	        				if(mysqli_num_rows($research) > 0) {
	        					$busaccount = 'BUS'.strtotime($today);
	        					$busfullname = $busfname." ".$buslname;
								$insertbcard = "INSERT INTO bus_driver(id, bus_account, bus_fname, bus_mname, bus_lname, bus_fullname, bus_card, plate_created)
												VALUES('', '$busaccount', '$busfname', '$busmname', '$buslname', '$busfullname', '$buscard', '$today')";
						        $resbcard = mysqli_query($connection, $insertbcard);	 
						        echo "<script type=\"text/javascript\">".
									"alert('Bus driver Account Number is: $busaccount');".
							        "location.replace('/bus');".
							        "</script>";   
	        				}

	        				else{
	        					 echo "<script type=\"text/javascript\">".
								"alert('Card number is not authorized!');".
						        "location.replace('/bus');".
						        "</script>";  
	        				}
	        			}	   		
	        	}
	        }
	}
?>