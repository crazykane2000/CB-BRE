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
	<div class="container" style="padding: 30px;background-color: #fff;min-height: 800px;">
		<div style="padding: 20px;"></div>
		<h4>Executed Query with Selected Rule</h4>
		<div style="padding: 10px;"></div>
		<hr style="opacity: .3" />
		<div style="padding: 10px;"></div>
		<?php

			$curl = curl_init();
			$data = $_REQUEST['rule_name'];
			$rata = $_REQUEST['rule_json'];

			curl_setopt_array($curl, array(
			  CURLOPT_PORT => "1410",
			  CURLOPT_URL => "http://3.6.38.25:1410/rule/".$data."/execute",
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "POST",
			  CURLOPT_POSTFIELDS => $rata,
			  CURLOPT_HTTPHEADER => array(
			    "Content-Type: application/json",
			    "Postman-Token: 45983fde-296e-441a-823d-36ca68b3e016",
			    "cache-control: no-cache"
			  ),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
			  echo "cURL Error #:" . $err;
			} else {
			  //echo $response;
				$fata = json_decode($response,true);
				echo "<div style='color:#333;font-size:15px;'>Weightage : ".$fata['weightage']."</div>";
				if ($fata['weightage']==4.5) {
					echo '<h4 style="color:green">ALL IDENTIFIERS MATCH CANDIDATE</h4>';
				}elseif ($fata['weightage']>0 && $fata['weightage']<4.5 ) {
					echo '<h4 style="color:orange">ALL IDENTIFIERS QUALIFY FOR APPROVAL (Partial Match)</h4>';
				}else
				{
					echo '<h4 style="color:red">NO IDENTIFIERS QUALIFY FOR APPROVAL</h4>';
				}
			}

			?>
	</div>
 	<?php include 'footer.php'; ?>
      </main>
    </div>
    <script src="js/neat.minc619.js?v=1.0"></script>
  </body>

</html>

