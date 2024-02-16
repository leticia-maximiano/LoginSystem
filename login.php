<?php 
require_once "./global.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    <?php
    include "./styles.css";
    ?>
  </style>
  <title>Document</title>
</head>

<body>
  <?php
  if (!isset($_POST["login"])) { ?>
    <form action="/login.php" method="post">
      <div id="container">
        <div id="login-container">
          <input placeholder="Digite o email" type="login" name="login">
          <input placeholder="Digite a senha" type="password" name="password">
          <button type="submit">Entrar</button>
        </div>
      </div>
    </form>

  <?php
  } else {
    $user=$conn->execute("select * from adusers where idlogin = :idlogin",["idlogin"=> $_POST["login"]])[0];

    var_dump($user);
    if(empty($user) || !password_verify($_POST["password"], $user['pslogin'])){
      ?>

      <div id="container">
        <div id="login-container">
          <h1>Deu ruim</h1>
        </div>
      </div>
      <?php
    } else {
      $_SESSION["user"]=$user;
      $location->goToPage("index");
    }

  ?>

  <?php
  }
  ?>
</body>

</html>