<?php
    //session_start();
    include('header.php');
    include('footer.php');
    include('code.php')
    
?>
<div class="form">

<p style="color:red"><?php if(!empty($msg)){echo $msg; }?></p>
    
    <form action="code.php" method="POST" class="input_form">
        <div class="form_group">
            <?php if (isset($errors)) { ?>
                <p><?php echo $errors; ?></p>
            <?php } ?>
            <label for="text">Task:</label>
            <input type="text" name="tasktitle" class="form_task">
        </div>

        <div class="form_group">
            <label for="">Choose a type:</label>
                <select name="type" id="type" class="form_control">
                    <option value="">-Select type-</option>
                    <option value="home">Home</option>
                    <option value="work">Work</option>
                    <option value="leisure">Leisure</option>
                    <option value="family">Family</option>
                </select>
        </div>

        <div class="form_group">
            <label for="textarea">Description:</label>
                <textarea name="taskdesc" class="textarea" rows="4" cols="50">
                </textarea>
        </div>

        <div class="form_group">
            <button type="submit" name="submit" id="add_btn" class="add_btn">Add Task</button>
        </div>
        
    </form>

</div>
    


