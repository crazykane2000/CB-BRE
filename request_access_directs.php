<?php session_start();
    include 'administrator/connection.php';
    include 'administrator/function.php';
    $pdo_auth = authenticate();
    $pdo = new PDO($dsn, $user, $pass, $opt);  
   
    $darat = explode(" -- ", $_REQUEST['plan']);

    $table = "request_access";
    $key_list = "`vendor_tx`, `patient_tx`, `tx`,`status`,`plan`, `days`, `reward_point`";        
    $value_list  = "'".$pdo_auth['tx_address']."',";
    $value_list  .= "'".$_REQUEST['patient_tx']."',";
    $value_list  .= "'request_to_access',";
    $value_list  .= "'Pending',";
    $value_list  .= "'".$darat[0]."',";
    $value_list  .= "'".$_REQUEST['duration']."',";
    $value_list  .= "'".$darat[1]."'";

    //echo "INSERT INTO `$table` ($key_list) VALUES ($value_list)";
   
    $result = $pdo->exec("INSERT INTO `$table` ($key_list) VALUES ($value_list)");
    header('Location:view_request_to_access.php?choice=success&value=Support Request Added Successfully');              
    exit();
?>