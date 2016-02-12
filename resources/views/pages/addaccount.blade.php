@extends('app')

@section('content')

<div class="row">
	<div class="col-md-12">
		<h2 class="h2title">Add Account</h2>
		<center>
		@if(Session::has('flash_message'))
		 			<div class="alert alert-success">{{ Session::get('flash_message') }}</div>
		@endif
		</center>
		<center>
			<div class="container">
				 
			</div>
			<form class="form-horizontal mypanel" method="POST" action="{{ url('/addaccount') }}">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="form-group">
					<label class="col-sm-4 control-label">First Name:</label>
					<div class="col-sm-8 input-group">
						<input type="text" id="fname" name="acc_fname" class="form-control" required/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label">Middle Name:</label>
					<div class="col-sm-8 input-group">
						<input type="text" class="form-control" name="acc_mname" required/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label">Last Name:</label>
					<div class="col-sm-8 input-group">
						<input type="text" id="lname" class="form-control" name="acc_lname" required/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label">Account Type:</label>
					<div class="col-sm-8 input-group">
						<select style="width: 100%; padding: 2%;" class="form-control" id="accttype" name="acc_type" required/>
							<?php //retrieval code for different types of account ?>
							<option value="2">Teller</option>
							<option value="3">Co-admin</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label">Password:</label>
					<div class="col-sm-8 input-group">
						<input type="password" class="form-control" name="password" required/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label">Confirm Password:</label>
					<div class="col-sm-8 input-group">
						<input type="password" class="form-control" name="password_confirmation" required/>
					</div>
				</div>
				<div class="form-group">
				    <div class="col-sm-offset-2 col-sm-11">
				      	<button type="submit" class="btn btn-mysubmit">Submit</button>
				    </div>
				</div>
			</form>
		</center>
	</div>
</div>

@endsection