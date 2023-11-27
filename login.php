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
  ?>
    <div id="container">
      <div id="login-container">
        <h1>Olá, <?= $_POST["login"]?></h1>
      </div>
    </div>

  <?php
  }
  ?>
</body>

</html>