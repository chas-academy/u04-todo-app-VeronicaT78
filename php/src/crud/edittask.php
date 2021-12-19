<?php

if(isset($_REQUEST['edit'])){

    require('dbconnect.php');
    
    $id = $_REQUEST['id'];

    $sql = "SELECT * FROM todolist WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $edittasks = $stmt->execute();
    
    $var_dump($edittasks);

    unset($stmt);
    
}
?>
