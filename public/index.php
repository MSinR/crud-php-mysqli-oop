<?php require_once("../class/crud.php"); ?>

<?php $crud = new Crud(); ?>

<?php $result_set = $crud->read(); ?>

<!DOCTYPE html>
<html>
<head>
	<title>OOP CRUD</title>
</head>
<body>
	<h1>OOP CRUD</h1>
	<div class="main">
		<?php if (mysqli_num_rows($result_set) > 0) { ?>
		<table width="70%" border=1>
			<caption>List of Members</caption>
			<tr>
				<th>Name</th>
				<th>age</th>
				<th>email</th>
				<th>Action</th>
			</tr>
			<?php while ($result = mysqli_fetch_assoc($result_set)) { ?>
			<tr align="center">
					<td><?php echo htmlentities($result["name"]); ?></td>
					<td><?php echo htmlentities($result["age"]); ?></td>
					<td><?php echo htmlentities($result["email"]); ?></td>
					<td>
						<a href="edit.php?id=<?php echo urlencode($result["id"]); ?>">Edit</a>
						&nbsp;|&nbsp;
						<a href="delete.php?id=<?php echo urlencode($result["id"]); ?>" onclick="return confirm('Are you sure?')">Delete</a>
					</td>
			</tr>
			<?php } ?>
		</table>
		<?php } else { ?>
		<?php echo "There's nothing in here..."; ?>
		<?php } ?>

		<br>
		<br>
		<a href="new.php">Add new member</a>
	</div>

</body>
</html>