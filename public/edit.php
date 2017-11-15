<?php require_once("../class/crud.php"); ?>

<?php $crud = new Crud(); ?>

<?php $result_set = $crud->read_by_id($_GET["id"]); ?>
<?php $result = mysqli_fetch_assoc($result_set); ?>

<?php
if (isset($_POST["submit"])) {
	$id = $result["id"];
	$name = $crud->mysql_prep($_POST["name"]);
	$age = $crud->mysql_prep($_POST["age"]);
	$email = $crud->mysql_prep($_POST["email"]);

	$query_result = $crud->update($name, $age, $email, $id);
	if ($query_result) {
		$crud->redirect_to("index.php");
	} else {
		$message = "Failed to update data.";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>OOP CRUD</title>
</head>
<body>
	<?php if (!isset($message)) {
		$message = "";
	} else {
		echo $message;
	} ?>
	<h1>OOP CRUD - Update</h1>
	<div class="main">
		<form action="edit.php?id=<?php echo urlencode($result["id"]);?>" method="post">
			<p>Name:
				<input type="text" name="name" value="<?php echo htmlentities($result["name"]);?>">
			</p>
			<p>Age:
				<input type="text" name="age" value="<?php echo htmlentities($result["age"]);?>">
			</p>
			<p>Email:
				<input type="text" name="email" value="<?php echo htmlentities($result["email"]);?>">
			</p>
			<input type="submit" name="submit" value="Save changes">
		</form>
		
	</div>

</body>
</html>