<?php
    $pdo = require_once 'dbconnect.php';

    $tasks = [
        'tasktitle' => $tasktitle,
        'type' => $type,
        'taskdesc' => $taskdesc,
        'done' => $done,
    ];
    
    $sql = 'UPDATE todolist
            SET tasktitle=:tasktitle, type=:type, taskdesc=:taskdesc, done=:done 
            WHERE id=$id'; 
            
    $stmt = $pdo->prepare($sql);
    
    $stmt->bindParam(':id', $id['id'], PDO::PARAM_INT);
    $stmt->bindParam(':tasktitle', $tasks['tasktitle']);
    $stmt->bindParam(':type', $tasks['type']);
    $stmt->bindParam(':taskdesc', $tasks['taskdesc']);
    $stmt->bindParam(':done', $tasks['done']);
    
    if ($stmt->execute()) {
        echo 'The task has been updated successfully!';
    }
    


?>