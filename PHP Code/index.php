<?php
error_reporting(E_ALL ^ E_NOTICE);
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
<!DOCTYPE html>
<html lang='en'>
<head>
	<div class="jumbotron" style="background-color:teal">
	<title> Kelm University </title>
	<meta charset='utf-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1'/>
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css'>
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'>
</head>
<body>
<div class='container text-center'>
	<h1> Kelm University </h1>
	<h2> Course Enrollment System</h2>
</div>
	<?php require 'master.php';?>
<div class='container text-center'>	
	<p>Please Login or Register</p>
</div>


</body>
<div>
<?php require 'footer.php';?>
</div>
</html>