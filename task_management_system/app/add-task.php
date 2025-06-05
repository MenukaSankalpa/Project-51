<?php
session_start();
if(isset($_SESSION['role']) && isset($_SESSION['id'])){


if(isset($_POST['title']) && isset($_POST['description']) &&  isset($_POST['assigned_to']) && $_SESSION['role'] == 'admin' ) {
    include "../DB_connection.php";
    function validate_input($data) {
        $data = trim($data);
        $data = stripsLashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $title = validate_input($_POST['user_name']);
    $description = validate_input($_POST['description']);
    $assigned_to = validate_input($_POST['assigned_to']);

    if (empty($title)) {
        $em = "Title is Required";
        header("Location: ../create_task.php?error=$em");
        exit();
    }else if (empty($description)) {
        $em = "Description is required";
        header("Location: ../create_task.php?error=$em");
        exit();
    }else {

        /*$sql = "INSERT INTO * FROM users WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$user_name]);*/

        include "Model/Task.php";
        //$password = password_hash($password, PASSWORD_DEFAULT);
        $data = array($title, $description, $assigned_to);
        insert_task($conn, $data);
        
        /* $em = "User created successfully";
        header("Location: ../add-user.php?error=$em");
        exit();*/
    }
} else {
    $em = "First login";
    header("Location: ../create-task.php?error=$em");
    exit();
}
}else{
    $em= "First login";
    header("Location: ../create-task.php?error=$em");
    exit();
}
