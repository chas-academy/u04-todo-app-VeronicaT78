<!DOCTYPE html>
<html>
<head>
	<title>ToDo</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="heading">
		<h1>ToDo</h1>
	</div>
    <div class="add-task">
        <form action="post" action="index.php" class="input_form">
            <input type="text" name="task" class="task_input">
            <button type="submit" name="submit" id="add_btn" class="add_btn">Add Task</button>
        </form>
    </div>

    <div class="grid_container">
        <div id="home">
            <h2>HOME<h2>
            <form method="get" action="index.php" class="input_form">
		        <input type="text" name="task" class="task_output">
		        <button type="submit" name="submit" id="add_btn" class="add_btn">Add Task</button>
                <input type="checkbox">
            </form>
        </div>
        <div id="work">
            <h2>WORK<h2>
            <form method="get" action="index.php" class="input_form">
		        <input type="text" name="task" class="task_output">
		        <button type="submit" name="delete" id="delete" class="delete_btn">Delete</button>
                <input type="checkbox">
	        </form>
        </div>
        <div id="leisure">
            <h2>LEISURE<h2>
            <form method="get" action="index.php" class="input_form">
		        <input type="text" name="task" class="task_input">
		        <button type="submit" name="submit" id="add_btn" class="add_btn">Add Task</button>
                <input type="checkbox">
            </form>
        </div>
        <div id="family">
            <h2>FAMILY<h2>
            <form method="get" action="index.php" class="input_form">
		        <input type="text" name="task" class="task_input">
		        <button type="submit" name="submit" id="add_btn" class="add_btn">Add Task</button>
                <input type="checkbox">
            </form>
        </div>
	
    </div>
</body>
</html>

<?php

echo "Hello from the docker container";

