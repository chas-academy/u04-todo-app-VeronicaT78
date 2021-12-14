<?php

if(isset($_POST['submit'])){

    require('dbconnect.php');
    
    $id = $_POST['id'];

        $sql = "DELETE FROM todolist WHERE id = '$id'";
        $stmt= $pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        header('location: index.php');
        
        $pdo = null;
        exit();
    
}



