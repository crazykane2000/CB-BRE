<?php
function add_notification($notification, $for){
    include 'connection.php';
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        $pdo = new PDO($dsn, $user, $pass, $opt);
        $table = "notification";
        $key_list = "`notification`, `for`";
        $value_list = "'".$notification."', '".$for."'";
        $result = $pdo->exec("INSERT INTO `$table` ($key_list) VALUES ($value_list)");
    }

    function strip_comma($data){
      $data = str_replace(",", "", $data);
      return $data;
    }

    function see_status($data){
      if(isset($_REQUEST['choice'])){
         if($data['choice']=="success")
        { echo '<div  style="padding:10px;color:#fff;background-color:green;text-transform:capitalize;text-align:center">'.$data['value'].'</div>'; }
        else { echo '<div  style="padding:10px;color:#fff;background-color:red;text-transform:capitalize;text-align:center">'.$data['value'].'</div>';   }
      }
    }

        function see_status2($data){
      if(isset($_REQUEST['choice'])){
         if($data['choice']=="success")
              {
                echo '<div class="alert alert-success alert-dismissible fade in" role="alert" style="margin-bottom:0px;text-align:center;position:absolute;z-index:1000;right:0px;">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <strong>'.$data['value'].'</strong>
                    </div>';
              }
        else { echo '<div class="alert alert-danger alert-dismissible fade in" role="alert" style="margin-bottom:0px;text-align:center;position:absolute;z-index:1000;right:0px;">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <strong>'.$data['value'].'</strong>
                    </div>';  
              }
      }
    }

     function authenticate(){
    if(isset($_SESSION['user'], $_SESSION['loged_primitives']))
      {
         include 'connection.php';
          $pdo = new PDO($dsn, $user, $pass, $opt);
          try {
              $stmt = $pdo->prepare('SELECT * FROM users WHERE email = :user');
          } catch(PDOException $ex) {
              echo "An Error occured!";
              print_r($ex->getMessage());
          }
          $stmt->execute(['user' => $_SESSION['user']]);
          $user = $stmt->fetch();

          //print_r($user);
          $row_count = $stmt->rowCount();
         
          $pass = md5($user['password']);
          //echo $pass;
          if($pass != $_SESSION['loged_primitives'])
          {
             header('Location:sign_in.php?choice=error&value=Session timed out. Login again.');
          }
           return $user;      }
      else
      {
        header('Location:sign_in.php?choice=error&value=Session timed out. Login again.');
      }
       return $user;
  }

  function authenticate_admin(){
    if(isset($_SESSION['administrator'], $_SESSION['loged_primitives']))
      {
         include 'connection.php';
          $pdo = new PDO($dsn, $user, $pass, $opt);
          try {
              $stmt = $pdo->prepare('SELECT * FROM administrator_super_user WHERE email = :user');
          } catch(PDOException $ex) {
              echo "An Error occured!";
              print_r($ex->getMessage());
          }
          $stmt->execute(['user' => $_SESSION['administrator']]);
          $administrator = $stmt->fetch();
          $row_count = $stmt->rowCount();
          //print_r($user);
         
          $pass = md5($administrator['password']);
          if($pass != $_SESSION['loged_primitives'])
          {
             header('Location:index.php?choice=error&value=Session Out, Please do Login Again.');
          }
           return $administrator;      }
      else
      {
        header('Location:index.php?choice=error&value=Session Out, Please do Login Again.');
      }
       return $administrator;
  }



  function get_assets_log(){

    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_PORT => "3002",
      CURLOPT_URL => "http://13.233.7.230:3002/api/dataManager/get/assetLogs",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_POSTFIELDS => "",
      CURLOPT_HTTPHEADER => array(
        "Content-Type: application/json",
        "Postman-Token: f2063cfa-040d-4d68-a37e-7898d555ac30",
        "cache-control: no-cache"
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      return "cURL Error #:" . $err;
    } else {
      return $response;
    }
  }

  function get_patients(){
    $curl = curl_init();

      curl_setopt_array($curl, array(
        CURLOPT_PORT => "3005",
        CURLOPT_URL => "http://13.233.7.230:3005/api/dataManager/get/patients",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_POSTFIELDS => "",
        CURLOPT_HTTPHEADER => array(
          "Content-Type: application/json",
          "Postman-Token: adb3abb8-a944-46ed-970c-9adb99d79441",
          "cache-control: no-cache"
        ),
      ));

      $response = curl_exec($curl);
      $err = curl_error($curl);

      curl_close($curl);

      if ($err) {
        return "cURL Error #:" . $err;
      } else {
        return $response;
      }
  }

  function add_wallet_balance($tx_address,$amount){
      $data = "{\n  \"_userAddress\": \"$tx_address\",\n  \"_amount\": \"$amount\"\n}";
      $curl = curl_init();
      curl_setopt_array($curl, array(
        CURLOPT_PORT => "3005",
        CURLOPT_URL => "http://13.233.7.230:3005/api/dataManager/add/tokens",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => $data,
        CURLOPT_HTTPHEADER => array(
          "Content-Type: application/json",
          "Postman-Token: 30f7c551-fc70-4927-9e6c-df6a9515e5a8",
          "cache-control: no-cache"
        ),
      ));

      $response = curl_exec($curl);
      $err = curl_error($curl);

      curl_close($curl);

      if ($err) {
        return "cURL Error #:" . $err;
      } else {
        return $response;
      }
  }


  function get_wallet_balance($tx_address){
    $curl = curl_init();

      curl_setopt_array($curl, array(
        CURLOPT_PORT => "3005",
        CURLOPT_URL => "http://13.233.7.230:3005/api/dataManager/get/walletBalance",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "{\n  \"_userAddress\": \"$tx_address\"\n}",
        CURLOPT_HTTPHEADER => array(
          "Content-Type: application/json",
          "Postman-Token: b428899c-b522-474b-93d4-0deecb6f5be3",
          "cache-control: no-cache"
        ),
      ));

      $response = curl_exec($curl);
      $err = curl_error($curl);

      curl_close($curl);

      if ($err) {
        return "cURL Error #:" . $err;
      } else {
        return $response;
      }
  }

  function authenticate_franchie(){
    if(isset($_SESSION['card_id'], $_SESSION['pin']))
      {
         include 'connection.php';
          $pdo = new PDO($dsn, $user, $pass, $opt);
          try {
              $stmt = $pdo->prepare('SELECT * FROM franchisie_details WHERE email = :user');
              //echo 'SELECT * FROM franchisie_details WHERE email = :user';
          } catch(PDOException $ex) {
              echo "An Error occured!";
              print_r($ex->getMessage());
          }
          $stmt->execute(['user' => $_SESSION['card_id']]);
          $user = $stmt->fetch();

          //print_r($user);
          $row_count = $stmt->rowCount();
         
          $pass = md5($user['password']);
          //echo $pass;
          if($pass != $_SESSION['pin'])
          {
             header('Location:sign_in.php?choice=error&value=Session timed out. Login again.');
          }
           return $user;      }
      else
      {
         //header('Location:sign_in.php?choice=error&value=Session timed out. Login again.');
      }
       return $user;
  }



    function get_new_address($pass){
      $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_PORT => "3002",
          CURLOPT_URL => "http://13.233.7.230:3002/api/dataManager/create/newAccount",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => "{\n  \"_password\" : \"pass1\"\n}\n",
          CURLOPT_HTTPHEADER => array(
            "Content-Type: application/json",
            "Postman-Token: 61e30b56-076f-4b68-adde-d147b61986bf",
            "cache-control: no-cache"
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
         return "cURL Error #:" . $err;
        } else {
          return $response;
        }
    }

    function get_data_col($table, $col, $value){
       include 'connection.php';
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        $pdo = new PDO($dsn, $user, $pass, $opt);        
                         
      try {
          $stmt = $pdo->prepare('SELECT * FROM `'.$table.'` WHERE `'.$col.'`="'.$value.'"  ORDER BY date DESC');
          //echo 'SELECT * FROM `'.$table.'` WHERE `'.$col.'`="'.$value.'"  ORDER BY date DESC';
      } catch(PDOException $ex) {
          echo "An Error occured!";
          print_r($ex->getMessage());
      }
      $stmt->execute();
      $user = $stmt->fetchAll();
      return $user;
    }

     function get_count_items($table, $col, $value){
       include 'connection.php';
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        $pdo = new PDO($dsn, $user, $pass, $opt);        
                         
      try {
          $stmt = $pdo->prepare('SELECT * FROM `'.$table.'` WHERE `'.$col.'`="'.$value.'"  ORDER BY date DESC ');
      } catch(PDOException $ex) {
          echo "An Error occured!";
          print_r($ex->getMessage());
      }
      $stmt->execute();
      $user = $stmt->rowCount();
      return $user;
    }

    function get_count_items_andd($table, $col, $value, $col2,$value2){
       include 'connection.php';
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        $pdo = new PDO($dsn, $user, $pass, $opt);        
                         
      try {
          $stmt = $pdo->prepare('SELECT * FROM `'.$table.'` WHERE `'.$col.'`="'.$value.'" AND  `'.$col2.'`="'.$value2.'" AND `status`="Approved" ORDER BY date DESC ');
      } catch(PDOException $ex) {
          echo "An Error occured!";
          print_r($ex->getMessage());
      }
      $stmt->execute();
      $user = $stmt->rowCount();
      return $user;
    }


    function get_data_items_andd($table, $col, $value, $col2,$value2){
       include 'connection.php';
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        $pdo = new PDO($dsn, $user, $pass, $opt);        
                         
      try {
          $stmt = $pdo->prepare('SELECT * FROM `'.$table.'` WHERE `'.$col.'`="'.$value.'" AND  `'.$col2.'`="'.$value2.'" ORDER BY date DESC ');
      } catch(PDOException $ex) {
          echo "An Error occured!";
          print_r($ex->getMessage());
      }
      $stmt->execute();
      $user = $stmt->fetch();
      return $user;
    }

    function count_whitelisted($table, $col, $value){
       include 'connection.php';
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        $pdo = new PDO($dsn, $user, $pass, $opt);        
                         
      try {
        //echo 'SELECT * FROM `'.$table.'` WHERE `'.$col.'`="'.$value.'" AND `status`="Approved"  ORDER BY date DESC ';
          $stmt = $pdo->prepare('SELECT * FROM `'.$table.'` WHERE `'.$col.'`="'.$value.'" AND `status`="Approved"  ORDER BY date DESC ');
      } catch(PDOException $ex) {
          echo "An Error occured!";
          print_r($ex->getMessage());
      }
      $stmt->execute();
      $user = $stmt->rowCount();
      return $user;
    }

function get_data_id($table){
        include 'connection.php';
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        $pdo = new PDO($dsn, $user, $pass, $opt);        
                         
      try {
          $stmt = $pdo->prepare('SELECT * FROM `'.$table.'`  ORDER BY date DESC ');
      } catch(PDOException $ex) {
          echo "An Error occured!";
          print_r($ex->getMessage());
      }
      $stmt->execute();
      $user = $stmt->fetch();
      return $user;
    }

     function fetch_all_popo($table){
         include 'connection.php';
        // echo 'SELECT * FROM `'.$table.'` WHERE `'.$column.'`='.$id.' ORDER BY date DESC';
         $pdo = new PDO($dsn, $user, $pass, $opt);
         try {
            $stmt = $pdo->prepare('SELECT * FROM `'.$table.'` ORDER BY date DESC');

            } catch(PDOException $ex) {
                echo "An Error occured!";
                print_r($ex->getMessage());
            }
            $stmt->execute();
            $user = $stmt->fetchAll();
            return $user;
    }

    function fetch_all_popo_without_date($table){
         include 'connection.php';
        // echo 'SELECT * FROM `'.$table.'` WHERE `'.$column.'`='.$id.' ORDER BY date DESC';
         $pdo = new PDO($dsn, $user, $pass, $opt);
         try {
            $stmt = $pdo->prepare('SELECT * FROM `'.$table.'`');

            } catch(PDOException $ex) {
                echo "An Error occured!";
                print_r($ex->getMessage());
            }
            $stmt->execute();
            $user = $stmt->fetchAll();
            return $user;
    }



    function fetch_menus_with_id($table){
         include 'connection.php';
        // echo 'SELECT * FROM `'.$table.'` WHERE `'.$column.'`='.$id.' ORDER BY date DESC';
         $pdo = new PDO($dsn, $user, $pass, $opt);
         try {
            $stmt = $pdo->prepare('SELECT `menu_name`, `id` FROM `'.$table.'` ORDER BY date DESC');

            } catch(PDOException $ex) {
                echo "An Error occured!";
                print_r($ex->getMessage());
            }
            $stmt->execute();
            $user = $stmt->fetchAll();
            return $user;
    }



     function fetch_all_popo_col($table, $col){
         include 'connection.php';
        // echo 'SELECT * FROM `'.$table.'` WHERE `'.$column.'`='.$id.' ORDER BY date DESC';
         $pdo = new PDO($dsn, $user, $pass, $opt);
         try {
            $stmt = $pdo->prepare('SELECT * FROM `'.$table.'` ORDER BY '.$col);

            } catch(PDOException $ex) {
                echo "An Error occured!";
                print_r($ex->getMessage());
            }
            $stmt->execute();
            $user = $stmt->fetchAll();
            return $user;
    }


    function fetch_all_popo_alpha($table){
         include 'connection.php';
        // echo 'SELECT * FROM `'.$table.'` WHERE `'.$column.'`='.$id.' ORDER BY date DESC';
         $pdo = new PDO($dsn, $user, $pass, $opt);
         try {
            $stmt = $pdo->prepare('SELECT * FROM `'.$table.'` ORDER BY  `category`');

            } catch(PDOException $ex) {
                echo "An Error occured!";
                print_r($ex->getMessage());
            }
            $stmt->execute();
            $user = $stmt->fetchAll();
            return $user;
    }


      function get_data_id2($table){
        include 'connection.php';
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
            $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
            $opt = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
        $pdo = new PDO($dsn, $user, $pass, $opt);        
                         
      try {
          $stmt = $pdo->prepare('SELECT * FROM `'.$table.'`  ORDER BY date DESC ');
      } catch(PDOException $ex) {
          echo "An Error occured!";
          print_r($ex->getMessage());
      }
      $stmt->execute();
      $user = $stmt->fetch();
      return $user;
    }


    function fetch_last($table){
        include 'connection.php';
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
            $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
            $opt = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
        $pdo = new PDO($dsn, $user, $pass, $opt);        
                         
      try {
          $stmt = $pdo->prepare('SELECT * FROM `'.$table.'`  ORDER BY date DESC LIMIT 1');
      } catch(PDOException $ex) {
          echo "An Error occured!";
          print_r($ex->getMessage());
      }
      $stmt->execute();
      $user = $stmt->fetch();
      return $user;
    }


     function get_data_id_data($table, $col, $id){
        include 'connection.php';
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
            $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
            $opt = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
        $pdo = new PDO($dsn, $user, $pass, $opt);        
                         
      try {
          $stmt = $pdo->prepare('SELECT * FROM `'.$table.'` WHERE `'.$col.'`="'.$id.'" ORDER BY date DESC ');
      } catch(PDOException $ex) {
          echo "An Error occured!";
          print_r($ex->getMessage());
      }
      $stmt->execute();
      $user = $stmt->fetch();
      return $user;
    }


    function get_asset_details($asset_id){
      $curl = curl_init();

      curl_setopt_array($curl, array(
        CURLOPT_PORT => "3002",
        CURLOPT_URL => "http://13.233.7.230:3002/api/dataManager/get/assetDetails",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "{\n  \"_assetId\": \"$asset_id\"\n}",
        CURLOPT_HTTPHEADER => array(
          "Content-Type: application/json",
          "Postman-Token: aa827e0a-ed3d-43df-811e-02ea0727cfff",
          "cache-control: no-cache"
        ),
      ));

      $response = curl_exec($curl);
      $err = curl_error($curl);

      curl_close($curl);

      if ($err) {
        return "cURL Error #:" . $err;
      } else {
        return $response;
      }
    }

    function get_asset_status($asset_id){
      $curl = curl_init();

          curl_setopt_array($curl, array(
            CURLOPT_PORT => "3002",
            CURLOPT_URL => "http://13.233.7.230:3002/api/dataManager/get/assetStatus",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{\n  \"_assetId\": \"$asset_id\"\n}",
            CURLOPT_HTTPHEADER => array(
              "Content-Type: application/json",
              "Postman-Token: feb0445a-7698-412a-89f5-6c9e7276797d",
              "cache-control: no-cache"
            ),
          ));

          $response = curl_exec($curl);
          $err = curl_error($curl);

          curl_close($curl);

         if ($err) {
            return "cURL Error #:" . $err;
          } else {
            return $response;
          }
    }

    function get_transaction_detail($tx_address){
      $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_PORT => "3002",
          CURLOPT_URL => "http://13.233.7.230:3002/api/dataManager/get/transactionDetails",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => "{\n  \"_txhash\": \"$tx_address\"\n}",
          CURLOPT_HTTPHEADER => array(
            "Content-Type: application/json",
            "Postman-Token: bfef6938-5a2e-4fed-ab40-26a753ee0cb4",
            "cache-control: no-cache"
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
          return "cURL Error #:" . $err;
        } else {
          return $response;
        }
    }

    function random_strings($length_of_string)
    {
        $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        return substr(str_shuffle($str_result),0, $length_of_string);
    }


    function check_status($status){

        //$status = '<label class="badge badge-info">'.$status.'</label>';
        if ($status=="Processed") {
            $status = '<label class="badge badge-success">'.$status.'</label>';
            return $status;
        }
        elseif($status=="Raw material"){
            $status = '<label class="badge badge-warning">'.$status.'</label>';
            return $status;
        }
        elseif($status=="Under Process"){
            $status = '<label class="badge badge-primary">'.$status.'</label>';
            return $status;
        }
        elseif($status=="Shipped"){
            $status = '<label class="badge badge-secondary">'.$status.'</label>';
            return $status;
        }
         elseif($status=="Cancelled"){
            $status = '<label class="badge badge-danger">'.$status.'</label>';
            return $status;
        }
         elseif($status=="Disposed"){
            $status = '<label class="badge badge-dark">'.$status.'</label>';
            return $status;
        }
        elseif($status=="Rejected"){
            $status = '<label class="badge badge-light">'.$status.'</label>';
            return $status;
        }
        elseif($status=="Cancelled"){
            $status = '<label class="badge badge-light" style="background-color:#63864e">'.$status.'</label>';
            return $status;
        }
         elseif($status=="Invoiced"){
            $status = '<label class="badge badge-light" style="background-color:#ffcaef">'.$status.'</label>';
            return $status;
        }
        else{
          $status = '<label class="badge badge-info">'.$status.'</label>';
          return $status;
        }
        return $status;
    }

 function get_data_id_data_alll($table, $limits){
        include 'connection.php';
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
            $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
            $opt = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
        $pdo = new PDO($dsn, $user, $pass, $opt);        
                         
      try {
          $stmt = $pdo->prepare('SELECT * FROM `'.$table.'` ORDER BY date DESC LIMIT '.$limits);
      } catch(PDOException $ex) {
          echo "An Error occured!";
          print_r($ex->getMessage());
      }
      $stmt->execute();
      $user = $stmt->fetchAll();
      return $user;
    }
   
   
    function get_data_id_data_alll_mata($table, $tx_address){
        include 'connection.php';
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
            $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
            $opt = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
        $pdo = new PDO($dsn, $user, $pass, $opt);        
                         
      try {
          $stmt = $pdo->prepare('SELECT * FROM `'.$table.'` WHERE tx_address LIKE "'.$tx_address.'" ORDER BY date DESC');
      } catch(PDOException $ex) {
          echo "An Error occured!";
          print_r($ex->getMessage());
      }
      $stmt->execute();
      $user = $stmt->fetch();
      return $user;
    }

    function count_notification($table, $id){
        include 'connection.php';
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
            $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
            $opt = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
        $pdo = new PDO($dsn, $user, $pass, $opt);        
                         
      try {
          $stmt = $pdo->prepare('SELECT * FROM `notification` WHERE `user_id`='.$id.' AND `status`="Unread" ORDER BY date DESC');
      } catch(PDOException $ex) {
          echo "An Error occured!";
          print_r($ex->getMessage());
      }
      $stmt->execute();
      $user = $stmt->rowCount();
      return $user;
    }

      function count_tem_in_table($table){
        include 'connection.php';
         $pdo = new PDO($dsn, $user, $pass, $opt);
         try {
            $stmt = $pdo->prepare('SELECT * FROM `'.$table.'`');
            } catch(PDOException $ex) {
                echo "An Error occured!";
                print_r($ex->getMessage());
            }
            $stmt->execute();
            $user = $stmt->fetchAll();
            return str_pad(count($user), 3, '0', STR_PAD_LEFT);
    }


    function count_up($table, $id, $col){
      include 'connection.php';
         $pdo = new PDO($dsn, $user, $pass, $opt);
         try {
            $stmt = $pdo->prepare('UPDATE `'.$table.'` SET '.$col.' = '.$col.' + 1 WHERE id='.$id);
            } catch(PDOException $ex) {
                echo "An Error occured!";
                print_r($ex->getMessage());
            }
            $stmt->execute();
           
    }

    function whitelist_vendor($patient_address, $vendor_address){
      $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_PORT => "3005",
          CURLOPT_URL => "http://13.233.7.230:3005/api/dataManager/whitelist/address",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => "{\n  \"_patientAddress\": \"$patient_address\", \n  \"_addressToWhitelist\": \"$vendor_address\"\n}",
          CURLOPT_HTTPHEADER => array(
            "Content-Type: application/json",
            "Postman-Token: a96a78ed-1c18-47c4-bab4-112c54269d8e",
            "cache-control: no-cache"
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
          return "cURL Error #:" . $err;
        } else {
          return $response;
        }
    }

     function sum_col_table($table,  $col){
     include 'connection.php';
        $pdo = new PDO($dsn, $user, $pass, $opt);
        try {
           $stmt = $pdo->prepare('SELECT SUM(`no_of_tokens`) FROM `buy_token`');
           //echo 'SELECT SUM(`no_of_tokens`) AS sums FROM `buy_token`';
           } catch(PDOException $ex) {
               echo "An Error occured!";
               print_r($ex->getMessage());
           }
           $stmt->execute();
           $user = $stmt->fetch();
           return $user;            
   }

 ?>