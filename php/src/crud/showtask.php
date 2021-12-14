<?php 

include ('./code.php');

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
			<td>
    			<input type="hidden" name="id" value="<?php echo $task['id']; ?>">
        		<?php $id = isset($_POST['id'])?intval($_POST['id']):0;

// proceed with the query
if($contact_id>0) { $query = "DELETE FROM contacts WHERE contact_id = '$contact_id'";

}

// redirect to the main table with header("location: main.php");

?>	
			</td>
		</tr>
	<?php 
    } 
    ?>
</table>

