<?php require_once("../class/crud.php"); ?>

<?php $crud = new Crud(); ?>

<?php $result_set = $crud->read_by_id($_GET["id"]); ?>
<?php $result = mysqli_fetch_assoc($result_set); ?>

<?php
if (isset($_GET["id"])) {
	$id = $result["id"];

	$query_result = $crud->delete($id);
	if ($query_result) {
		$crud->redirect_to("index.php");
	} else {
		$crud->redirect_to("index.php");
	}
}
?>
