<?php

if(isset($_POST['user_name2']) && isset($_POST['password'])) {
    function validate_input($data) {
        $data = trim($data);
        $data = stripsLashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $user_name = validate_input($_POST['user_name']);
    $password = validate_input($_POST['password']);

    if (empty($user_name)) {
        $em = "User name is required";
        header("Location: ../login.php?error=$em");
        exit();
    }else if (empty($password)) {
        $em = "Password name is required";
        header("Location: ../login.php?error=$em");
        exit();
    }

} else {
    $em = "Unknown error occurred";
    header("Location: ../login.php?error=$em");
    exit();
}


?>