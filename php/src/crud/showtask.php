<?php 

include ('./code.php');
include ('deletetask.php');

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
			<td><?php echo '<form action="" method="POST">
			<input type="hidden" name="id" value='.$task["id"].'>
			<input type="submit" class="del_btn" name="delete" value="Delete"></form>'; ?>
			</td>
    			
		</tr>
	<?php 
    } 
    ?>
</table>

