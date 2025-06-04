<?php
session_start();
if (isset($_SESSION['role']) && isset($_SESSION['id'])) {
    include "DB_connection.php";
    include "app/Model/User.php";
    $users = get_all_users($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
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
            <h4 class="title">Manage Users <a href="add-user.php">Add User</a></h4>
            <?php if (isset($_GET['success'])) {?>
            <div class="success" role="alert">
                <?php echo stripslashes($_GET['success']); ?>
            </div>
            <?php }?>
            <?php if ($users != 0) { ?>
            <table class="main-table">
                <tr>
                    <th>#</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>role</th>
                    <th>Action</th>
                </tr>
                <?php $i=0; foreach($users as $user) { ?>
                <tr>
                    <td><?=++$i?></td>
                    <td><?=$user['full_name']?></td>
                    <td><?=$user['username']?></td>
                    <td><?=$user['role']?></td>
                    <td>
                        <a href="edit-user.php?id=<?=$user['id']?>" class="edit-btn" >Edit</a>
                        <a href="delete-user.php?id=<?=$user['id']?>" class="delete-btn" >Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </table>
        <?php } else { ?>
            <h3>Empty</h3>
        <?php }?>
        </section>
    </div>

<script type="text/javascript">
    var active = document.querySelector("#navList li:nth-child(2)");
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