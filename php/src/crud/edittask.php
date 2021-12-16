<?php

if (isset($_GET['id'])) {

    require('dbconnect.php');

    $id = $_GET['id'];

    $tasktitle = "";
    $taskdesc = "";
    $type = "";
    //$update = true;
   

    $sql = "SELECT tasktitle, type, taskdesc FROM todolist WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // if (count($result) == 1) {
    //     $n = $result;
    //     $tasktitle = $n['tasktitle'];
    //     $type = $n['type'];
    //     $taskdesc = $n['taskdesc'];
    // }

    var_dump($results);
    //unset($stmt);
}
?>

<form action="./update.php" method="POST" class="input_form">
        <div class="form_group">
            <?php if (isset($errors)) { ?>
                <p><?php echo $errors; ?></p>
            <?php } ?>
            <?php if(isset($_GET['id'])){
                foreach($results as $value){
            ?>
            <label for="text">Task:</label>
                <input type="text" name="tasktitle" value="<?php echo $value['tasktitle']; ?>" class="form_task">
        </div>
        <div class="form_group">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
        </div>
        <div class="form_group">
            <label for="">Choose a type:</label>
                <select name="type" value="<?php echo $value['type']; ?>" id="type" class="form_control">
                    <option value="">-Select type-</option>
                    <option value="home">Home</option>
                    <option value="work">Work</option>
                    <option value="leisure">Leisure</option>
                    <option value="family">Family</option>
                </select>
        </div>
        <div class="form_group">
            <label for="textarea">Description:</label>
                <textarea name="taskdesc" value="<?php echo $value['taskdesc']; ?>" class="textarea" rows="4" cols="50">
                </textarea>
        </div>
        <div class="form_group">
            <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>"
            <button class="btn" type="submit" name="update" >Update</button>
        </div>
</form>

