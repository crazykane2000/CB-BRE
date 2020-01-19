<?php session_start();
    //print_r($_REQUEST);
    include 'administrator/connection.php';
	$pdo = new PDO($dsn, $user, $pass, $opt);
	$user = $_REQUEST['user'];
	$email = $_REQUEST['user'];
	$pass = $_REQUEST['pass'];
	$role = $_REQUEST['type'];

	//print_r($_REQUEST);

	if(isset($_REQUEST['login'])){
		// check if the user has selected the role or not?
		if ($role=="") {
			header('Location:index.php?choice=error&value=Please Select a Role ');
			exit();
		}
		try {
		    $stmt = $pdo->prepare('SELECT * FROM `users` WHERE `email` = "'.$email.'" AND `password`="'.$pass.'" AND `verified`="Yes"');
		    echo 'SELECT * FROM `users` WHERE `email` = "'.$email.'" AND `password`="'.$pass.'" AND `verified`="Yes"';
		   } catch(PDOException $ex) {
		    echo "An Error occured!"; 
		    print_r($ex->getMessage());
		}
		
		$stmt->execute();
		$user = $stmt->fetch();
		$row_count = $stmt->rowCount();	
		echo $row_count;

		if($row_count>0){	
			$_SESSION['user'] = $email;
			$_SESSION['role'] = $role;
		 	$_SESSION['loged_primitives'] = md5($pass);
			header('Location:dashboard.php?choice=success&value=Login Successful, Welcome to User Panel');
			exit();
		}else{
			header('Location:index.php?choice=error&value=Please Relogin, Previous Supplied Credentials Were Wrong or Account was Not Verified');
			exit();
		}
	}
	

?>