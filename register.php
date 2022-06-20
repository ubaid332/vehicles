<?php
//start session
session_start();
include_once('User.php');
	

	//redirect if logged in
	if(isset($_SESSION['user'])){
		header('location:vehicles.php');
	}



$user = new User();

if(isset($_POST['register'])){
    $name = $user->escape_string($_POST['name']);
	$username = $user->escape_string($_POST['username']);
	$password = $user->escape_string($_POST['password']);

    $user_exist = $user->details("SELECT * FROM users WHERE username = '$username'");
    if(isset($user_exist) && count($user_exist)>=1)
    {
        header('location:register.php?error=This user already exist please try another');
    }
    else{
        if(!$user->insert($name, $username, $password)){
            $_SESSION['message'] = 'There is some error in query '.$this->connection->error;
            header('location:register.php');
        }
        else{
            
            header('location:index.php?msg=registration successful please login');
        }
    }
	
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Register User</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
	<h1 class="page-header text-center">Register User</h1>
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
            <?php
            if(isset($_GET['error'])){
                echo "<div class='alert alert-danger'>$_GET[error]</div>";
            }
            ?>
		    <div class="login-panel panel panel-primary">
		        <div class="panel-heading">
		            <h3 class="panel-title"><span class="glyphicon glyphicon-lock"></span> Register
		            </h3>
		        </div>
		    	<div class="panel-body">
		        	<form method="POST" action="register.php">
		            	<fieldset>
                        <div class="form-group">
		                    	<input class="form-control" placeholder="Name" type="text" name="name" autofocus required>
		                	</div>
		                	<div class="form-group">
		                    	<input class="form-control" placeholder="Username" type="text" name="username" required>
		                	</div>
		                	<div class="form-group">
		                    	<input class="form-control" placeholder="Password" type="password" name="password" required>
		                	</div>
		                	<button type="submit" name="register" class="btn btn-lg btn-primary btn-block"><span class="glyphicon glyphicon-user"></span> Register</button>
		            	</fieldset>
		        	</form>
		    	</div>
                <a href="login.php" class="link text-center" style="display:block">Already User? Click to Login</a>
		    </div>
		    <?php
		    	if(isset($_SESSION['message'])){
		    		?>
		    			<div class="alert alert-info text-center">
					        <?php echo $_SESSION['message']; ?>
					    </div>
		    		<?php

		    		unset($_SESSION['message']);
		    	}
		    ?>
		</div>
	</div>
</div>
</body>
</html>