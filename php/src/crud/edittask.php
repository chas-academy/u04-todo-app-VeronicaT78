<?php

if (isset($_REQUEST['edit'])) {
    
   require('dbconnect.php');

    $id = $_REQUEST['id'];
    $tasktitle = $_REQUEST['tasktitle'];
    $taskdesc = $_REQUEST['taskdesc'];
    $type = $_REQUEST['type'];

    $sql = "SELECT tasktitle, taskdesc, type FROM todolist WHERE id :id";
    $stmt = $pdo->prepare($sql);
    $result = $stmt->execute();
    //$result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (count($result) == 1 ) {
        $n = ($result);
        $tasktitle = $n['tasktitle'];
        $type = $n['type'];
        $taskdesc = $n['taskdesc'];
    }
    

    unset($record);
}
?>



