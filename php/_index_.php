<?php 

    include('dbconnect.php');

?>


    
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
<?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>

<?php
    $task = "";
	$type = "";

    $sql = "INSERT INTO todolist (task, type) VALUES ('$task', '$type')";

	if (isset($_POST['save'])) {
		$task = $_POST['task'];
		$type = $_POST['type'];

		mysqli_query($conn, $sql); 
		$_SESSION['message'] = "Task saved"; 
		header('location: index.php');
	}
?>

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

// <table>
// 	<thead>
// 		<tr>
// 			<th>Name</th>
// 			<th>Address</th>
// 			<th colspan="3">Action</th>
// 		</tr>
// 	</thead>
	
// <?php while ($row = mysqli_fetch_array($results)) { ?>
// 		<tr>
// 			<td><?php echo $row['tasktitle']; ?></td>
// 			<td><?php echo $row['type']; ?></td>
//             <td><?php echo $row['taskdesc']; ?></td>
// 		</tr>
// 	<?php } ?>
// </table>

<table>
	<thead>
		<tr>
			<th>Task</th>
			<th>Type</th>
			<th>Description</th>
            <th colspan="2"></th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['address']; ?></td>
			<td>
				<a href="index.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="server.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>

	<tbody>
		<?php 
		// select all tasks if page is visited or refreshed
		$tasks = mysqli_query($db, "SELECT * FROM tasks");

		$i = 1; while ($row = mysqli_fetch_array($tasks)) { ?>
			<tr>
				<td> <?php echo $i; ?> </td>
				<td class="task"> <?php echo $row['task']; ?> </td>
				<td class="delete"> 
					<a href="index.php?del_task=<?php echo $row['id'] ?>">x</a> 
				</td>
			</tr>
		<?php $i++; } ?>	
	</tbody>
</table>


<?php
    $pdo = require_once 'dbconnect.php';

    $tasks = [
        'tasktitle' => $tasktitle,
        'type' => $type,
        'taskdesc' => $taskdesc,
        'done' => $done,
    ];
    
    $sql = 'UPDATE todolist
            SET tasktitle=:tasktitle, type=:type, taskdesc=:taskdesc, done=:done 
            WHERE id=$id'; 
            
    $stmt = $pdo->prepare($sql);
    
    $stmt->bindParam(':id', $id['id'], PDO::PARAM_INT);
    $stmt->bindParam(':tasktitle', $tasks['tasktitle']);
    $stmt->bindParam(':type', $tasks['type']);
    $stmt->bindParam(':taskdesc', $tasks['taskdesc']);
    $stmt->bindParam(':done', $tasks['done']);
    
    if ($stmt->execute()) {
        echo 'The task has been updated successfully!';
    }
    


?>

<form action="edittask.php" method="POST" class="input_form">
        <div class="form_group">
                <label for="text">Task:</label>
                    <input type="text" name="tasktitle" value="<?php echo $tasktitle ?>" class="form_task">
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
            <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>"
            <input type="submit" name="update" value="Update" class="btn" style="background: #556B2F;">Update</button>
        </div>
</form>

<!-- <?php

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
?> -->
<?php

if (isset($_POST['update'])) {
	
	$pdo = require('./dbconnect.php');
    
    $id = $_POST['id'];

    $tasktitle = $_POST['tasktitle'];
    $type = $_POST['type'];
    $taskdesc = $_POST['taskdesc'];
    
  
        $sql = "UPDATE todolist SET tasktitle=:tasktitle, type=:type, taskdesc=:taskdesc WHERE id =:id";
        $stmt= $pdo->prepare($sql);
        $stmt->execute();
        
        header('location: index.php');
        
}
?>
