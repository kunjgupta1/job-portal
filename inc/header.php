<?php
    $filepath = realpath(dirname(__FILE__));
    include_once $filepath.'/../lib/Session.php';
    Session::init();
?>


<!DOCTYPE html>
<html>
<head>
	<title>C.M.S</title>
	<link rel="stylesheet" type="text/css" href="inc/bootstrap.min.css">
	<script type="text/javascript" src="inc/bootstrap.min.js"></script>
	<script type="text/javascript" src="inc/jquery.min.js"></script>
	 
	 <meta name="viewport" content="width=device-width,intial-scale=1">
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->


<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	 <link rel="stylesheet" type="text/css" href="inc/style.css">
</head>
<body>

	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#drop">
				 	<span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>   
				 </button>
				<a class="navbar-brand" href="index.php">KH portal</a>
			</div>
		   <div class="collapse navbar-collapse" id="drop">
			 <ul class="nav navbar-nav navbar-right">
				<?php
						$loginid = Session::get('id');
				        $userlogin  = Session::get("login");
				        if ($userlogin == true)
				         {
				?>         	
				<li class="active"><a href="index.php">Home</a></li>
				<li><a href="contactus.php">Contact us</a></li>
				<li><a href="profile.php?id=<?php echo $loginid;?>">Profile</a></li>

				<?php } else {?>

				<li class="active"><a href="index.php">Home</a></li>
				<li><a href="contactus.php">Contact us</a></li>
				<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span>Login</a></li>
				<li><a href="register.php"><span class="glyphicon glyphicon-user"></span>Register</a></li> 
				
				<?php }?> 
			</ul>
		  </div>	
		 </div>
		
		