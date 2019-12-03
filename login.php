<?php

/*
// if the user is logged in, redirect to main page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: index.php");
    exit;
}
*/

// database connection php
include('config.php');
$username = $password = "";
$username_err = $password_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
	//check if username is empty
	if(empty(trim($_POST["username"]))) {
		$username_err = "Please enter username.";
	} else {
		$username = trim($_POST["username"]);
	}

	//now check if pasword is empty
	if(empty(trim($_POST["password"]))) {
		$password_err = "Please enter password";
	} else {
		$password = trim($_POST["password"]);
	}

	// validate filled details
	if(empty($username_err) && empty($password_err)) {
		// prepare a select statement
		$sql = "SELECT id, name, password,webadmin FROM accounts WHERE name = ?";

		if($stmt = mysqli_prepare($link,$sql)) {
			// bind variables to the prepared statement as parameters
			mysqli_stmt_bind_param($stmt,"s",$param_username);

			// set parameters here
			$param_username = $username;

			// attempt to execute the statement
			if(mysqli_stmt_execute($stmt)) {
				// store the result
				mysqli_stmt_store_result($stmt);

				// if the username exists, verify password
				if(mysqli_stmt_num_rows($stmt) == 1) {
					mysqli_stmt_bind_result($stmt,$id,$username,$hashed_password,$role);

				if(mysqli_stmt_fetch($stmt)) {
					if(password_verify($password, $hashed_password)) {
						session_start(); //start new session if the password is correct


						// update and store data in this session 
						$_SESSION["loggedin"] = true;
						$_SESSION["id"] = $id;
						$_SESSION["webadmin"] = $role;
						$_SESSION["username"] = $username;

						// redirect user to corresponding page
						if($role == 0){
							header("location: index.php");
						} elseif ($role == 1) {
							header("location: admin.php");
						}
					} else {
						$password_err = "Incorrect password";
					}
				}
			} else {
				$username_err = "Incorrect username";
			}
		} else {
			echo " Something went wrong. Please try aagin later.";
		}
	}
	// close statement
	mysqli_stmt_close($stmt);
}

// close connection
mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
        </form>
    </div>    
</body>
</html>