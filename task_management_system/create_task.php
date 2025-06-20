<?php
session_start();
if (isset($_SESSION['role']) && isset($_SESSION['id']) && ($_SESSION['role'] == 'admin')) {
    include "DB_connection.php";
    include "app/Model/User.php";
    $users = get_all_users($conn);
//print_r($users);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Task</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body>
    <input type="checkbox" name="" id="checkbox">
    <?php include "inc/header.php"?>
    <div class="body">
        <?php include "inc/nav.php"?>
        <section class="section-1">
            <h4 class="title">Create Task</h4>
            <form  class="form-1" method="POST" action="../task_management_system/app/add-task.php">
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
                    <input type="text" name="title"  class="input-1" placeholder="Title Name"><br>
                </div>
                <div class="input-holder">
                    <label for="">Description</label>
                    <textarea type="text" name="description" class="input-1" placeholder="Description"></textarea><br>
                </div>
                <div class="input-holder">
                    <label for="">Due Date</label>
                    <input type="date" name="due_date"  class="input-1" placeholder="Due Date"><br>
                </div>
                <div class="input-holder">
                    <label for="">Assigned to</label>
                    <select name="assigned_to" class="input-1">
                        <option value="0">Select Employee</option>
                        <?php if ($users !=0) {
                            foreach ($users as $user){
                        ?>
                        <option value="<?=$user['id']?>"><?=$user['full_name']?></option>
                        <?php } }?>
                    </select><br>
                </div>

                <button type="submit" class="edit-btn">Create Task</button>
            </form>
        </section>
    </div>

<script type="text/javascript">
    var active = document.querySelector("#navList li:nth-child(3)");
    active.classList.add("active");
</script>

</body>
</html>
<?php } else {
    $em = "First login";
    header("Location: login.php?error=$em");
    exit();
}
?>