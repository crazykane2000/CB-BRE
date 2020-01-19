<?php session_start();
    include '../administrator/connection.php';
    include '../administrator/function.php';
    $pdo_auth = authenticate_admin();
    $pdo = new PDO($dsn, $user, $pass, $opt);  
   
    $table = "request_access";

    $data = get_data_id_data("request_access", "id", $_REQUEST['id']);
    $patient_address = $data['patient_tx'];
    $vendor_address = $data['vendor_tx'];

    $data = whitelist_vendor($patient_address, $vendor_address);
    $data = json_decode($data,true);

   
    $result = $pdo->exec("UPDATE `$table` SET `status`='Approved', `tx`='".$data."' WHERE `id`=".$_REQUEST['id']);
    header('Location:patient_data_access.php?choice=success&value=Access Approved Successfully');              
    exit();
?>