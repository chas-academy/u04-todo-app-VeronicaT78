<?php 

$pdo = require('./dbconnect.php');

$sql = 'SELECT tasktitle, taskdesc, type
		FROM todolist';

$statement = $pdo->query($sql);

// get all publishers
$tasks = $statement->fetchAll(PDO::FETCH_ALL);

var_dump($tasks);

if ($tasks) {
	// show the tasks
	foreach ($tasks as $task) {
		
        echo '<tr>' .
             '<td>' . $task['tasktitle'] . '</td>' .
             '<td>' . $task['type'] . '</td>' . 
             '<td>' . $task['taskdesc'] . '</td>' .
             '</tr>';
    }
};


