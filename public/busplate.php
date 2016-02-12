<?php
	if(isset($_GET['submit'])){
		$busplate = strval($_GET['plate_number']);
		$today = date("Y-m-d H:i:s");

		$connection = mysqli_connect('localhost', 'root', '','bustapdb');

		$selectplate = "SELECT * FROM bus_plate WHERE plate_number = '$busplate'";
        $resplate = mysqli_query($connection, $selectplate);
	        if($resplate){
	        	if(mysqli_num_rows($resplate) > 0) { 
	        		echo "<script type=\"text/javascript\">".
						"alert('Bus Number already exists!');".
				        "location.replace('/bus');".
				        "</script>";
	        	}

	        	else{
					$insertplate = "INSERT INTO bus_plate(id, plate_number, plate_created) VALUES('', '$busplate', '$today')";
			        $resbcard = mysqli_query($connection, $insertplate);    
			        echo "<script type=\"text/javascript\">".
						"alert('Bus Number successfully inserted!');".
				        "location.replace('/bus');".
				        "</script>";
	        	}
	        }
	}


?>