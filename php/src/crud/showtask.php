<?php 
$pdo = require('./dbconnect.php');
$query = 'SELECT * FROM todolist';
$stmt = $pdo->prepare($query);
$stmt->execute();
$tasks = $stmt->fetchAll();
?>

<table>
	<thead>
		<tr>
			<th>Task</th>
			<th>Type</th>
            <th>Description</th>
            <th>Done</th>
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
            <td><?php if ($done == true): ?>
                    <input type="checkbox" checked="checked" value="<?php echo $done; ?>">
                <?php else: ?>
                    <input type="checkbox" value="<?php echo $done; ?>">
                <?php endif ?>
            </td>
			<td>
				<a href="./code.php?edit=<?php echo $task['id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="./deletetask.php?del=<?php echo $task['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php 
    } 
    ?>
</table>

