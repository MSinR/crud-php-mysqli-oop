<?php
require_once("dbconfig.php");

class Crud extends DbCOnfig {
	public function __construct() {
		parent::__construct();
	}

	public function mysql_prep($string) {
		return $this->connection->real_escape_string($string);
	}

	public function redirect_to($new_location) {
		header("Location:" . $new_location);
		exit;
	}

	public function read() {
		$query = "SELECT * FROM member";
		$result = $this->connection->query($query);
		return $result;
	}

	public function read_by_id($id) {
		$safe_id = $this->mysql_prep($id);
		$query = "SELECT * FROM member WHERE id={$safe_id}";
		$result = $this->connection->query($query);
		return $result;
	}

	public function update($name, $age, $email, $id) {
		$safe_id = $this->mysql_prep($id);
		$query = "UPDATE member set ";
		$query .= "name = '{$name}', ";
		$query .= "age = {$age}, ";
		$query .= "email = '{$email}' ";
		$query .= "WHERE id = {$safe_id} LIMIT 1";
		$result = $this->connection->query($query);
		if (!$result) {
			die("failed" . mysqli_error($this->connection));
			return null;
		} else {
			return $result;
		}
	}

	public function delete($id) {
		$safe_id = $this->mysql_prep($id);
		$query = "DELETE FROM member WHERE id = {$safe_id}";
		$result = $this->connection->query($query);
		if (!$result) {
			die("failed" . mysqli_error($this->connection));
			return null;
		} else {
			return $result;
		}
	}

	public function create($name, $age, $email) {
		$query = "INSERT INTO member ";
		$query .= "(name, age, email) ";
		$query .= "VALUES ";
		$query .= "('{$name}', {$age}, '{$email}')";
		$result = $this->connection->query($query);
		if (!$result) {
			die("failed" . mysqli_error($this->connection));
			return null;
		} else {
			return $result;
		}
	}


}