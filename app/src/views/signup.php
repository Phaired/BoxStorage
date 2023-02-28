<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/signup.css">
    <link rel="shortcut icon" href="./img/logo_simple.png" />
    <title>Sign up</title>
</head>
<body>
<div id='background'>
      <div id='container'>
        <form action='../controllers/signupController.php' method="post">
            <?php
            if (isset($_GET['erreur'])) {
                echo "<p class='erreur'>".htmlspecialchars($_GET['erreur'])."</p>";
            } ?>
          <div class='formItems'>
            <label for='username'>Username</label>
            <input id='username' name='username' type='text' />
          </div>
          <div class='formItems'>
            <label for='firstname'>FirstName</label>
            <input id='firstname' name='firstname' type='text' />
          </div>
          <div class='formItems'>
            <label for='lastname'>LastName</label>
            <input id='lastname' name='lastname' type='text' />
          </div>
          <div class='formItems'>
            <label for='email'>Email</label>
            <input id='email' name='email' type='email' />
          </div>
          <div class='formItems'>
            <label for='password'>Password</label>
            <input id='password' name='password' type='password' />
          </div>
          <div class='formItems'>
            <label for='confirmpassword'>Confirm Password</label>
            <input id='confirmpassword' name='confirmpassword' type='password'/>
          </div>
          <div class='formItems' id='zipcity'>
            <div id='zipGroup'>
              <label for='zipcode'>Zip Code</label>
              <input id='zipcode' name='zipcode' type='text' />
            </div>
            <div id='cityGroup'>
              <label for='city'>City</label>
              <input id='city' name='city' type='text' />
            </div>
          </div>
          <div class='formItems'>
            <label for='address'>Address</label>
            <input name='address' id='address' type='text' />
          </div>
          <div class='formItems'>
              <input id='submit' type='submit' value='Save'>
              <input id='reset' type='reset' value='Reset'>
          </div>
        </form>
        <h1>Your Informations</h1>
      </div>
</div>
</body>
</html>';