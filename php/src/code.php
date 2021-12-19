<?php

$tasktitle = "";
$taskdesc = "";
$type = "";
$id = 0;

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

if (isset($_POST['update'])){
    
    $id = isset($_GET['id']) ? $_GET['id'] : null;{
    
    require('dbconnect.php');
    
   //$id = interval($_GET['id']);
    //echo ($id);

    $tasktitle = $_POST['tasktitle'];
    $taskdesc = $_POST['taskdesc'];
    $type = $_POST['type'];

    $sql = 'UPDATE todolist
        SET tasktitle=:tasktitle, type=:type, taskdesc=:taskdesc
        WHERE id = :id'; 
        
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':tasktitle', $tasktitle);
    $stmt->bindParam(':type', $type);
    $stmt->bindParam(':taskdesc', $taskdesc);
    $result= $stmt->execute();

    var_dump($result);

    //header('location: index.php');
    
    $pdo = null;
    exit();

    }
}
?>
<?php

if (isset($_GET['id'])) {

    require('dbconnect.php');

    $id = $_GET['id'];

    class Task{
        
        private $tasktitle;
        private $type;
        private $taskdesc;

    }
    
    $sql = "SELECT id, tasktitle, type, taskdesc FROM todolist WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
    $stmt->setFetchMode(PDO::FETCH_CLASS);
    $result = $stmt->fetch();
    while($result)
    {
        $tasktitle = $result['tasktitle'];
        $type = $result['type'];
        $taskdesc = $result['taskdesc'];
    };

    //unset($stmt);
}
?>





?>





    
    


