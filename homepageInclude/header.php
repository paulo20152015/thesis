<?php                
include_once('php/include.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>NCA</title>
<link rel="icon" type="image/png" href="image/favicon-32x32.png" sizes="32x32" />

    <!-- Bootstrap -->
    <link href="css/bootstrapor.css" rel="stylesheet">
   
    <link href="css/custom.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
 
 
	<nav class="navbar navbar-inverse navbar-static-top">
            <div class="container-fluid">
		<div class="navbar-header">
                    <a class="navbar-brand nav-logo-text " hreft="#"><span><img src="image/logo/logo.png" height="25" width="35"></span> New Christian Academy</a>
                    <button type="button" class=" navbar-toggle collapsed" data-toggle="collapse" data-target="#links" aria-expanded="false">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
                    </button>
		</div>
		<div class="collapse navbar-collapse" id="links">
                    <div class="navbar-header">
			<ul class="nav navbar-nav">
                            <li><a href="#" >Home</a></li>
                             <li><a href="#vision">Vision</a></li>                      
                            <li><a href="#mission">Mission</a></li>
                            <li><a href="#objectives">Objectives</a></li>
			</ul>
                    </div>
		<div class="navbar-header navbar-right">
                    <ul class="nav navbar-nav ">
			<li><a role="button" data-toggle="modal" data-target="#modal-4">Register</a></li>
			<li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-hashpopup="true" aria-expanded="false">Login <span class="caret"></span></a>
				<ul class="dropdown-menu">
                                    <li class=""><a href="#" class=" black btn" data-toggle="modal" data-target="#modal-1">Student</a></li>
                                    <li  class="divider"></li>
                                    <li><a href="#" class="black btn" data-toggle="modal" data-target="#modal-5">Parent</a></li>
                                    <li  class="divider"></li>
                                    <li><a href="#" class="black btn" data-toggle="modal" data-target="#modal-2">Faculty</a></li>
                                    <li  class="divider"></li>
				</ul>
			</li>
                    </ul>
		</div>
		</div><!--end of div collapse-->
            </div><!--end of nav container -->
	</nav><!--end of nav tag-->