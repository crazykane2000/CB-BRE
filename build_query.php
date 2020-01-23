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
	<div class="container" style="background-color: #fff;padding: 30px;min-height: 800px;" >
		<div style="padding: 20px;"></div>
		<h4>Create Criteria </h4><hr/>
		<form action="make_query_handle.php" method="POST">
			<div class="row">
				<div class="col-lg-12">
					<div class="form-group">
						<label class="c-field__label">Select Rule </label>
						<select name="rule_name" class="c-input"  required="">
							<?php
								try {
					            $stmt = $pdo->prepare('SELECT * FROM `rule` ORDER BY date DESC');

					            } catch(PDOException $ex) {
					                echo "An Error occured!"; 
					                print_r($ex->getMessage());
					            }
					            $stmt->execute();
					            $user = $stmt->fetchAll();
					            //print_r($user);
					            foreach ($user as $key => $value) {
					            	echo '<option>'.$value['rule'].'</option>';
					            }
							 ?>
						</select>
					</div>
				</div>

				<div class="col-lg-3">
					<div class="form-group">
						<label class="c-field__label">Rule </label>
						<select name="rule[]" class="c-input"  required="">
							<option>has</option>
							<option>has</option>
						</select>
					</div>
				</div>

				<div class="col-lg-3">
					<div class="form-group">
						<label class="c-field__label">Enter the Trait </label>
						<input type="text" name="trait_name[]" class="c-input" placeholder="Enter trait Name" required="">
					</div>
				</div>

				<div class="col-lg-3">
					<div class="form-group">
						<label class="c-field__label">Comparison </label>
						<select name="comparison[]" class="c-input"  required="">
							<option>below</option>
							<option>above</option>
						</select>
					</div>
				</div>

				<div class="col-lg-3">
					<div class="form-group">
						<label class="c-field__label">Enter Value </label>
						<input type="text" name="value[]" class="c-input" placeholder="Enter Value Data" required="">
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-12">
					<div style="padding: 10px;"></div>
					<button class="c-btn c-btn--success u-mb-xsmall" type="submit" style="margin-left: 10px">Build  Rule</button>
				</div>
			</div>
		</form>
		</div>
	
         <?php include 'footer.php'; ?>
      </main>
    </div>
    <script src="js/neat.minc619.js?v=1.0"></script>
  </body>

</html>

