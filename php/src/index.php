<?php  include('code.php'); ?>

<?php 
    require('dbconnect.php');

	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$sql = "SELECT * FROM todolist WHERE id=$id";
        $stmt= $pdo->prepare($sql);
        $stmt->execute();
        $record = $stmt->fetchAll(PDO::FETCH_ASSOC);
    };
?>

<!DOCTYPE html>
<html>
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
<?php   
        require('dbconnect.php');
        $sql = "SELECT * FROM todolist";
        $stmt= $pdo->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC)
        //header(location: 'index.php');
?> 
<table>
	<thead>
		<tr>
			<th>Task</th>
			<th>Description</th>
			<th colspan="3">Action</th>
		</tr>
	</thead>
	
	<?php foreach ($results as $result) { ?>
		<tr>
			<td><?php echo $result['tasktitle']; ?></td>
			<td><?php echo $result['taskdesc']; ?></td>
			<td>
				<a href="index.php?edit=<?php echo $result['id']; ?>" class="edit_btn" >Edit</a>
			</td>
            <td>
                <input type="checkbox" name="done" value="done">
            </td>
			<td>
				<a href="code.php?del=<?php echo $result['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php }; ?>
</table>
        <?php foreach($record as $record) { ?>
    <div class="form">
	    <form method="post" action="code.php" >
		    <div class="input-group">
			    <label>Task:</label>
			    <input type="text" name="tasktitle" value="<?php echo $record['tasktitle']; ?>">
		    </div>
		    <div class="input-group">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
			    <label>Description:</label>
			    <input type="text" name="taskdesc" value="<?php echo $record['taskdesc'] ?>">
		    </div>
		    <div class="input-group">
                <?php if ($update == true){ echo '<button class="btn" type="submit" name="update" style="background: #556B2F;" >Update</button>'; } ?>
	        </div>
	    </form>
        <?php }; ?>
    </div>
    <div class="form">
	    <form method="post" action="code.php" >
		    <div class="input-group">
			    <label>Task:</label>
			    <input type="text" name="tasktitle" value="">
		    </div>
		    <div class="input-group">
			    <label>Description:</label>
			    <input type="text" name="taskdesc" value="">
		    </div>
		    <div class="input-group">
                <button class="btn" type="submit" name="submit">Add task</button>
	        </div>
	    </form>
    </div>
</body>
</html>