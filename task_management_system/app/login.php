<?php

if(isset($_POST['user_name']) && isset($_POST['password'])) {
    function validate_input($data) {
        $data = trim($data);
        $data = stripsLashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

} else {
    $em = "unknown error occurred";
    $header("Location: ../login.php?error=$em");
    exit();
}


?>