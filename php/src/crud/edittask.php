<?php

if (isset($_POST['update'])) {
	
	$pdo = require('./dbconnect.php');
    
    $id = $_POST['id'];

    $tasktitle = $_POST['tasktitle'];
    $type = $_POST['type'];
    $taskdesc = $_POST['taskdesc'];
    
  
        $sql = "UPDATE todolist SET tasktitle=:tasktitle, type=:type, taskdesc=:taskdesc WHERE id =:id";
        $stmt= $pdo->prepare($sql);
        $stmt->execute(array(':tasktitle' => $tasktitle, ':type' => $type, ':taskdesc' => $taskdesc ));
        
        header('location: index.php');
        
}
?>



