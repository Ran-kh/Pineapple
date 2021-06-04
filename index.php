<?php

include('Model/dbFunctions.php');
include('views/0-index.php');

$db = new dbFunctions();

if(isset($_POST["button"])){
    if(!empty($_POST['email']) && isset($_POST['agree'])){
      if($db->insertSubscriber($_POST['email'], date('Y-m-d H:i:s')))
      echo "<script>successMsg();</script>";
    }
}
