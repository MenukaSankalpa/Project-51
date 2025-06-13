<?php
session_start();
if (isset($_SESSION['role']) && isset($_SESSION['id']) && ($_SESSION['role'] == "employee")) {
    include "DB_connection.php";
    include "app/Model/User.php";

    $user = get_user_by_id($conn, $_SESSION['id']);
    print_r($user);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body>
    <input type="checkbox" id="checkbox">
    <?php include "inc/header.php"?>
    <div class="body">
        <?php include "inc/nav.php"?>
        <section class="section-1">
            <h4 class="title">Profile<a href="edit_profile.php">Edit Profile</a></h4>
            <table class="main-table-2">
                <tr>
                    <td>Full Name</td>
                    <td><?=$user['full_name']?></td>
                </tr>
            </table>
        </section>
    </div>
<script>
    var active = document.querySelector("#navList li:nth-child(3)");
    active.classList.add("active");
</script>
</body>
</html>
<?php }