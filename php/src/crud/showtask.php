<?php 

include ('./code.php');
include ('deletetask.php');
include ('edittask.php');

$pdo = require('./dbconnect.php');

$query = 'SELECT * FROM todolist';
$stmt = $pdo->prepare($query);
$stmt->execute();
$tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);

$tasktitle = "";
$taskdesc = "";
$type = "";
$done = false;
$id = 0;
$update = false;
?>

<table>
	<thead>
		<tr>
			<th>Task</th>
			<th>Type</th>
            <th>Description</th>
			<th colspan="3">Action</th>
		</tr>
	</thead>
	
	<?php foreach($tasks as $task) 
    { 
    ?>
		<tr>
			<td><?php echo $task['tasktitle'] || $n['tasktitle'] ; ?></td>
			<td><?php echo $task['type'] || $n['type']; ?></td>
            <td><?php echo $task['taskdesc'] || $n['taskdesc']; ?></td>
			<td><?php echo '<form action="" method="POST">
			<input type="hidden" name="id" value='.$task["id"].'>
			<input type="submit" class="done_btn" name="done" value="Done"></form>'; ?>
			</td>
			<td><?php echo '<form action="" method="POST">
			<input type="hidden" name="id" value='.$task["id"].'>
			<input type="submit" class="edit_btn" name="edit" value="Edit"></form>'; ?>
			</td>
			<td><?php echo '<form action="" method="POST">
			<input type="hidden" name="id" value='.$task["id"].'>
			<input type="submit" class="del_btn" name="delete" value="Delete"></form>'; ?>
			</td>
    			
		</tr>
	<?php 
    } 
    ?>
</table>

