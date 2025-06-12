<?php
session_start();
if(isset($_SESSION['role']) && isset($_SESSION['id'])){


if(isset($_POST['id']) && isset($_POST['status']) && $_SESSION['role'] == 'employee') {
    include "../DB_connection.php";
    function validate_input($data) {
        $data = trim($data);
        $data = stripsLashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $status = validate_input($_POST['status']);
    $id = validate_input($_POST['id']);

    if (empty($status)) {
        $em = "Status is Required";
        header("Location: ../edit-task-employee.php?error=$em&id=$id");
        exit();
    }else {
        
        /*$sql = "INSERT INTO * FROM users WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$user_name]);*/

        include "Model/Task.php";
        //$password = password_hash($password, PASSWORD_DEFAULT);
        $data = array($status, $id);
        update_task_status($conn, $data);
        
        $em = "Task updated successfully";
        header("Location: ../edit-task-employee.php?success=$em&id=$id");
        exit();
    }
} else {
    $em = "Unknown error occurred";
    header("Location: ../edit-task-employee.php?error=$em");
    exit();
}
}