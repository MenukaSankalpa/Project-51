<?php
session_start();
if (isset($_SESSION['role']) && isset($_SESSION['id'])){
    include "DB_connection.php";
    include "app/Model/Task.php";

    if (!isset($_GET['id'])){
        header("Location: task.php");
        exit();
    }
    $id = $_GET['id'];
    $task = get_task_by_id($conn, $id);
    //print_r($user['username']);

    if ( $task == 0){
        header("Location: task.php");
        exit();
    }

    $data = array($id);
    delete_task($conn, $data);
    $sm = "Delete Successfully";
    header("Location: task.php?success=$sm");
    exit();


} else {
    $em= "First login";
    header("Location: login.php?error=$em");
    exit();
}
?>