<?php session_start();
	include 'connection.php';
	//$pdo_auth = authenticate();
	$pdo = new PDO($dsn, $user, $pass, $opt); 

  // json API call here Only 

  //print_r($_REQUEST);

    $curl = curl_init();
    $data = $_REQUEST['rule_json'];

    curl_setopt_array($curl, array(
      CURLOPT_PORT => "1410",
      CURLOPT_URL => "http://3.6.38.25:1410/rule",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => $data,
      CURLOPT_HTTPHEADER => array(
        "Content-Type: application/json",
        "Postman-Token: 8bc04890-f63e-412d-a690-4e1a2e9ecbbc",
        "cache-control: no-cache"
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      $data = json_decode($response, TRUE);
      //print_r($data);
      try {
            $stmt = $pdo->prepare('INSERT INTO `rule`(`rule`, `description`, `rule_json`, `rule_tx`) VALUES ("'.$_REQUEST['rule_name'].'", "'.$_REQUEST['rule_desc'].'", "'.htmlentities($_REQUEST['rule_json']).'","'.$data['_id'].'")');
        } catch(PDOException $ex) {
            echo "An Error occured!"; 
            print_r($ex->getMessage());
        }
        $stmt->execute();
       header('Location:view_rules.php?choice=success&value=Rule Added Successfully');
       exit();
    }
    
    
	
	
?>