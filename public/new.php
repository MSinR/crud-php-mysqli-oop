<?php require_once("../class/crud.php"); ?>

<!DOCTYPE html>
<html>
<head>
	<title>OOP CRUD</title>
</head>
<body>

	<h1>OOP CRUD - CREATE</h1>
	<div class="main">
		<form action="create.php" method="post">
			<p>Name:
				<input type="text" name="name" >
			</p>
			<p>Age:
				<input type="number" name="age">
			</p>
			<p>Email:
				<input type="email" name="email">
			</p>
			<input type="submit" name="submit" value="Save">
		</form>
		
	</div>

</body>
</html>