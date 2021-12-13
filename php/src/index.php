<?php
    //session_start();
    include('header.php');
    include('footer.php');
    include('code.php')
    
?>
<div class="form">
    <p style="color:red"><?php if(!empty($msg)){echo $msg; }?></p>
        <?php include './crud/addtask.php';?>
</div>

<div class="table">
    <table>
        <tr>
            <th>Task</th>
            <th>Type</th>
            <th>Description</th>
            <th>Done</th>
        </tr>
        
            <?php include './crud/showtask.php';?>
            <td>
				<a href="index.php?edit=<?php echo $tasks['id']; ?>" class="edit_btn" >Edit</a>
			</td>
        
    </table>
</div>


