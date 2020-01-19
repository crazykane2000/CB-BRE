<?php session_start();
    include 'administrator/connection.php';
    include 'administrator/function.php';
    $pdo_auth = authenticate();
    $pdo = new PDO($dsn, $user, $pass, $opt);  
   
    $table = "support";
    $key_list = "`username`, `subject`, `query`";        
    $value_list  = "'".$_REQUEST['username']."',";
    $value_list  .= "'".$_REQUEST['subject']."',";
    $value_list  .= "'".$_REQUEST['query']."'";
    
    $result = $pdo->exec("INSERT INTO `$table` ($key_list) VALUES ($value_list)");
    header('Location:view_support.php?choice=success&value=Support Request Added Successfully');              
    exit();
?>
