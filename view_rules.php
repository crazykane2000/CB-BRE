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

		<div style="padding: 30px;background-color: #fff;min-height: 800px;">
			<div class="container-fluid" >
			<div style="padding: 20px;"></div>
			<h4>View Rules</h4><hr style="opacity: .2" />
			<div style="padding: 10px;"></div>
			<table class="c-table table-striped" style="font-size: 13px;">
				<thead class="c-table__head">
					<th class="c-table__cell c-table__cell--head">S.No.</th>
					<th class="c-table__cell c-table__cell--head">Rule Name</th>
					<th class="c-table__cell c-table__cell--head">Rule Tx</th>
					<th class="c-table__cell c-table__cell--head">Desc.</th>
					<th class="c-table__cell c-table__cell--head">Date</th>
					<th class="c-table__cell c-table__cell--head">Action</th>
				</thead>
				<tbody>
					<?php
					$i=1;
					try {
			              $stmt = $pdo->prepare('SELECT * FROM rule ORDER BY date DESC');
			              //echo 'SELECT * FROM franchisie_details WHERE email = :user';
			          } catch(PDOException $ex) {
			              echo "An Error occured!"; 
			              print_r($ex->getMessage());
			          }
			          $stmt->execute();
			          $user = $stmt->fetchAll();
			          foreach ($user as $key => $value) {
			          	echo '<tr class="c-table__row">
								<td class="c-table__cell">'.$i.'</td>
								<td class="c-table__cell"><b>'.$value['rule'].'</b></td>
								<td class="c-table__cell"><b>'.$value['rule_tx'].'</b></td>
								<td class="c-table__cell">'.$value['description'].'</td>
								<td class="c-table__cell">'.$value['date'].'</td>
								<td class="c-table__cell"><a target="_blank" href="view_rule_set.php?data='.$value['rule_tx'].'" class="c-btn c-btn--small">View Rule Set</a></td>
							</tr>';
							$i++;
			          }
						
					?>
				</tbody>
			</table>
	      
        </div>
		</div>
		<div style="padding: 15px;"></div>
	         <?php include 'footer.php'; ?>
      </main>
    </div>
    <script src="js/neat.minc619.js?v=1.0"></script>
  </body>

</html>