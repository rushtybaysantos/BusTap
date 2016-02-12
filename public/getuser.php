<?php
	$q = trim($_GET['q']);

	if(isset($_GET['userdate'])){
		$GLOBALS['userdate'] = trim($_GET['userdate']);
	}
?>
<div class="form-horizontal mypanel" style="margin-top: 3%;">
	<div class="form-group">
		<label class="col-sm-4 control-label">Date:</label>
		<div class="col-sm-4 input-group">
			<?php 
				if(isset($_GET['userdate'])){
					$userdate = date('Y-m-d',strtotime($userdate));
					echo '<input type="date" class="form-control"  id="filteruserdate" onchange="filteruser(\''.$q.'\')" max="'.date('Y-m-d').'" value="$userdate" >';
					echo $userdate;
				}
				else{
					echo '<input type="date" class="form-control"  id="filteruserdate" onchange="filteruser(\''.$q.'\')" max="'.date('Y-m-d').'" >';
				}
			?>
		</div>
	</div>
</div>

<?php
if ($q == "activated") {
	//echo $userdate;
?>
	<table align="center" class="table table-striped">
		<thead>
		  	<th width="20%">NFC UID</th>
		  	<th width="20%">Card Number</th>
		  	<th width="20%">Username</th>
		  	<th width="20%">Date</th>
		</thead>
		<?php 
			$connection = mysqli_connect('localhost', 'root', '','bustapdb');
			if(!empty($userdate)){
				$filter = "SELECT user_username,nfcUID,nfcCard,DATE(date_activate)
							FROM `user_register`
							RIGHT JOIN `card_register`
							ON user_register.user_uid = card_register.nfcUID
							WHERE DATE(card_register.date_activate)='$userdate'";
				$resfilter = mysqli_query($connection, $filter);
				if($resfilter){
					if(mysqli_num_rows($resfilter) > 0){
						while($row = mysqli_fetch_assoc($resfilter)){
							echo '<tr>'
					   				.'<td>'.$row['nfcUID'].'</td>'
					   				.'<td>'.$row['nfcCard'].'</td>'
					   				.'<td>'.$row['user_username'].'</td>'
					   				.'<td>'.$row['DATE(date_activate)'].'</td>'
					   			 .'</tr>';
						}
					}
				}


			}

			else{
			

		    $showactive = "SELECT * from card_register";
		    $resactive = mysqli_query($connection, $showactive);

		    if($resactive) {
		
		   		if (mysqli_num_rows($resactive) > 0) {
		   			while($row = mysqli_fetch_assoc($resactive)) {
		   				$taguid = $row['nfcUID'];
		   				$tagcard = $row['nfcCard'];
		   				$tagdate = $row['date_activate'];

		   				$getusername = "SELECT * from user_register WHERE user_uid=$taguid";
		    			$resgetuname = mysqli_query($connection, $getusername);

		    			if($resgetuname){
		    				if (mysqli_num_rows($resgetuname) > 0){
		    					while($row = mysqli_fetch_assoc($resgetuname)){
		    						$uname = $row['user_username'];

		    						echo '<tr>'
					   						.'<td>'.$taguid.'</td>'
					   						.'<td>'.$tagcard.'</td>'
					   						.'<td>'.$uname.'</td>'
					   						.'<td>'.$tagdate.'</td>'
					   					 .'</tr>';
		    					}
		    				}

		    				else{
		    						echo '<tr>'
					   						.'<td>'.$taguid.'</td>'
					   						.'<td>'.$tagcard.'</td>'
					   						.'<td>'.'No user owns the card'.'</td>'
					   						.'<td>'.$tagdate.'</td>'
					   					 .'</tr>';		    					
		    				}
		    			}

		   				
		   			}
		   		}
	   		}
	   		}
		?>
	</table>

<?php
}elseif ($q == "unknown"){
?>
	<table align="center" class="table table-striped" >
		<thead>
		  	<th width="50%">NFC UID</th>
		  	<th width="50%">Date</th>
		</thead>
		<?php 
			$connection = mysqli_connect('localhost', 'root', '','bustapdb');

			if(!empty($userdate)){
				$filterunknown = "SELECT unknown_UID, DATE(unknown_date) FROM unknown_user WHERE DATE(unknown_date)='$userdate'";
				$resfilter = mysqli_query($connection, $filterunknown);
				if($resfilter){
					if(mysqli_num_rows($resfilter) > 0){
						while($row = mysqli_fetch_assoc($resfilter)){
							echo '<tr>'
					   				.'<td>'.$row['unknown_UID'].'</td>'
					   				.'<td>'.$row['DATE(unknown_date)'].'</td>'
					   			 .'</tr>';
						}
					}
				}


			}

			else{

		    $showunknown = "SELECT * from unknown_user";
		    $resshow = mysqli_query($connection, $showunknown);

		    if($resshow) {
		
		   		if (mysqli_num_rows($resshow) > 0) {
		   			while($row = mysqli_fetch_assoc($resshow)) {
		   				$unknownuid = $row['unknown_UID'];
		   				$unknowndate = $row['unknown_date'];

		   				echo '<tr>'
		   						.'<td>'.$unknownuid.'</td>'
		   						.'<td>'.$unknowndate.'</td>'
		   					 .'</tr>';
		   			}
		   		}
	   		}
	   		}
		?>
	</table>
<?php
}
?>
