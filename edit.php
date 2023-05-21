<?php
    session_start();
    include('Controllers/taskController.php');
    $obj = new TaskController;

    $id = $_GET['id'];
   
    if(isset($_POST['submit'])){
        
        $flag = true;
        if($_POST['task_title'] == ""){
            $flag = false;
            $_SESSION['task_title_error'] = "Task Title Field is Required";
        }else{
            $_SESSION['old_title'] = $_POST['task_title'];
        }
        
        if($_POST['task_description'] == ""){
            $flag = false;
            $_SESSION['task_description_error'] = "Task Description Field is Required";
        }else{
            $_SESSION['old_task_description'] = $_POST['task_description'];
        }
        
        if($_POST['task_date'] == ""){
            $flag = false;
            $_SESSION['task_date_error'] = "Task Date Field is Required";
        }else{
            $_SESSION['old_task_date'] = $_POST['task_date'];
        }
        if($flag){
            $info = $_POST;
            
            $obj->update($id,  $info);
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid">
        <h2 class="text-center py-2">Task Manager</h2>
        <p class="text-center py-2">This is a very simple Task Manager for crud operation purpose</p>
      <div class="row justify-center align-items-center">
        <div class="col-md-4 m-auto">
            <div class="card text-start">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Task</h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <?php  
                                $singleTask = mysqli_fetch_assoc($obj->edit($id));
                            ?>
                            <div class="mb-3 ">
                              <label for="task_title" class="form-label">Task Title:</label>
                              <input type="text"
                                class="form-control" name="task_title" id="task_title" placeholder="Add Your Task Title" value = "<?= $singleTask['task_name'];?>">

                                <!-- input field validation  -->
                                <?php if(isset($_SESSION['task_title_error'])) : ?>
                                    <small><?= $_SESSION['task_title_error']?></small>
                                <?php endif ?>

                            </div>
                            <div class="mb-3">
                              <label for="task_description" class="form-label">Task Description</label>
                              <textarea class="form-control" name="task_description" id="task_description" rows="3" placeholder= "<?= $singleTask['task_details'];?>" value = "<?= $singleTask['task_details'];?>"></textarea>

                                <!-- input field validation  -->
                                <?php if(isset($_SESSION['task_description_error'])) : ?>
                                    <small><?= $_SESSION['task_description_error']?></small>
                                <?php endif ?>
                            </div>
                            <div class="mb-3 ">
                              <label for="task_date" class="form-label">Task Date:</label>
                              <input type="datetime-local"
                                class="form-control" name="task_date" id="task_date" value = "<?= $singleTask['task_date'];?>">
                                
                                 <!-- input field validation  -->
                                 <?php if(isset($_SESSION['task_date_error'])) : ?>
                                    <small><?= $_SESSION['task_date_error']?></small>
                                <?php endif ?>
                            </div>
                            <div class="mb-3 ">
                              <input type="submit" class="btn btn-success" name="submit" value="submit">
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
      </div>
    </div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>

<?php
    session_unset();
?>