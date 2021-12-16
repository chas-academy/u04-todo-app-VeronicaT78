<?php

$tasktitle = "";
$taskdesc = "";
$type = "";
//$done = false;
$id = 0;
//$update = false;

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










    
    


