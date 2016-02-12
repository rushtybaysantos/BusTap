@extends('app')

@section('content')

<div class="row">
	<div class="col-md-12">
		<h2 class="h2title">Sales</h2>
		<div class="form-horizontal mypanel" style="margin-top: 3%;">
			<div class="form-group">
				<label class="col-sm-4 control-label">Driver Name:</label>
				<div class="col-sm-5 input-group">
					<select class="form-control" id="salesfilterdriver">
						<option value="" disabled selected>Select a driver...</option>
						<?php
						$connection = mysqli_connect('localhost', 'root', '','bustapdb');
			
						$driversql = "SELECT * FROM bus_driver";
						$resdriver = mysqli_query($connection, $driversql);
						
						if($resdriver){
							if(mysqli_num_rows($resdriver) > 0){
								while($row = mysqli_fetch_assoc($resdriver)){
									$driverid = $row["bus_account"];
									$driverfname = $row["bus_fname"];
									$driverlname = $row["bus_lname"];
						?>
						
						<option value="{{$driverid}}">{{$driverfname}} {{$driverlname}}</option>
						
						<?php
								}
							}
						}
						?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-4 control-label">Bus Number:</label>
				<div class="col-sm-5 input-group">
					<select class="form-control" id="salesfilterbusnum">
						<option value="" disabled selected>Select a plate number...</option>
						<?php
						$connection = mysqli_connect('localhost', 'root', '','bustapdb');
			
						$busnumsql = "SELECT * FROM bus_plate";
						$resbusnum = mysqli_query($connection, $busnumsql);
						
						if($resbusnum){
							if(mysqli_num_rows($resbusnum) > 0){
								while($row = mysqli_fetch_assoc($resbusnum)){
									$busid = $row["id"];
									$busplate = $row["plate_number"];
						?>
						
						<option value="{{$busplate}}">{{$busplate}}</option>
						
						<?php
								}
							}
						}
						?>
					</select>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-4 control-label">Start Date:</label>
				<div class="col-sm-5 input-group">
					<input type="date" id="salesfilterfrom" class="form-control" onchange="setminto(this.value)" max="<?php echo date('Y-m-d') ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-4 control-label">End Date:</label>
				<div class="col-sm-5 input-group">
					<input type="date" id="salesfilterto" class="form-control" onchange="setmaxfrom(this.value)" max="<?php echo date('Y-m-d') ?>">
				</div>
			</div>
			
			<div class="form-group">
			    <div class="col-sm-offset-5 col-sm-11">
			      	<?php echo '<input type="button" class="btn btn-mysubmit" onclick="filtersales()" value="Search">' ?>
				</div>
			</div>
		</div>
	</div>
	<div id="dispsales" class="col-md-12">
	</div>
</div>

@endsection