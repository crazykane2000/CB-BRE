<?php session_start();
    include '../administrator/connection.php';
    include '../administrator/function.php';
    $pdo_auth = authenticate_admin();
    $pdo = new PDO($dsn, $user, $pass, $opt);  
   
    $table = "support";

   

   
    $result = $pdo->exec("UPDATE `$table` SET `status`='Resolved',`answer`='".$_REQUEST['answer']."', `status`='".$_REQUEST['status']."' WHERE `id`=".$_REQUEST['id']);
    //echo "UPDATE `$table` SET `status`='Resolved',``='".$_REQUEST['answer']."', `status`='".$_REQUEST['status']."' WHERE `id`=".$_REQUEST['id'];
    header('Location:view_support.php?choice=success&value=Query Resolved Successfully');              
    exit();
?>