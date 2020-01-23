<?php session_start();
	include 'connection.php';
	//$pdo_auth = authenticate();
	$pdo = new PDO($dsn, $user, $pass, $opt); 
	
	try {
          $stmt = $pdo->prepare('DELETE FROM `rule` WHERE `id`='.$_REQUEST['id']);
      } catch(PDOException $ex) {
          echo "An Error occured!"; 
          print_r($ex->getMessage());
      }
      $stmt->execute();
     header('Location:view_rules.php?choice=success&value=Rule Deleted Successfully');
     exit();
	
?>