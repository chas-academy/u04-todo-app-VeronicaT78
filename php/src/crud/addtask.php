<?php

if (isset($_GET['id'])) {

    require('dbconnect.php');

    $id = $_GET['id'];

    $tasktitle = "";
    $taskdesc = "";
    $type = "";
    
    $sql = "SELECT tasktitle, type, taskdesc FROM todolist WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id, '']);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    var_dump($result);
    //unset($stmt);
}
?>


<form action="./code.php" method="POST" class="input_form">
        <div class="form_group">
            <?php if (isset($errors)) { ?>
                <p><?php echo $errors; ?></p>
            <?php } ?>
            
            <label for="text">Task:</label>
                <input type="text" name="tasktitle" value="<?php echo $result[$id]['tasktitle']; ?>" class="form_task">
        </div>
        <div class="form_group">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
        </div>
        <div class="form_group">
            <label for="">Choose a type:</label>
                <select name="type" value="<?php echo $row['type']; ?>" id="type" class="form_control">
                    <option value="">-Select type-</option>
                    <option value="home">Home</option>
                    <option value="work">Work</option>
                    <option value="leisure">Leisure</option>
                    <option value="family">Family</option>
                </select>
        </div>
        <div class="form_group">
            <label for="textarea">Description:</label>
                <textarea name="taskdesc" value="<?php echo $row['taskdesc']; ?>" class="textarea" rows="4" cols="50">
                </textarea>
        </div>
        <div class="form_group">
            <?php if(isset($_GET['id'])){ echo '<button class="btn" type="submit" name="update" style="background: #556B2F;" >Update</button>';}
                else{ echo '<button class="btn" type="submit" name="submit" >Add task</button>';} 
            ?>
        </div>
</form>
