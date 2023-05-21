<?php
    
    class TaskController{
        
        public function __construct(){
             $db_connect;
            define("HOSTNAME", "localhost");
            define("USERNAME", "root");
            define("PASSWORD", "");
            define("DBNAME", "taskManager");

            $this-> db_connect = mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DBNAME);
            // $db_connect = mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DBNAME)
        } 
        
        // create method or data insert method 
        public function create($info){
            // echo $info['task_title'];
            $task_title = $info['task_title'];
            $task_description = $info['task_description'];
            $task_date = $info['task_date'];

            // mysqli_query($db_connect, "INSERT INTO `tasks`(`task_name`, `task_details`, `task_date`) VALUES ('$task_title','$task_description','$task_date')");

            $insertQuery = mysqli_query( $this-> db_connect, "INSERT INTO `tasks`(`task_name`, `task_details`, `task_date`) VALUES ('$task_title','$task_description','$task_date')");

            if(isset($insertQuery)){
                $_SESSION['insert_success'] = "Task Added Successfully";
            }
        }

        // read method or task show method here 
        public function show(){
            return $showQuery = mysqli_query($this-> db_connect, "SELECT * FROM `tasks`");
        }
        // edit method or single task show method here 
        public function edit($info){
            $id = $info;
          
            return $singleTaskShowQuery = mysqli_query($this-> db_connect, "SELECT * FROM `tasks` WHERE id = '$id' ");
        }

        // update method or task method here 
        public function update($taskid, $info){
            $id = $taskid;
            $task_name = $info['task_title'];
            $task_details = $info['task_description'];
            $task_date = $info['task_date'];

            $taskUpdateQuery = mysqli_query($this-> db_connect, "UPDATE `tasks` SET `task_name`='$task_name',`task_details`='$task_details',`task_date`='$task_date' WHERE id = '$id' ");

            if(isset($taskUpdateQuery )){
                $_SESSION['update_success'] = "Task Updated Successfully";
                header('location: index.php');
            }
        }
    }

?>