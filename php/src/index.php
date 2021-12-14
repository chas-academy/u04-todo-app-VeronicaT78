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
    <?php include './crud/showtask.php';?>
</div>


