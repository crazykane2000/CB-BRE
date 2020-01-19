<?php session_start();
    include 'administrator/connection.php';
    include 'administrator/function.php';
    $pdo_auth = authenticate();
    $pdo = new PDO($dsn, $user, $pass, $opt); 
    if($_REQUEST['amount']==""){
      redirectTo("buy.php","error","Amount or Tokens cant be Less than Zero");
      exit();
    }
    
    add_wallet_balance($pdo_auth['tx_address'],$_REQUEST['bbt']);
   
    $table = "buy_token";
	  $key_list = "`user_id`,`user_name`, `email`, `tx_address`, `amount`, `no_of_tokens`, `buy_tx_id`, `currency`";
	  $value_list = "'".$pdo_auth['id']."',";
	  $value_list.= "'".$pdo_auth['name']."',";
	  $value_list.="'".$pdo_auth['email']."',";
	  $value_list.="'".$pdo_auth['tx_address']."',";
	  $value_list.="'".$_REQUEST['amount']."',";
    $value_list.="'".$_REQUEST['bbt']."',";
    $value_list.="'".$_REQUEST['tx_idd']."',";
	  $value_list.="'".$_REQUEST['currency']."'";
	  
    //echo "INSERT INTO `$table` ($key_list) VALUES ($value_list)";
	   $result = $pdo->exec("INSERT INTO `$table` ($key_list) VALUES ($value_list)");
     add_notification("A Buy Request has been Initiated", "admin");
     header('Location:wallet.php?choice=success&value=Your Buy Request has Been Initiated');
     exit();
?>