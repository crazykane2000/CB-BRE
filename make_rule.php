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

        <div class="container-fluid">
			<div class="col-sm-6">
				<div class="" style="background-color: #fff;padding: 30px;" >
				<div style="padding: 20px;"></div>
				<h4>Create New Rule</h4><hr/>
				<form action="make_rule_handle.php" method="POST">
					<div class="form-group">
						<label class="c-field__label">Enter the Name of Rule </label>
						<input type="text" name="rule_name" class="c-input" placeholder="Enter Rule Name" required="">
					</div>

					<div class="form-group">
						<label class="c-field__label">Rule Description </label>
						<input type="text" name="rule_desc" class="c-input" placeholder="Enter Rule Description" required="">
					</div>

					<div class="form-group">
						<label class="c-field__label">Paste JSon Here </label>
						<textarea name="rule_json" class="c-input" placeholder="Enter Rule JSon" rows="6" required=""></textarea>
					</div>

					<div class="form-group">
						<button type="submit" class="c-btn c-btn--success u-mb-xsmall">Create Rule</button>
					</div>


				</form>
		          <div style="padding: 15px;"></div>
		         <?php include 'footer.php'; ?>
		    </div>
			</div>
      </main>
    </div>
    <script src="js/neat.minc619.js?v=1.0"></script>
  </body>

</html>