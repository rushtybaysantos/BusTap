@extends('app')

@section('content')

<div>
	<div class="tabhead">
		<ul class="tabmenu" style="margin-bottom: 0px;">
			<li>
				<input type="button" class="tab-btn " onclick="addbusdriver('driver')" value="Add Driver">
			</li>
			<li>					
				<input type="button" class="tab-btn" onclick="addbusdriver('bus')" value="Add Bus">
			</li>
		</ul>
	</div>
	<div id="dispbus">
		<div class="jumbotron">
			<h2>Welcome to Users Page!</h2>
			<br>
				<h4> Here, you can view unregistered cards that has attempted to be used in the bus and
				you can also view here cards that has been activated</h4>
		</div>
	</div>
</div>


@endsection