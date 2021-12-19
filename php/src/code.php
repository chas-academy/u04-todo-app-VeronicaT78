<?php

require('dbconnect.php');

if (isset($_POST['submit'])) {

    $tasktitle = "";
    $taskdesc = "";
    $id = 0;
    $update = false;

    $tasktitle = $_POST['tasktitle'];
    $taskdesc = $_POST['taskdesc'];
  
        $sql = "INSERT INTO todolist (tasktitle, taskdesc) VALUES ( :tasktitle, :taskdesc)";
        $stmt= $pdo->prepare($sql);
        $stmt->execute(['tasktitle' =>$tasktitle, 'taskdesc'=>$taskdesc]);
        header('location: index.php');

        $pdo = null;
        exit();
    
};

if (isset($_POST['update'])) {

	$id = $_POST['id'];
    $tasktitle = $_POST['tasktitle'];
	$taskdesc= $_POST['taskdesc'];
    
    $sql = "UPDATE todolist SET tasktitle=?, taskdesc=? WHERE id=?"; 
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$tasktitle, $taskdesc, $id]);
    header('location: index.php');

    $pdo = null;
    exit();
};

if (isset($_GET['del'])) {
	
    $id = $_GET['del'];

    $sql = "DELETE FROM todolist WHERE id=$id"; 
    $stmt= $pdo->prepare($sql);
    $stmt->execute();
    header('location: index.php');

    $pdo = null;
    exit();
};

?>






    
    


