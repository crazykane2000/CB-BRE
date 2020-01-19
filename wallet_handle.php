<?php session_start();
    include 'administrator/connection.php';
    include 'administrator/function.php';
    $pdo_auth = authenticate();
    $pdo = new PDO($dsn, $user, $pass, $opt);  

	add_wallet_balance($pdo_auth['tx_address'],$_REQUEST['amount']);
	add_notification("$amount Tokens Added to $tx_address", "admin");      
	header('Location:wallet.php?choice=success&value=Tokens Added Successfully');
    exit();
 ?>