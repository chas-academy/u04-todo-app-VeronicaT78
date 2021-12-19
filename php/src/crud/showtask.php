<?php 

//include ('./code.php');
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
$id = 0;

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
			<td><?php echo $task['tasktitle']; ?></td>
			<td><?php echo $task['type']; ?></td>
            <td><?php echo $task['taskdesc']; ?></td>
			<td><a href="index.php?id=<?php echo $task['id']; ?>" class="edit_btn">Edit</a></td> 
			
			<td><?php echo '<form action="" method="POST">
			<input type="hidden" name="id" value='.$task["id"].'>
			<input type="submit" name="delete" value="Delete" class="del_btn"></form>'; ?>
			</td>
    			
		</tr>
	<?php 
    } 
    ?>
</table>

