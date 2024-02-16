<?php
require_once "./global.php";

$errors=[]; 
if(!$_POST["nmuser"]){
  $errors[]="Nome é obrigatório";
}

if(!$_POST["iduser"]){
  $errors[]="Identificador é obrigatório";

}

if(!$_POST["psuser"]){
  $errors[]="Senha é obrigatória";

}

if(!$_POST["psuserconfirm"]){
  $errors[]="Confirmação de senha é obrigatória";
}

if($_POST["psuser"] != $_POST["psuserconfirm"]){
  $errors[]="Senha e confirmação de senha tem que ser iguais";
}

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
  
    <form id="form" action="/registerusers.php" method="post">
      <div id="container">
        <div id="login-container">
          <input placeholder="Nome do usuário" type="text" name="nmuser" value="<?=$_POST["nmuser"]?>">
          <input placeholder="Identificador do usuário" type="text" name="iduser" value="<?=$_POST["iduser"]?>">
          <input placeholder="Digite a senha" type="password" name="psuser">
          <input placeholder="Repita a senha" type="password" name="psuserconfirm">
          <button type="button" onclick="submit()">Salvar</button>

          <ul>
            <?php
            foreach($errors as $error){
              ?>
              <li>
                <?php echo $error?>
              </li>
              <?php
            }
            ?>
          </ul>
        </div>
      </div>
    </form>
<script>
  function submit(e){
    e.preventDefault();

    const form=document.getElementById("form")

   console.log(form.values)

   // if(form.)
  }
</script>
</body>

</html>