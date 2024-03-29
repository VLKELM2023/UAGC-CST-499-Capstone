<?php
error_reporting(E_ALL ^ E_NOTICE);
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

?>
<html lang='en'>
<head>
	<title> Login Page </title>
	<meta charset='utf-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1'/>
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css'>
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'>
</head>
<body>
<div class='container text-center'>
	<h1> Login Page </h1>
</div>

<?php require 'master.php';?>
<div class="container text-center">
	<form method="post">
	  <div class="form-group">
		<input type="email" class="form-control" id="InputEmail" aria-describedby="emailHelp" placeholder="Enter email" name="InputEmail">
	 </div>

	  <div class="form-group">
		<input type="password" class="form-control" id="InputPassword" placeholder="Password" name="InputPassword">
	  </div>
	  <button type="submit" class="btn btn-primary">Login</button>
</form>
</div>
<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

include_once('config.php');

// check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // check if the email and password are both provided
  if (isset($_POST['InputEmail']) && isset($_POST['InputPassword'])) {
    // connect to the database
    $db = connect_to_mysql();
    // check if the connection was successful
    if ($db->connect_error) {
      die('Connection failed: ' . $db->connect_error);
    }
    // escape the provided email and password to prevent SQL injection attacks
    $email = $db->real_escape_string($_POST['InputEmail']);
    $password = $db->real_escape_string($_POST['InputPassword']);
    // prepare the SQL statement
    $stmt = $db->prepare('SELECT * FROM User WHERE email = ? AND password = ?');
    // bind the provided email and password to the SQL statement
    $stmt->bind_param('ss', $email, $password);
    // execute the SQL statement
    $stmt->execute();
    // store the result of the SQL statement
    $result = $stmt->get_result();
    // check if the SQL statement returned a row (if the combination is valid)
    if ($result->num_rows > 0) {
      // set a session variable to indicate that the user is logged in
      $_SESSION['logged_in'] = true;
      $_SESSION['email'] = $email;
      $_SESSION['password'] = $password;
      // check if the user is an administrator
      $user = $result->fetch_assoc();
	  $_SESSION['userID'] = $user['userID'];
      if ($user['userType'] == 'Administrator') {
        $_SESSION['userType'] = 'Administrator';
      }
      // redirect the user to the home page
      header('Location: index.php');
      //closing script/session
      exit;
    } else {
      // the combination is invalid, display an error message
      $error_message = 'Invalid email or password';
    }
}
}
require 'footer.php';
?>
<?php if (isset($error_message)) { ?>
  <p><?php echo $error_message; ?></p>
<?php } ?>
</body>
</html>