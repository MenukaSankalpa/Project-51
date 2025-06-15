<?php
session_start();
if (isset($_SESSION['role']) && isset($_SESSION['id']) && ($_SESSION['role'] == 'admin')) {
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
            <h4 class="title">Edit Task <a href="tasks.php">Tasks</a></h4>
            <form  class="form-1" method="POST" action="../task_management_system/app/update-task.php">
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
                    <label for="">Title</label>
                    <input type="text" name="title"  value="<?= $task['title']?>" class="input-1" placeholder="Task Name"><br><br>
                </div>
                <div class="input-holder">
                    <label for="">Description</label>
                    <textarea name="description" rows="5" class="input-1"><?= $task['description']?></textarea><br><br>
                </div>
                <div class="input-holder">
                    <label for="">Snooze</label>
                    <input type="date" name="due_date"  value="<?= $task['due_date']?>" class="input-1" placeholder="Snooze"><br><br>
                </div>
                <div class="input-holder">
                    <label for="">Assigned to</label>
                    <select name="assigned_to" class="input-1">
                        <option value="0">Select Employee</option>
                        <?php if ($users !=0) {
                            foreach ($users as $user){
                                if ($task['assigned_to'] == $user['id']) { ?>
                                    <option selected value="<?=$user['id']?>"><?=$user['full_name']?></option>
                        <?php }else{ ?>
                        <option value="<?=$user['id']?>"><?=$user['full_name']?></option>
                        <?php } } }?>
                    </select><br>
                </div>
                <input type="text" name="id" value="<?=$task['id']?>" hidden>

                <button type="submit" class="edit-btn">Update</button>
            </form>
        </section>
    </div>
<script>
    var active = document.querySelector("#navList li:nth-child(4)");
    active.classList.add("active");
</script>
</body>
</html>
