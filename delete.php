<?php
    include('Controllers/taskController.php');
    $obj = new TaskController;

    $id = $_GET['id'];
    
    $obj->delete($id);
?>