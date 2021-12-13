<?php

require('dbconnect.php');

$tasktitle = "";
$taskdesc = "";
$type = "";
$done = false;
$id = 0;
$update = false;

if (isset($_POST['submit'])) {
    
    $tasktitle = $_POST['tasktitle'];
    $taskdesc = $_POST['taskdesc'];
    $type = $_POST['type'];
    $done = $_POST['done'];


        $sql = "INSERT INTO todolist (tasktitle, taskdesc, type, done) VALUES ( :tasktitle, :taskdesc, :type, :done)";
        $stmt= $pdo->prepare($sql);
        $stmt->execute(['tasktitle' =>$tasktitle, 'taskdesc'=>$taskdesc, 'type'=>$type, 'done'=>$done]);

        if($stmt){
            header('location: index.php?mess=success'); 
        }else {
            header('location: index.php');
        }
        $pdo = null;
        exit();
    
}

if (isset($_GET['edit'])) {
    
    $id = $_GET['edit'];
    $update = true;

        $sql = "SELECT * FROM todolist WHERE id=$id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $record = $stmt->fetch();

        if (count($record) == 1 ) {
            $n = fetch($record);
            $tasktitle = $n['tasktitle'];
            $type = $n['type'];
            $taskdesc = $n['taskdesc'];
        }

        if($stmt){
            header('location: index.php?mess=success'); 
        }else {
            header('location: index.php');
        }
        $pdo = null;
        exit();
}

if (isset($_GET['done'])) {
    
    $id = $_GET['done'];
    $done = true;

        $sql = "SELECT * FROM todolist WHERE id=$id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $record = $stmt->fetch();

        if (count($record) == 1 ) {
            $n = fetch($record);
            $tasktitle = $n['tasktitle'];
            $type = $n['type'];
            $taskdesc = $n['taskdesc'];
            $done = $n['done'];
        }

        if($stmt){
            header('location: index.php?mess=success'); 
        }else {
            header('location: index.php');
        }
        $pdo = null;
        exit();
}





    
    


