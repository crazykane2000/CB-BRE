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
  </head>
  <body>

    <div class="o-page">
      <?php include 'sidebar.php'; ?>

      <main class="o-page__content">
        <?php include 'header.php'; ?>
	<div class="container" style="background-color: #fff;padding:30px;" >
		<div style="padding: 20px;"></div>
		<h4>View Rule : <span style="color: #999"><?php echo $_REQUEST['data']; ?></span></h4><hr style="opacity: .3" />
		<?php

				$curl = curl_init();
				curl_setopt_array($curl, array(
				  CURLOPT_PORT => "1410",
				  CURLOPT_URL => "http://3.6.38.25:1410/rule/".$_REQUEST['data'],
				  CURLOPT_RETURNTRANSFER => true,
				  CURLOPT_ENCODING => "",
				  CURLOPT_MAXREDIRS => 10,
				  CURLOPT_TIMEOUT => 30,
				  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				  CURLOPT_CUSTOMREQUEST => "GET",
				  CURLOPT_POSTFIELDS => "",
				  CURLOPT_HTTPHEADER => array(
				    "Postman-Token: 2d712ff9-0e54-4736-b2f6-949b1b80669e",
				    "cache-control: no-cache"
				  ),
				));

				$response = curl_exec($curl);
				$err = curl_error($curl);

				curl_close($curl);

				if ($err) {
				  echo "cURL Error #:" . $err;
				}

				$i=1;
				$user = json_decode($response,true);

				//print_r($user);

				$dol = json_encode($user,JSON_PRETTY_PRINT);
				echo "<pre>".$dol."</pre>";
		          
					
				?>
         <?php include 'footer.php'; ?>
      </main>
    </div>
    <script src="js/neat.minc619.js?v=1.0"></script>
  </body>

</html>

