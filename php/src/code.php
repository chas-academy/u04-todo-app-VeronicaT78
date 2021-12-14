<?php

$tasktitle = "";
$taskdesc = "";
$type = "";
$done = false;
$id = 0;
$update = false;

if (isset($_POST['submit'])) {

    require('dbconnect.php');
    
    $tasktitle = $_POST['tasktitle'];
    $taskdesc = $_POST['taskdesc'];
    $type = $_POST['type'];
  
        $sql = "INSERT INTO todolist (tasktitle, taskdesc, type) VALUES ( :tasktitle, :taskdesc, :type)";
        $stmt= $pdo->prepare($sql);
        $stmt->execute(['tasktitle' =>$tasktitle, 'taskdesc'=>$taskdesc, 'type'=>$type]);
        header('location: index.php');
        
        $pdo = null;
        exit();
    
}







    
    


