@extends('app')

@section('content')

<div class="row">
	<div class="col-md-12">
		<h2 class="h2title">LOAD</h2>
		<center>

			<div class="form-horizontal loadpanel">
				<div class="form-group">
					<label class="col-sm-3 control-label">Enter Card ID:</label>
					<div class="col-sm-9 input-group">
						<input type="number" class="form-control" id="loadcardid">
						<span class="input-group-btn">
					    	<button class="btn btn-default" type="button" onclick="checkcardnum(loadcardid.value,'loadcard')"><i class="glyphicon glyphicon-search"></i></button>
					    </span>
					</div>
				</div>
			</div>
			<div id="checkidforload" class="alert" role="alert"></div>
			<div id="displayloaddiv" class="col-md-12">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
			</div>
		</center>
	</div>
</div>

@endsection