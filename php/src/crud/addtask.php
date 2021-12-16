<form action="./code.php" method="POST" class="input_form">
        <div class="form_group">
            <?php if (isset($errors)) { ?>
                <p><?php echo $errors; ?></p>
            <?php } ?>
            <label for="text">Task:</label>
                <input type="text" name="tasktitle" value="" class="form_task">
        </div>
        <div class="form_group">
            <input type="hidden" name="id" value="tasktitle">
        </div>
        <div class="form_group">
            <label for="">Choose a type:</label>
                <select name="type" value="type" id="type" class="form_control">
                    <option value="">-Select type-</option>
                    <option value="home">Home</option>
                    <option value="work">Work</option>
                    <option value="leisure">Leisure</option>
                    <option value="family">Family</option>
                </select>
        </div>
        <div class="form_group">
            <label for="textarea">Description:</label>
                <textarea name="taskdesc" value="taskdesc" class="textarea" rows="4" cols="50">
                </textarea>
        </div>
        <div class="form_group">
            <button class="btn" type="submit" name="submit" >Add task</button>
        </div>
</form>
