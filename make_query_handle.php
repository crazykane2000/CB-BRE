<?php session_start();
    include 'administrator/connection.php';
    include 'administrator/function.php';
    $pdo_auth = authenticate();
    $pdo = new PDO($dsn, $user, $pass, $opt);  
    error_reporting(E_ALL & ~E_NOTICE);
    if ($pdo_auth['kyc_approved']=="Pending") {
      header('Location:kyc.php?choice=error&value=Your KYC is Pending, You can Trade once KYC Is Approved');
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dashboard  | Career Builder</title>
    <meta name="description" content="Career Builder">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/neat.minc619.css?v=1.0">
        <style type="text/css">
    	.form-group{
    		padding: 10px;
    	}

    	.form-group label{
    		font-weight: bold;
    	}
    </style>
  </head>
  <body>

    <div class="o-page">
      <?php include 'sidebar.php'; ?>

      <main class="o-page__content">
        <?php include 'header.php'; ?>
	<div class="container" style="padding: 30px;background-color: #fff;" >
		<div style="padding: 20px;"></div>
		<h4>View Query Builded</h4><hr/>
		<?php 
			$array = array();
			$i=0;
			for($j=0;$j<count($_REQUEST['rule']);$j++){
				$ratay=array("trait"=>$_REQUEST['trait_name'][$j], "Ben"=>$_REQUEST['comparison'][$j], "value"=>$_REQUEST['value'][$j]);
				$array[$_REQUEST["rule_name"]]["comparison"][$j]["has"]=$ratay;
			}

			//print_r($array);
			$data = json_encode($array,JSON_PRETTY_PRINT);
			echo "<pre>".$data."</pre>";
		 ?>
         <?php include 'footer.php'; ?>
      </main>
    </div>
    <script src="js/neat.minc619.js?v=1.0"></script>
  </body>

</html>

