<?php session_start();
  include 'administrator/connection.php';
  include 'administrator/function.php';
  $pdo = new PDO($dsn, $user, $pass, $opt);
  //print_r($_REQUEST);

  try {
      $stmt = $pdo->prepare('SELECT email FROM `users` WHERE `email`="'.$_REQUEST['email'].'"  ORDER BY date DESC ');
  } catch(PDOException $ex) {
      echo "An Error occured!"; 
      print_r($ex->getMessage());
  }

  $stmt->execute();
  $user = $stmt->fetchAll();
  $count = count($user);  
  if($count>0){
    //echo "ha";
    header('Location:register.php?choice=error&value=A User with Either Same Email or Same Transaction Address Already Exist');
    exit();
  }
  if(isset($_REQUEST['register'])){
      $response = "";
      $curl = curl_init();
      $pass =  $_REQUEST['password'];
      curl_setopt_array($curl, array(
        CURLOPT_PORT => "3005",
        CURLOPT_URL => "http://13.233.7.230:3005/api/dataManager/generate/token/vendor",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "{\n  \"_password\" : \"$pass\"\n}\n",
        CURLOPT_HTTPHEADER => array(
          "Content-Type: application/json",
          "Postman-Token: 2b3d4490-1590-46e1-8c6b-5bdac8703a41",
          "cache-control: no-cache"
        ),
      ));

      $response = curl_exec($curl);
      $err = curl_error($curl);

      curl_close($curl);

      if ($err) {
        header('Location:index.php?choice=error&value=Blockchain Error!'.$err);
      } else {
        $table = "users";
        $pass = $_REQUEST['password'];
        // $uniq = get_new_address($pass);
        // $uniq = json_decode($uniq,true);
        // $uniq = $uniq['address'];
        $response = json_decode($response,true);
        //print_r($response);
        $uniq = $response['address'];
        // add 500 Token Balance Default
        $tx_address = $uniq;
        $amount = 500;
        add_wallet_balance($tx_address,$amount);

        $key_list = "`name`, `email`, `verified`, `password`,`tx_address`, `country`, `type`";
        $value_list = "'".$_REQUEST['name']."',";
        $value_list.="'".$_REQUEST['email']."',";
        $value_list.="'Yes',";
        $value_list.="'".$pass."',";
        $value_list.="'".$uniq."',";
        $value_list.="'".$_REQUEST['country']."',";
        $value_list.="'".$_REQUEST['type']."'";


        $result = $pdo->exec("INSERT INTO `$table` ($key_list) VALUES ($value_list)");
       // echo "INSERT INTO `$table` ($key_list) VALUES ($value_list)";

        add_notification("A New User Created", "admin");      
        header('Location:index.php?choice=success&value=Added Successfully');
        exit();
        }
    }
?>