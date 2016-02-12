<div class="profile-sidebar mybox">
<!-- SIDEBAR USERPIC -->
	<div class="profile-userpic">
		<img src="imgs/HORDE.jpg" class="img-responsive img-rounded" alt="">
	</div>
	<!-- END SIDEBAR USERPIC -->
	<!-- SIDEBAR USER TITLE -->
	<div class="profile-usertitle">
		<div class="profile-usertitle-name">
			{{ Auth::user()->acc_fname }} {{ Auth::user()->acc_lname }}
		</div>
		<div class="profile-usertitle-job">
			{{ Auth::user()->acc_type }}
		</div>
	</div>
	<!-- END SIDEBAR USER TITLE -->
	<!-- SIDEBAR BUTTONS -->
		
	<!--
	<div class="profile-userbuttons">
	<button type="button" class="btn btn-success btn-sm">Follow</button>
	<button type="button" class="btn btn-danger btn-sm">Message</button>
	</div>
	-->

	<!-- END SIDEBAR BUTTONS -->
	<!-- SIDEBAR MENU -->
	<div class="profile-usermenu">
		<ul class="nav">
			<li>
				<a href="{{ url('/load') }}">
				<i class="glyphicon glyphicon-piggy-bank"></i>
				Load</a>
				
			</li>
<!-- 			<li>
				<a href="{{ url('/transactions') }}" >
				<i class="glyphicon glyphicon-road"></i>
				Transactions </a>
			</li> -->
			
			<li>
				<a href="{{ url('/deactivatecard') }}" >
				<i class="glyphicon glyphicon-ban-circle"></i>
				Deactivate Card </a>
			</li>
			<li>
				<a href="{{ url('/users') }}">
				<i class="glyphicon glyphicon-user"></i>
				Users</a>
			</li>
			<li>
				<a href="{{ url('/logout') }}">
				<i class="glyphicon glyphicon-off"></i>
				Log out</a>
			</li>
		</ul>
	</div>
	<!-- END MENU -->
</div>