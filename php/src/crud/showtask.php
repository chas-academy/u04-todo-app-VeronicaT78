<?php 

include ('./code.php');

$pdo = require('./dbconnect.php');
$query = 'SELECT * FROM todolist';
$stmt = $pdo->prepare($query);
$stmt->execute();
$tasks = $stmt->fetchAll();

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
			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<?php foreach($tasks as $task) 
    { 
    ?>
		<tr>
			<td><?php echo $task['tasktitle']; ?></td>
			<td><?php echo $task['type']; ?></td>
            <td><?php echo $task['taskdesc']; ?></td>
			<td>
				<a href="addtask.php?edit=<?php echo $task['id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="deletetask.php?del=<?php echo $task['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php 
    } 
    ?>
</table>

