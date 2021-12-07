<?php 

    include('code.php');

    //session start
    session_start(); 
    	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ToDo</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="heading">
		<h1>ToDo</h1>
	</div>


    
    <div class="grid_container">
        <form action="code.php" method="POST" class="input_form">
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
                        <option value=work">Work</option>
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




