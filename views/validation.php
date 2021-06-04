<?php

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (empty($_POST['email'])) {
    $errors['email'] =  '* Email address is required';
  }
  else{
    $colombiaRegex = "/.co$/";
    $email = $_POST['email'];
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      $errors['email'] = '* Please provide a valid e-mail address';
    }

    else {
      if(preg_match($colombiaRegex, $_POST['email'])){
        $errors['email'] = '* We are not accepting subscriptions from Colombia emails';
      }
      else
       $errors['email'] = '';
    }
  }


   if(empty($_POST['agree'])){
     $errors['agree'] = "* please accept the terms and conditions";
   }
   else{
     $errors['agree'] = "";
   }

}
