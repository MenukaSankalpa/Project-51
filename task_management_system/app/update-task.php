<?php
session_start();
if(isset($_SESSION['role']) && isset($_SESSION['id'])){


if(isset($_POST['id']) && isset($_POST['title']) && isset($_POST['description']) &&  isset($_POST['assigned_to']) && $_SESSION['role'] == 'admin' ) {
    include "../DB_connection.php";
    function validate_input($data) {
        $data = trim($data);
        $data = stripsLashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $title = validate_input($_POST['title']);
    $description = validate_input($_POST['description']);
    $assigned_to = validate_input($_POST['assigned_to']);
    $id = validate_input($_POST['id']);

    if (empty($title)) {
        $em = "Title is Required";
        header("Location: ../edit_task.php?error=$em&id=$id");
        exit();
    }else if (empty($description)) {
        $em = "Description is required";
        header("Location: ../edit_task.php?error=$em&id=$id");
        exit();
    }else if ($assigned_to == 0) {
        $em = "Select User";
        header("Location: ../edit_task.php?error=$em&id=$id");
        exit();
    }else {
        

        /*$sql = "INSERT INTO * FROM users WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$user_name]);*/

        include "Model/Task.php";
        //$password = password_hash($password, PASSWORD_DEFAULT);
        $data = array($title, $description, $assigned_to, $id);
        update_task($conn, $data);
        
        $em = "Task updated successfully";
        header("Location: ../edit_task.php?success=$em&id=$id");
        exit();
    }
} else {
    $em = "Unknown error occurred";
    header("Location: ../edit_task.php?error=$em");
    exit();
}
}else{
    $em= "First login";
    header("Location: ../login.php?error=$em");
    exit();
}
