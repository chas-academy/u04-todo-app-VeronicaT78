<?php

if(isset($_REQUEST['delete'])){

    require('dbconnect.php');
    
    $id = $_REQUEST['id'];

    $sql = "DELETE FROM todolist WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
        
    unset($stmt);
    
}



