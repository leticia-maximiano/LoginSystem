<?php
$NUM = [1,2,3];
$users = [
	["id" => 1, "name" => "Gustavo", "age" => 35],
	["id" => 2, "name" => "Lara", "age" => 6],
	["id" => 3, "name" => "Baby", "age" => 82],
	["id" => 3, "name" => "Baby", "age" => 82],
	["id" => 3, "name" => "Baby", "age" => 82],
	["id" => 3, "name" => "Baby", "age" => 82],
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<table border="1">
		<tr>
			<th>Id</th>
			<th>Nome</th>
			<th>login</th>
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
