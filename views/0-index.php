<?php
include ('validation.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> Pineapple </title>
    <!-- icon library -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css">
    <link rel="stylesheet" href="./views/scss/styles.min.css">
    <script type="text/javascript" src="./views/task2.js"></script>
  </head>

  <body>
    <div id="container">

      <div id=left-div>

        <div id="navbar">

          <div id="logodiv">
            <img src="./views/images/logo_pineapple.png" alt="pineapple">
            <label>pineapple</label>
          </div>

          <nav>
            <ul class="nav-list">
              <li><a href="#"></a></li>
              <li><a href="#"> About </a></li>
              <li><a href="#"> How it works </a></li>
              <li><a href="#"> Contact </a></li>
            </ul>
          </nav>

        </div>

        <div id="form">
          <h1 id="formHeader" name="formHeader"> Subscribe to newsletter</h1>
          <p id="formPara" name="formPara"> Subscribe to our newsletter and get 10% discount on pineapple glasses.</p>
          <br>

          <form id="myform" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div id="emailsub" onclick="validate()">
              <input type="email" id="email" name="email" placeholder="Type your email address here... " onkeyup="validate()"
              value="<?= isset($_POST['email'])? $_POST['email'] : '' ?>">
              <button id="button" name="button" type="submit" class="fas fa-arrow-right"></button>
            </div>
            <div id="emailValMsg" name='emailValMsg'><?= isset($errors['email'])? $errors['email'] : '' ?></div>

            <div id="checkbox">
              <input type="checkbox" id='agree' name="agree" onchange="checkAgree()" <?= isset($_POST['agree']) && !empty($_POST['agree'])? 'checked' : '' ?>>
              <label for="checkbox"> I agree to <a href="#">terms of service</a></label>
              <div id='checkboxValMsg' name='checkboxValMsg'><?= isset($errors['agree'])? $errors['agree'] : '' ?></div>
            </div>

          </form>
          <hr>

          <div id="social">
            <ul>
              <li><a href="#" class="fab fa-facebook-f"></a></li>
              <li><a href="#" class="fab fa-instagram"></a></li>
              <li><a href="#" class="fab fa-twitter"></a></li>
              <li><a href="#" class="fab fa-youtube"></a></li>
            </ul>
          </div>

        </div>  <!-- id=form -->

      </div>  <!-- id="left-div" -->

      <div id="background-image"><img src="./views/images/image_summer.png" alt="none"></img></div>

    </div>
  </body>
</html>
