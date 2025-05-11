<?php

if(isset($_POST['user_name']) && isset($_POST['password'])) {
    include "../DB_connection.php";
    function validate_input($data) {
        $data = trim($data);
        $data = stripsLashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $user_name = validate_input($_POST['user_name']);
    $password = validate_input($_POST['password']);

    if (empty($user_name)) {
        $em = "User Name Required";
        header("Location: ../login.php?error=$em");
        exit();
    }else if (empty($password)) {
        $em = "Password name is required";
        header("Location: ../login.php?error=$em");
        exit();
    }else {

        $sql = "SELECT * FROM user WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute($user_name);

        if ($stmt->rowCount() == 1) {
            $user = $stmt->fetch();
            $usernameDb = $user['username'];
            $passwordDb = $user['password'];
            $role = $user['role'];

            if ($user_name === $usernameDb) {
                if (password_verify($password, $passwordDb)) {
                    if ($role == "admin") {
                        $_SESSION['role'] = $role;
                        $_SESSION['id'] = $id;
                        $_SESSION['username'] = $usernameDb;
                        header("Location: ../index.php");
                    }else if ($role == "employee") {
                        $_SESSION['role'] = $role;
                        $_SESSION['id'] = $id;
                        $_SESSION['username'] = $usernameDb;
                        header("Location: ../index.php");
                    }else {
                        $em = "Unknown error occurred";
                        header("Location: ../login.php?error=$em");
                        exit();
                    }
                }else {
                    $em = "Incorrect username or password";
                    header("Location: ../login.php?error=$em");
                    exit();
                }
            }else {
                $em = "Incorrect username or password";
                header("Location: ../login.php?error=$em");
                exit();
            }
        }
    }
} else {
    $em = "Unknown error occurred";
    header("Location: ../login.php?error=$em");
    exit();
}


?>