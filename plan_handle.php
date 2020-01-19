<?php session_start();
    include 'administrator/connection.php';
    include 'administrator/function.php';
    $pdo_auth = authenticate();
    $pdo = new PDO($dsn, $user, $pass, $opt);  
   
    $table = "plan";
    $key_list = "`tx`, `disease`, `reward`";        
    $value_list  = "'".$pdo_auth['tx_address']."',";
    $value_list  .= "'".$_REQUEST['disease']."',";
    $value_list  .= "'".$_REQUEST['reward']."'";
    
    $result = $pdo->exec("INSERT INTO `$table` ($key_list) VALUES ($value_list)");
    header('Location:plans.php?choice=success&value=plan Added Successfully');              
    exit();
?>
