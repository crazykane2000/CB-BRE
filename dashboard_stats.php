<div class="row">
  <div class="col-md-3">
    <div class="c-state-card c-state-card--info">
      <h4 class="c-state-card__title">Registered Candidated</h4>
      <a href="view_Candidated.php"><span class="c-state-card__number">
        <?php $balance =  get_patients(); 
              $balance = json_decode($balance,true);
              $balance = count($balance);
              echo $balance;
        ?></span></a>
    </div>
  </div>

  <div class="col-md-3">
    <div class="c-state-card c-state-card--success">
      <a href="white_listed_Candidated.php"><h4 class="c-state-card__title">Whitelisted Candidated</h4>
      <span class="c-state-card__number">2</span>     </a>           
    </div>
  </div>

  <div class="col-md-3">
    <div class="c-state-card c-state-card--fancy">
      <a href="wallet.php"><h4 class="c-state-card__title">Wallet</h4>
      <span class="c-state-card__number"><?php $balance =  get_wallet_balance($pdo_auth['tx_address']); 
                        $balance = json_decode($balance,true);
                        $balance = $balance['walletBalance'];
                        echo $balance;
                  ?></span>     </a>           
    </div>
  </div>
  <div class="col-md-3">
    <div class="c-state-card c-state-card--warning">
      <a href="transactions.php"><h4 class="c-state-card__title">Amount Spent</h4>
      <span class="c-state-card__number">00</span>   </a>             
    </div>
  </div>
  
</div>