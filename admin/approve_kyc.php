<?php session_start();
    include '../administrator/connection.php';
    include '../administrator/function.php';
    $pdo_auth = authenticate_admin();
    $pdo = new PDO($dsn, $user, $pass, $opt);  
   
    $table = "kyc";
   
    $result = $pdo->exec("UPDATE `$table` SET `status`='Approved' WHERE `id`=".$_REQUEST['id']);
    $result = $pdo->exec("UPDATE `users` SET `kyc_approved`='Approved' WHERE `id`=".$_REQUEST['user_id']);
    header('Location:view_kyc.php?choice=success&value=KYC Approved Successfully');              
    exit();
?>
