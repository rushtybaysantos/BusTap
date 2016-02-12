<!DOCTYPE html>
<html>
<head>
	<title>BusTap</title>
	<link href="{{ URL::asset('back-to-top/css/reset.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('back-to-top/css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('css/custom.css') }}" rel="stylesheet" type="text/css">
	
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />

	<script type="text/javascript" src="{{ URL::asset('js/jquery-2.1.4.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/active.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/main.js') }}"></script>

	<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>

	<script type="text/javascript">
		$( document ).ready(function() {
		    $('.nav').on('click', 'li', function(){
			    $('.nav li').removeClass('active');
			    $(this).addClass('active');
			});

			$('.msg').on('click', 'li', function(){
			    $('.msg li').removeClass('selectedmsg');
			    $(this).find('input[type="button"]').removeClass('unread');
			    $(this).addClass('selectedmsg');
			});

			$('.tabhead').on('click', 'li', function(){
			    $('.tabhead li').removeClass('selectedtab');
			    $(this).addClass('selectedtab');
			});
			$('#fname').keyup(function(){
		      $('#uname').html($(this).val());
		    });
		});
	</script>

	<script>
        function gettrans(str) {
           	if (str == "") {
                document.getElementById("disptrans").innerHTML = "";
                return;
            } else { 
                    
            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
                } else {
       	            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
	                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
	                    document.getElementById("disptrans").innerHTML = xmlhttp.responseText; 
	                }
                }
                xmlhttp.open("GET","gettransactions.php?q="+str,true);
                xmlhttp.send();
            }
        }

        function addbusdriver(str) {
            if (str == "") {
                document.getElementById("dispbus").innerHTML = "";
                return;
            } else { 
                    
            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
                } else {
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        document.getElementById("dispbus").innerHTML = xmlhttp.responseText; 
                    }
                }
                xmlhttp.open("GET","addbusdriver.php?q="+str,true);
                xmlhttp.send();
            }
        }

        function checkcardnum(id,type){
            if (type == "") {
                if (type == "drivercard") {
                    document.getElementById("checkidfordriver").innerHTML = "";
                    return;
                }else if (type == "loadcard") {
                    document.getElementById("checkidforload").innerHTML = "";
                    return;
                }
            } else { 
                    
            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
                } else {
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }

                if (type == "drivercard") {
                    xmlhttp.onreadystatechange = function() {
                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                            document.getElementById("checkidfordriver").innerHTML = xmlhttp.responseText; 
                        }
                    }
                }else if (type == "loadcard") {
                    xmlhttp.onreadystatechange = function() {
                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                            document.getElementById("checkidforload").innerHTML = xmlhttp.responseText; 
                        }
                    }
                }
                xmlhttp.open("GET","checkcard.php?id="+id+"&type="+type,true);
                xmlhttp.send();
            }
        }


        function getuser(str) {
            if (str == "") {
                document.getElementById("dispuser").innerHTML = "";
                return;
            } else { 
                    
            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
                } else {
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        document.getElementById("dispuser").innerHTML = xmlhttp.responseText; 
                    }
                }
                xmlhttp.open("GET","getuser.php?q="+str,true);
                xmlhttp.send();
            }
        }

        //deactivated card
        function getcardnum(str){
        	if (str == "") {
                document.getElementById("dispcarddetails").innerHTML = "";
                return;
            } else { 
                    
            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
                } else {
       	            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
	                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
	                    document.getElementById("dispcarddetails").innerHTML = xmlhttp.responseText; 
	                }
                }
                xmlhttp.open("GET","deactivate.php?q="+str,true);
                xmlhttp.send();
            }
        }


		function filtertrans(str){
            var fr = document.getElementById("transfilterfrom").value;
            var to = document.getElementById("transfilterto").value;
            var cnum = document.getElementById("transfiltercnum").value;
            xmlhttp.open("GET","gettransactions.php?q="+str+"&fr="+fr+"&to="+to+"&cnum="+cnum,true);
            xmlhttp.send();
        }  

        function filteruser(str){
            var userdate = document.getElementById("filteruserdate").value;
            xmlhttp.open("GET","getuser.php?q="+str+"&userdate="+userdate,true);
            xmlhttp.send();
        }  

        function filtersales(){     
            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
                } else {
       	            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
	            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
	                document.getElementById("dispsales").innerHTML = xmlhttp.responseText; 
	            }
            }
            var driver = document.getElementById("salesfilterdriver").value;
			var busnum = document.getElementById("salesfilterbusnum").value;
            var fr = document.getElementById("salesfilterfrom").value;
            var to = document.getElementById("salesfilterto").value;

            if(driver == "")
                driver = "none";
            if(busnum == "")
                busnum = "none";
            if(fr == "")
                fr = "none";
            if(to == "")
                to = "none";
            xmlhttp.open("GET","getsales.php?driver="+driver+"&busnum="+busnum+"&fr="+fr+"&to="+to,true);
            xmlhttp.send();            
        }

        function setmaxfrom(str){
        	document.getElementById("salesfilterfrom").max = str;
        }

        function setminto(str){
        	document.getElementById("salesfilterto").min = str;
        }

        function searchidforload(str){
            if (str == "") {
                document.getElementById("displayloaddiv").innerHTML = "";
                return;
            } else { 
                    
            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
                } else {
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                
            }
        }

        function calculatetotalpayment(load){
            var credit = $("#creditbalance").text();
            credit = parseInt(credit);
            load = parseInt(load);
            var totalpayment = load + credit;
            document.getElementById("totalpayment").innerHTML = totalpayment; 
        }
        </script>

</head>
<body>
	<div class="container-fluid">
	    <div class="row profile">
	    	<div class="col-md-3 ">
			@if((Auth::user()->acc_type) == 'Teller')
                 @include('pages/headerteller')
            @elseif((Auth::user()->acc_type) == 'Co-admin'))
                @include('pages/header')
            @else
                @include('pages/headeradmin')
            @endif
			</div>
			<div class="col-md-9">
	            <div class="profile-content mybox" id="content">

	            	@yield('content')
	            </div>
			</div>
		</div>
		<a href="#0" class="cd-top">Top</a>

	</div>
</body>
</html>