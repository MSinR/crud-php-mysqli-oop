<?php require_once("../class/crud.php"); ?>

<?php $crud = new Crud(); ?>

<?php
if (isset($_POST["submit"])) {
	$name = $crud->mysql_prep($_POST["name"]);
	$age = $crud->mysql_prep($_POST["age"]);
	$email = $crud->mysql_prep($_POST["email"]);

	$query_result = $crud->create($name, $age, $email);
	if ($query_result) {
		$crud->redirect_to("index.php");
	} else {
		$message = "Failed to add data.";
	}
}
?>