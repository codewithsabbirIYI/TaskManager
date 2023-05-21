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

             mysqli_query( $this-> db_connect, "INSERT INTO `tasks`(`task_name`, `task_details`, `task_date`) VALUES ('$task_title','$task_description','$task_date')");
        }







    }



?>