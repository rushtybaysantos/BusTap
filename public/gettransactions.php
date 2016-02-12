<?php
	$q = trim($_GET['q']);

	if(isset($_GET['fr']) || isset($_GET['to']) || isset($_GET['cnum'])){
		$fr = trim($_GET['fr']);
		$to = trim($_GET['to']);
		$cnum = trim($_GET['cnum']);

		if($fr == "")
            $fr = "none";
        if($to == "")
            $to = "none";
        if($cnum == "")
            $cnum = "none";
	}
?>


<div class="form-horizontal mypanel" style="margin-top: 3%;">
	<div class="form-group">
		<label class="col-sm-4 control-label">Start Date:</label>
		<div class="col-sm-4 input-group">
			<input type="date" id="transfilterfrom" class="form-control" max="<?php echo date('Y-m-d') ?>">
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-4 control-label">End Date:</label>
		<div class="col-sm-4 input-group">
			<input type="date" id="transfilterto" class="form-control" max="<?php echo date('Y-m-d') ?>">
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-4 control-label">Card Number:</label>
		<div class="col-sm-4 input-group">
			<input type="number" id="transfiltercnum" class="form-control">
		</div>
	</div>
	<div class="form-group">
	    <div class="col-sm-offset-5 col-sm-11">
	      	<?php echo '<input type="button" class="btn btn-mysubmit" onclick="filtertrans(\''.$q.'\')" value="Search">' ?>
		</div>
	</div>
</div>
<?php
	//unfiltered list
	if($q == "Load"){
		?>
		<table align="center" class="table table-striped" >
		  <thead>
		  	<th width="25%">Date and Time</th>
		  	<th width="25%">Card I.D.</th>
		  	<th width="25%">Previous Balance</th>
		  	<th width="25%">New Balance</th>
		  </thead>
		  <?php //insert retrieve codes here.
		  		// may general na retrieve at may if para sa filtered
		   ?>
		  <tr>
		  	<td>01/01/1111 01:01am</td>
		  	<td>000000000001</td>
		  	<td>PHP 10.00</td>
		  	<td>PHP 100.00</td>
		  </tr>
		  <tr>
		  	<td>01/01/1111 01:01am</td>
		  	<td>000000000002</td>
		  	<td>PHP 10.00</td>
		  	<td>PHP 100.00</td>
		  </tr>
		</table>
		<?php
	}
	elseif ($q == "Trip") {
		?>
		<table align="center" class="table table-striped" >
		  <thead>
		  	<th width="25%">Date and Time</th>
		  	<th width="25%">Card I.D.</th>
		  	<th width="25%">Starting Point</th>
		  	<th width="25%">End Point</th>
		  </thead>
		  <?php //insert retrieve codes here.
		  		// may general na retrieve at may if para sa filtered
		   ?>
		  <tr>
		  	<td>01/01/1111 01:01am</td>
		  	<td>000000000001</td>
		  	<td>U.N. Avenue</td>
		  	<td>Buendia</td>
		  </tr>
		  <tr>
		  	<td>01/01/1111 01:01am</td>
		  	<td>000000000002</td>
		  	<td>Buendia</td>
		  	<td>Ayala</td>
		  </tr>
		</table>
		<?php
	}
?>