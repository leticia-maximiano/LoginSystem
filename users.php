<?php
session_start();
require_once "./Conector.php";

if(!$_SESSION["user"]){

  echo "pintão não está certo";
  return;
}

if(!empty($_POST) && $_POST["name"] && $_POST["password"] && $_POST["login"]){

  $conector->execute(
    "INSERT INTO ADUSERS(NMUSER,IDLOGIN,PSLOGIN)
    VALUES(:nmuser,:idlogin,:pslogin)",
    ["nmuser"=>$_POST["name"],"idlogin"=>$_POST["login"],"pslogin"=>password_hash($_POST["password"],PASSWORD_BCRYPT)]
  );
}



$users = $conector->execute("select * from adusers");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="" method="post">
    <input type="text" name="name" placeholder="Digite o nome">
    <input type="text" name="login" placeholder="Digite o login">
    <input type="text" name="password" placeholder="Digite a senha"> 
    <button type="submit">Salvar usuário</button>
  </form>

  <table border="1">
		<tr>
			<th>Id</th>
			<th>Nome</th>
			<th>Login</th>
		</tr>

		<?php
			foreach ($users as $user) { ?>
				<tr>
					<td><?php echo $user["cduser"]; ?> </td>
					<td><?php echo $user["nmuser"]; ?></td>
					<td><?php echo $user["idlogin"]; ?></td>
				</tr>
			<?php }
		?>
	</table>
</body>
</html>
