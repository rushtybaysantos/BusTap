<!DOCTYPE html>
<html>
<head>
	<title>Log in to BusTap</title>
	<link rel="stylesheet" href="{{ URL::asset('/css/bootstrap.min.css') }} ">
	<link rel="stylesheet" href="{{ URL::asset('/css/custom.css') }}">
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>

	<script type="text/javascript" src="{{ URL::asset('js/jquery-2.1.4.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/active.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/main.js') }}"></script>

</head>

<script type="text/javascript">
	$(document).ready(function(){
		$('.carousel').carousel() 
	});
</script>

<body style="min-width: 800px;">


<div 	id="carousel-example-generic"
		class="carousel slide"
		data-ride="carousel"
		data-wrap="true"
		data-interval="5000"
		data-pause="false"
		style="position: fixed; z-index: -100; min-width: 1100px;">
  <!-- Indicators
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol> -->

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="imgs/SIDEBUS.jpeg" class="img-responsive" alt="">
     
    </div>
    <div class="item">
      <img src="imgs/LASTROW.jpeg" class="img-responsive" alt="">
      
    </div>
  </div>

  <!-- Controls
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a> -->
</div>






	<div class="container-fluid loginwrapper">
		<div class="row loginrowwrapper">
			<div class="col-md-7 col-xs-6">
			<div>
				<div style="color: #fff;" >
				  <h1>Welcome to BusTap!</h1>
				  <p style="font-size: 3.5vh;">
				  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				  Monitor sales, reload BusTap Cards and many more features! Get real-time updates from Load Transactions
				  to Trip Transactions from those who uses BusTap!
				  </p>
				</div>
			</div>
			
			</div>
			<div class="col-md-5 col-xs-6">
				 @if (count($errors) > 0)
	                        <div class="alert alert-danger">
	                            <ul>
	                                @foreach ($errors->all() as $error)
	                                    <h5>{{ $error }}</h5>
	                                @endforeach
	                            </ul>
	                        </div>
	                    @endif
				<div class="profile profile-sidebar mybox" style="padding: 5px 20px 30px 20px;">
					<h4>Log in</h4>
					<hr>
					<form role="form" method="POST" action="{{ url('/login') }}">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					  <div class="form-group">
					    <label for="exampleInputEmail1">Account ID:</label>
					    <input type="text" class="form-control" id="exampleInputEmail1" name="acc_id" placeholder="COA11223334455">
					  </div>
					  <div class="form-group">
					    <label for="exampleInputPassword1">Password</label>
					    <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="*******">
					  </div>
					  
					  <button type="submit" class="btn btn-mysubmit">Submit</button>
					  <!--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="{{ url('/register') }}">Create new account!</a> -->
					  <a href="{{ url('/register') }}"> Create Account *for ADMIN ONLY* </a>
					</form>
				</div>
			</div>
		</div>
		
	</div>	
</body>
</html>