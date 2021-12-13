<?php 

    $pdo = require('./dbconnect.php');
    $query = 'SELECT * FROM todolist WHERE id=$id';
    $statement = $pdo->query($query);
    $statement->execute();
    $task = $statement->fetch();

	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM todolist WHERE id=$id");

		if (count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
			$name = $n['name'];
			$address = $n['address'];
		}
	}
?>