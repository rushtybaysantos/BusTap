@extends('app')

@section('content')

<div class="row">
	<div class="col-md-12">
		<h2 class="h2title">Deactivate Card</h2>
			<center>
			<div class="form-horizontal mypanel">
				<div class="form-group">
					<label class="col-sm-4 control-label">Enter Card Number:</label>
					<div class="col-sm-8 input-group">
						<input type="number" class="form-control" id="deactivateid">
						<span class="input-group-btn">
					    	<button class="btn btn-default" type="button" onclick="getcardnum(deactivateid.value)"><i class="glyphicon glyphicon-search"></i></button>
					    </span>
					</div>	
				</div>
			</div>	
			</center>
			
	</div>
	<div id="dispcarddetails" class="col-md-12">
	</div>
</div>

@endsection