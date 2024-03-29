<?php
    error_reporting(E_ALL ^ E_NOTICE);
    require_once('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-sacle=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="index.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container text-center">
        <h1>Registration Page</h1>
    </div>
	<?php include 'master.php';?>
    <div class="container">
        <form class="padding-top" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="form-row">
                <div class="form-group col-md-6" id="no-padding-right">
                    <label for="inputEmail">Email</label>
                    <input type="email" class="form-control" id="inputEmail" placeholder="Email" autocomplete="off" name="email" required>
                </div>
                <div class="form-group col-md-6" id="no-padding-right">
                    <label for="inputPassword">Password</label>
                    <input type="password" class="form-control" id="inputPassword" placeholder="Password" autocomplete="off" name="password" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6" id="no-padding-right">
                    <label for="inputFirstName">First Name</label>
                    <input type="firstName" class="form-control" id="inputFirstName" placeholder="First Name" autocomplete="off" name="firstName" required>
                </div>
                <div class="form-group col-md-6" id="no-padding-right">
                    <label for="inputLastName">Last Name</label>
                    <input type="lastName" class="form-control" id="inputLastName" placeholder="Last Name" autocomplete="off" name="lastName" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4" id="no-padding-right">
                    <label for="inputAccountType">Account Type</label>
                    <select id="inputAccountType" class="form-control" name="accountType" required>
                        <option value="">Choose...</option>
                        <?php
                        $types = ["Student", "Administrator"];
                        foreach ($types as $type) {
                            echo "<option value='$type'>$type</option>";
                        }
                        ?>
                    </select>
                </div>
			</div>
			<span class="input-group-btn">
                            <button type="submit" class="btn btn-primary" style="margin-top: 25px;">Register</button>
            </span>
            <?php 
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $email = test_input($_POST["email"]);
                    $password = test_input($_POST["password"]);
                    $firstName = test_input($_POST["firstName"]);
                    $lastName = test_input($_POST["lastName"]);
					$accountType = test_input($_POST["accountType"]);
                }
                function test_input($data) {
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    return $data;
                }

                if ($_POST != array()) {
                    $sql = "INSERT INTO `User` (email, password, firstName, lastName, userType) 
                    VALUES ('$email', '$password', '$firstName', '$lastName', '$accountType')";
                    $conn = connect_to_mysql();
					mysqli_query($conn, $sql);
                }
                
            ?>
        </form>
    </div>



</body>

<?php include 'footer.php';?>
</html>