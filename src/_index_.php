<?php 

    include('dbconnect.php');

?>
include('dbconnect.php');

    
    <div class="grid_container">
        <form action="" method="POST" class="input_form">
            <div class="form_group">
                <?php if (isset($errors)) { ?>
                    <p><?php echo $errors; ?></p>
                <?php } ?>
                <input type="text" name="task" class="form_control">
            </div>
            <div class="form_group">
                <label for="">Choose a type:</label>
                    <select name="type" id="type" class="form_control">
                        <option value="home">-Select type-</option>
                        <option value="home">Home</option>
                        <option value="work">Work</option>
                        <option value="leisure">Leisure</option>
                        <option value="family">Family</option>
                    </select>
                </div>
            <div class="form_group">
                <button type="submit" name="submit" id="add_btn" class="add_btn">Add Task</button>
            </div>
        </form>
    </div>
    

    <!-- <div class="grid_container">
        <div>
            <h2>HOME</h2>
            <div id="home">
                <form method="get" action="index.php" class="input_form">
		            <input type="text" name="task" class="task_output">
		            <button type="submit" name="delete" id="delete" class="delete_btn">Delete</button>
                    <input type="checkbox">
                </form>
            </div>
        </div>
        <div>
        <h2>WORK</h2>
        <div id="work">
            <form method="get" action="index.php" class="input_form">
		        <input type="text" name="task" class="task_output">
		        <button type="submit" name="delete" id="delete" class="delete_btn">Delete</button>
                <input type="checkbox">
	        </form>
        </div>
        </div>
        <div>
    <h2>LEISURE</h2>
        <div id="leisure">
            <form method="get" action="index.php" class="input_form">
		        <input type="text" name="task" class="task_input">
		        <button type="submit" name="delete" id="delete" class="delete">Delete</button>
                <input type="checkbox">
            </form>
        </div>
        </div>
        <div>
    <h2>FAMILY</h2>
        <div id="family">
            <form method="get" action="index.php" class="input_form">
		        <input type="text" name="task" class="task_input">
		        <button type="submit" name="delete" id="delete" class="delete">Delete</button>
                <input type="checkbox">
            </form>
        </div>
        </div>
	
    </div> -->
</body>
</html>




