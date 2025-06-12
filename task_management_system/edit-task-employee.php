<?php
session_start();
if (isset($_SESSION['role']) && isset($_SESSION['id']) && ($_SESSION['role'] == "employee")) {
    include "DB_connection.php";
    include "app/Model/Task.php";
    include "app/Model/User.php";

    if (!isset($_GET['id'])){
        header("Location: tasks.php");
        exit();
    }
    $id = $_GET['id'];
    $task = get_task_by_id($conn, $id);
    //print_r($user['username']);

    if ($task == 0){
        header("Location: tasks.php");
        exit();
    }
    $users = get_all_users($conn);
} else {
    header("Location: login.php?error=Please+log+in+first");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body>
    <input type="checkbox" id="checkbox">
    <?php include "inc/header.php" ?>
    <div class="body">
        <?php include "inc/nav.php"?>
        <section class="section-1">
            <h4 class="title">Edit Task <a href="my_task.php">Tasks</a></h4>
            <form  class="form-1" method="POST" action="../task_management_system/app/update-task-employee.php">
            <?php if (isset($_GET['error'])) {?>
                <div class="danger" role="alert">
                    <?php echo stripcslashes($_GET['error']); ?>
                </div>
            <?php }  ?>

        <?php if (isset($_GET['success'])) {?>
            <div class="success" role="alert">
                <?php echo stripslashes($_GET['success']); ?>
            </div>
        <?php }
            /*$pass = 123;
            $pass = password_hash($pass,PASSWORD_DEFAULT);
            echo $pass;*/
        ?>
                <div class="input-holder">
                    <label></label>
                    <p><b>Title: </b><?= $task['title']?></p>
                </div>
                <div class="input-holder">
                    <label></label>
                    <p><b>Description: </b><?= $task['description']?></p>
                </div><br>
                <div class="input-holder">
                    <label for="">Status</label>
                    <select name="status" class="input-1">
                        <option <?php if( $task['status'] == "pending") echo"selected"; ?>>pending</option>
                        <option <?php if( $task['status'] == "in_progess") echo"selected"; ?>>in_progess</option>
                        <option <?php if( $task['status'] == "completed") echo"selected"; ?>>completed</option>
                    </select><br>
                </div>
                <input type="text" name="id" value="<?=$task['id']?>" hidden>

                <button type="submit" class="edit-btn">Update</button>
            </form>
        </section>
    </div>
<script>
    var active = document.querySelector("#navList li:nth-child(2)");
    active.classList.add("active");
</script>
</body>
</html>
