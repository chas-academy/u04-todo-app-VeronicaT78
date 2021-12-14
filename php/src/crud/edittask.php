<?php

if (isset($_REQUEST['edit'])) {

   require('./dbconnect.php');

    $id = $_REQUEST['id'];
    $tasktitle = $_REQUEST['tasktitle'];
    $taskdesc = $_REQUEST['taskdesc'];
    $type = $_REQUEST['type'];

    $sql = "SELECT FROM todolist WHERE id :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // if (count($result) == 1 ) {
    //     $n = ($result);
    //     $tasktitle = $n['tasktitle'];
    //     $type = $n['type'];
    //     $taskdesc = $n['taskdesc'];
    // }

}

if (isset($_POST['update'])) {
	
	require('./dbconnect.php');
    
    $id = $_POST['id'];
    $tasktitle = $_POST['tasktitle'];
    $taskdesc = $_POST['taskdesc'];
    $type = $_POST['type'];
  
        $sql = "UPDATE todolist SET tasktitle=$tasktitle, type=$type, taskdesc=$taskdesc WHERE id = :id";
        $stmt= $pdo->prepare($sql);
        $stmt->execute(['tasktitle'=>$tasktitle, 'taskdesc'=>$taskdesc, 'type'=>$type]);
        header('location: index.php');
        
        $pdo = null;
        exit();
    
}
?>

<form action="" method="POST" class="input_form">
        <div class="form_group">
                <label for="text">Task:</label>
                    <input type="text" value="<?php echo $result['$tasktitle']; ?>" name="tasktitle" class="form_task">
        </div>
        <div class="form_group">
            <label for="">Choose a type:</label>
                <select name="type" value="<?php echo $type; ?>" id="type" class="form_control">
                    <option value="">-Select type-</option>
                    <option value="home">Home</option>
                    <option value="work">Work</option>
                    <option value="leisure">Leisure</option>
                    <option value="family">Family</option>
                </select>
        </div>
        <div class="form_group">
            <label for="textarea">Description:</label>
                <textarea name="taskdesc" value="<?php echo $taskdesc; ?>" class="textarea" rows="4" cols="50">
                </textarea>
        </div>
        <div class="form_group">
            <!-- <button class="btn" type="submit" name="update" style="background: #556B2F;" >Update</button> -->
            <button class="btn" type="submit" name="submit" >Update</button>
        </div>
</form>


