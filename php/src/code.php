<?php 
	
	$errors = "";

	// initialize variables
	$task = "";
	$type = "";

	if (isset($_POST['save'])) {
		$task = $_POST['task'];
		$type = $_POST['type'];

		mysqli_query($conn, "INSERT INTO todolist (task, type) VALUES ('$task', '$type')"); 
		$_SESSION['message'] = "Task saved"; 
		header('location: index.php');
	}